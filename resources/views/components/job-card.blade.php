@props(['job'])

<x-panel class="py-6 px-4 flex flex-col">
    <div class="self-start md:text-sm text-xs">{{ $job->employer->name }}</div>

    <div class="text-center my-8">
        <a href="{{ $job->url }}" target='_blank'>
            <h3 class="group-hover:text-blue-800 md:text-xl text-[16px] font-bold">{{ $job->title }}</h3>
        </a>
        <p class="md:text-sm text-xs">{{ ucfirst(str_replace('_', ' ', $job->schedule)) . ' - ' . ' from ' .  \Illuminate\Support\Number::currency($job->salary, 'USD', null, 0)}}</p>
    </div>

    <div class="flex flex-row justify-between items-center">
        <div class="flex-wrap flex gap-x-1 gap-y-2">
            @foreach($job->tags as $tag)
                <x-tag :$tag size="small">{{ $tag->name }}</x-tag>
            @endforeach
        </div>

        <x-employer-logo :employer='$job->employer'/>
    </div>
</x-panel>