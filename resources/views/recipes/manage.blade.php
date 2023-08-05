<x-layout>

    <header>
        <h2 class="text-center text-4xl text-rose-500 font-bold mb-10">Your Recipes</h2>
    </header>
    <table class="w-4/5 mx-auto text-sm text-left text-stone-800 border border-stone-200 shadow-md">
        <thead class="text-lg text-stone-600 uppercase bg-stone-100">
            <tr>
                <th scope="col" class="hidden sm:block px-6 py-3">ID</th>
                <th scope="col" class="px-6 py-3">Name</th>
                <th scope="col" class="px-6 py-3">Edit</th>
                <th scope="col" class="px-6 py-3">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($recipes as $recipe)
                <tr class="bg-stone-200 font-medium">
                    <td cope="row" class="hidden sm:block text-lg px-6 py-4 text-stone-800 whitespace-nowrap">
                        {{ $recipe->id }}</td>
                    <td cope="row"
                        class="capitalize text-lg px-6 py-4 text-stone-800 whitespace-nowrap hover:underline">
                        <a href="/recipes/public/recipes/{{ $recipe->id }}">{{ $recipe->name }}</a>
                    </td>
                    <td cope="row" class="text-lg px-6 py-4 text-green-600 whitespace-nowrap">
                        <a href="/recipes/public/recipes/{{ $recipe->id }}/edit">
                            <i class="fa-solid fa-pencil"></i> <span class="hidden sm:inline ">Edit</span></a>
                    </td>
                    <td cope="row" class="text-lg px-6 py-4 text-red-600 whitespace-nowrap">
                        <form action="/recipes/public/recipes/{{ $recipe->id }}" action="POST">
                            @csrf
                            @method('DELETE')
                            <button>
                                <i class="fa-solid fa-trash"></i> <span class="hidden sm:inline ">Delete</span>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>



</x-layout>
