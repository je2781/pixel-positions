<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pixel Positions</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@400;500;600&display=swap"
        rel="stylesheet">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body class="bg-black text-white font-hanken-grotesk">
    <nav
        class="w-full bg-black text-white border-b border-white/10">
        <div class="container mx-auto py-4 px-5 w-full flex justify-between items-center">
            <div class="flex flex-row w-full md:w-fit justify-between items-center">
                <a href="/">
                    <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="logo" />
                </a>
                <button id="open-menu" class="md:hidden inline-block" aria-haspopup="true" aria-expanded="false">
                    <i class="fa-solid fa-bars text-white text-lg"></i>
                    <span class="sr-only">open mobile menu</span>
                </button>
            </div>
            <div id="backdrop" class="md:hidden hidden fixed w-full h-full bg-black/70 z-10 left-0 top-0"></div>
            <div id="mobile-menu"
                class="fixed md:hidden block top-0 left-0 bg-black z-20 text-white -translate-x-100 opacity-0 h-full w-[50vw] pt-14 pb-5 px-5 space-y-6">
                @auth
                    <h1 class="text-start"><a href="/jobs/create">Post A Job</a></h1>
                @endauth
                @guest
                    <h1 class="text-start"><a href="/login">Login</a></h1>
                @endguest
                <ul class="flex flex-col gap-y-3 items-start">
                    <li><a href="/">Jobs</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Salaries</a></li>
                    <li><a href="#">Companies</a></li>
                </ul>
                <button id="close-menu" class="absolute top-2 right-4"><i
                        class="fa-solid fa-xmark text-white"></i></button>
            </div>
            <div class="space-x-6 font-bold hidden md:inline-block">
                <a href="/">Jobs</a>
                <a href="#">Careers</a>
                <a href="#">Salaries</a>
                <a href="#">Companies</a>
            </div>
            @auth
                <div class="hidden md:inline-block space-x-4">
                    <a href="/jobs/create">Post A Job</a>
                    <x-forms.form method='POST' action='/logout' class="inline-block">
                        <x-forms.button type='submit' class="text-white font-normal bg-transparent border-0 px-2" >Logout</x-forms.button>
                    </x-forms.form>
                </div>
            @endauth
            @guest
                <div class="hidden md:inline-block">
                    <a href="/login">Login</a>
                </div>
            @endguest
        </div>
    </nav>
    <main class="pt-10 container mx-auto min-h-screen pb-24 px-5">{{ $slot }}</main>
</body>

</html>