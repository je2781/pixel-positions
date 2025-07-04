@props(['job'])

<x-panel class="py-6 px-4 md:h-36 h-fit flex md:flex-row flex-col gap-y-10 w-full">
    <div class="flex md:flex-1 flex-row items-start md:h-full gap-x-3">
        <x-employer-logo :width="90" :employer='$job->employer'/>


        <div class="inline-flex flex-col justify-between md:h-full">
            <div class="inline-flex flex-col">
                <a href="#" class="md:text-sm text-xs text-white/45">{{ $job->employer->name }}</a>
                <a href="{{ $job->url }}" target='_blank'>
                    <h3 class="font-bold mg:text-xl text-sm group-hover:text-blue-800">{{ $job->title }}</h3>
                </a>
            </div>

            <p class="md:text-sm text-xs text-white/45 mt-5 md:m-0">
                {{ ucfirst(str_replace('_', ' ', $job->schedule)) . ' - ' . ' from ' . \Illuminate\Support\Number::currency($job->salary, 'USD', null, 0)}}
            </p>
        </div>
    </div>

    <div class="flex flex-col md:justify-between md:items-end items-center md:h-full gap-2">
        <div class="inline-block">
            <x-tag size="small">{{ $job->location }}</x-tag>
            <x-tag size="small">Tag</x-tag>
        </div>
        <div class="flex flex-wrap gap-y-2 gap-x-1">
            @foreach($job->tags as $tag)
                <x-tag :$tag size="small">{{ $tag->name }}</x-tag>
            @endforeach
        </div>

    </div>
</x-panel>