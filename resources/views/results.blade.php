<x-app-layout>
    <x-page-heading>Results</x-page-heading>
    <section class="mt-8 gap-y-16 flex flex-col items-center w-full">
        <x-forms.form method="GET" class="md:w-[50%] w-full" action="/search">
            <x-forms.input :label="false" type='search' :hasIcon="true" name="q" placeholder="Web Developer..." />

        </x-forms.form>
        @if(count($jobs) === 0)
            <p class='text-center'>No jobs founds. Try a different query</p>
        @else
            <div class='flex gap-y-5 flex-col md:w-[70%] w-full'>
                @foreach($jobs as $job)
                    <x-job-card-wide :$job />
                @endforeach
            </div>

        @endif
    </section>
</x-app-layout>