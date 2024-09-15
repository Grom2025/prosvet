@props(['post'])

<x-panel class="flex gap-x-6">
    <div>
        <x-employer-logo :employer="$post->employer" />
    </div>

    <div class="flex-1 flex flex-col">
        <a href="#" class="self-start text-sm text-gray-400 transition-colors duration-300">{{ $post->employer->name }}</a>

        <h3 class="font-bold text-xl mt-3 group-hover:text-blue-800">
            <a href="{{ $post->url }}" target="_blank">
                {{ $post->title }}
            </a>
        </h3>

        <p class="text-sm text-gray-400 mt-auto">{{ $post->salary }}</p>
    </div>

    <div>
        @foreach($post->tags as $tag)
            <x-tag :$tag />
        @endforeach
    </div>
</x-panel>
