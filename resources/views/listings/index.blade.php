<x-layout >
    @include('partials._hero')
    @include('partials._search')
    @if(count($listings))
        <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
            @foreach ($listings as $list)
                <x-listing-card :list='$list' />
            @endforeach
    @else 
    <p>There is no listing!</p>

    @endif
    
</x-layout>
<div class="p-5 mt-5">
    {{$listings->links()}}
</div>