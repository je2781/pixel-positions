
<x-app-layout>
    <div class="space-y-16">
        <section class="flex flex-col items-center">
            <h1 class="font-bold md:text-4xl text-2xl">Let's Find Your Next Job</h1>

            <x-forms.form method="GET" class="md:w-[50%] w-full mt-6" action="/search">
                <x-forms.input :label="false" type='search' :hasIcon="true" name="q" placeholder="Web Developer..." />

            </x-forms.form>
        </section>

        <section>
            <x-section-heading>Featured Jobs</x-section-heading>

            <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-8 mt-6">
                @foreach($featuredJobs as $job)
                    <x-job-card :$job />
                @endforeach
            </div>
        </section>

        <section>
            <x-section-heading>Tags</x-section-heading>

            <div class="mt-6 flex flex-wrap gap-2">
                @foreach($tags as $tag)
                    <x-tag :$tag>{{ $tag->name }}</x-tag>
                @endforeach
            </div>
        </section>

        <section>
            <x-section-heading>Recent Jobs</x-section-heading>

            <div class="mt-6 space-y-6">
                @foreach($jobs as $job)
                    <x-job-card-wide :$job />
                @endforeach
            </div>
        </section>
    </div>

</x-app-layout>