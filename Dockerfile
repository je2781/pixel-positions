FROM ubuntu:22.04 AS base

ENV DEBIAN_FRONTEND noninteractive

COPY wait-for-pgsql.sh /usr/local/bin/wait-for-pgsql.sh

# Install dependencies
RUN apt update
RUN apt install -y software-properties-common
RUN add-apt-repository -y ppa:ondrej/php
RUN apt update
RUN apt install -y php8.2\
    supervisor\
    php8.2-cli\
    php8.2-common\
    php8.2-fpm\
    php8.2-intl\
    php8.2-pgsql\
    php8.2-zip\
    php8.2-gd\
    php8.2-mbstring\
    php8.2-curl\
    php8.2-xml\
    php8.2-bcmath\
    php8.2-pdo \
    curl \
    netcat-openbsd



# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Create necessary directories for Supervisor
RUN mkdir -p /etc/supervisor/conf.d 

# Install nodejs
RUN apt install -y ca-certificates gnupg
RUN mkdir -p /etc/apt/keyrings
RUN curl -fsSL https://deb.nodesource.com/gpgkey/nodesource-repo.gpg.key | gpg --dearmor -o /etc/apt/keyrings/nodesource.gpg
ENV NODE_MAJOR 20
RUN echo "deb [signed-by=/etc/apt/keyrings/nodesource.gpg] https://deb.nodesource.com/node_$NODE_MAJOR.x nodistro main" | tee /etc/apt/sources.list.d/nodesource.list
RUN apt update
RUN apt install -y nodejs

# Install nginx
RUN apt install -y nginx
RUN echo "\
    server {\n\
        listen 80;\n\
        listen [::]:80;\n\
        root /var/www/html/public;\n\
        add_header X-Frame-Options \"SAMEORIGIN\";\n\
        add_header X-Content-Type-Options \"nosniff\";\n\
        index index.php;\n\
        charset utf-8;\n\
        location / {\n\
            try_files \$uri \$uri/ /index.php?\$query_string;\n\
        }\n\
        location = /favicon.ico { access_log off; log_not_found off; }\n\
        location = /robots.txt  { access_log off; log_not_found off; }\n\
        error_page 404 /index.php;\n\
        location ~ \.php$ {\n\
            fastcgi_pass unix:/run/php/php8.2-fpm.sock;\n\
            fastcgi_param SCRIPT_FILENAME \$realpath_root\$fastcgi_script_name;\n\
            include fastcgi_params;\n\
        }\n\
        location ~ /\.(?!well-known).* {\n\
            deny all;\n\
        }\n\
    }\n" > /etc/nginx/sites-available/default


RUN echo "\
    #!/bin/sh\n\
    echo \"Starting services...\"\n\
    service php8.2-fpm start\n\
    nginx -g \"daemon off;\" &\n\
    echo \"Cleaning up stale Supervisor socket...\"\n\
    rm -f /run/supervisord.sock\n\
    echo \"Starting supervisord...\"\n\
    exec /usr/bin/supervisord -c /etc/supervisord.conf\n\
    " > chmod +x /usr/local/bin/wait-for-pgsql.sh

WORKDIR /var/www/html

#----------------------------------------------------#
#for frontend
# Copy package.json and package-lock.json first
COPY package*.json ./

# Install dependencies
RUN npm install
COPY . .
RUN npm run build
#----------------------------------------------------#
    

#giving permissions
RUN chown -R www-data:www-data /var/www/html /var/www/html/storage /var/www/html/bootstrap/


# Copy Supervisor config files
COPY supervisord.conf /etc/supervisord.conf
COPY laravel-worker.conf /etc/supervisor/conf.d/laravel-worker.conf

RUN composer install

EXPOSE 80

CMD ["sh", "/usr/local/bin/wait-for-pgsql.sh"]
