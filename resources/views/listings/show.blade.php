<x-layout >
    @include('partials._search')
        <a href="/" class="inline-block text-black ml-4 mb-4"
        ><i class="fa-solid fa-arrow-left"></i> Back</a>
        <div class="mx-4">
            <x-card class="p-10 bg-gray-400">
                <div class="flex flex-col items-center justify-center text-center">
                    <img
                        class="w-48 mr-6 mb-6"
                        src="{{$listing->logo ? asset('storage/'. $listing->logo) : asset('images/no-image.png')}}"
                        alt=""
                    />

                    <h3 class="text-2xl mb-2">{{$listing->title}}</h3>
                    <div class="text-xl font-bold mb-4">{{$listing->company}}</div>
                    <ul class="flex">
                       <x-listing-tags :tagsVar='$listing->tags'/>
                    </ul>
                    <div class="text-lg my-4">
                        <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
                    </div>
                    <div class="border border-gray-200 w-full mb-6"></div>
                    <div>
                        <h3 class="text-3xl font-bold mb-4">
                            Job Description
                        </h3>
                        <div class="text-lg space-y-6">
                            <p>
                                {{$listing->description}}
                            </p>

                            <div>
                                <a
                                href="mailto:t{{$listing->email}}"
                                class="inline-block bg-laravel text-white mt-6 px-4 py-2 rounded-xl hover:opacity-80"
                                ><i class="fa-solid fa-envelope"></i>
                                Contact Employer</a
                            >
                            </div>

                            <div>
                                <a
                                href="{{$listing->website}}"
                                target="_blank"
                                class="inline-block px-4 bg-black text-white py-2 rounded-xl hover:opacity-80"
                                ><i class="fa-solid fa-globe"></i> Visit
                                Website</a
                            >
                            </div>
                        </div>
                    </div>
                </div>
            </x-card>
        </div>
        {{-- <x-card class="flex space-x-5 items-center p-5">
            <a href="/listings/{{$listing->id}}/edit" class="px-7 py-2 bg-yellow-400 rounded hover:bg-yellow-500 hover:text-white">
                <i class="fas fa-pencil"></i> Edit
            </a>

            <form method="post" action="/listings/{{$listing->id}}">
                @csrf
                @method('delete')
                <button class="bg-laravel rounded px-7 py-2 hover:bg-red-500 hover:text-white"><i class="fa-solid fa-trash"></i> Delete</button>
            </form>
        </x-card> --}}
</x-layout>


