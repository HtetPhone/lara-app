<x-layout>
    <x-card class="border border-gray-200 p-10">
        <header>
            <h1
                class="text-3xl text-center font-bold my-6 uppercase"
            >
                Manage Gigs
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                @unless($listings->isEmpty())
                @foreach($listings as $listing)
                <tr class="border-gray-300">
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                        <a href="">
                            {{$listing->title}}
                        </a>
                    </td>
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                        <a href="/listings/{{$listing->id}}/edit" class="px-7 py-2 bg-yellow-400 rounded hover:bg-yellow-500 hover:text-white">
                            <i class="fas fa-pencil"></i> Edit
                        </a>
                    </td>
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                        <form method="post" action="/listings/{{$listing->id}}">
                            @csrf
                            @method('delete')
                            <button class="bg-laravel rounded px-7 py-2 hover:bg-red-500 hover:text-white"><i class="fa-solid fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @else

                <tr>
                    <p class="text-laravel font-bold text-lg upper-case text-center">
                        No Listing Found
                    </p>
                </tr>
                
                @endunless


        </table>
    </x-card>
</x-layout>