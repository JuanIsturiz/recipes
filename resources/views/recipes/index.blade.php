<x-layout>
    @include('partials._search')

    <div class="max-w-5xl mx-auto">
        <div class="md:flex md:justify-start md:gap-2 md:flex-wrap">
            @unless (count($recipes) === 0)
                @foreach ($recipes as $recipe)
                    <x-recipe_item :recipe="$recipe" />
                @endforeach
            @else
                <p class="text-center text-xl uppercase">No recipes found</p>

            @endunless
        </div>
        <div class="mt-6 p-4">
            {{ $recipes->links() }}
        </div>
    </div>
</x-layout>
