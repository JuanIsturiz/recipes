@props(['recipe'])

<a href="/recipes/public/recipes/{{ $recipe->id }}">
    <x-card
        class="mb-4 mx-auto w-80 overflow-hidden cursor-pointer transition-transform duration-150 hover:scale-[1.015] md:mb-0 md:mx-0">
        <img class="hidden w-full sm:block"
            src="{{ $recipe->image ? asset('storage/' . $recipe->image) : asset('/images/no-image.png') }}"
            alt="Recipe Image" />
        <div class="p-2">
            <h2 class="capitalize text-2xl text-rose-500 font-bold">{{ $recipe->name }}</h2>
            <hr class="my-2">
            <h4 class="text-start text-lg font-medium text-stone-700 mb-1">Difficulty: <span
                    class="uppercase text-stone-900">{{ $recipe->difficulty }}</span>
            </h4>
            <h4 class="text-start text-lg font-medium text-stone-700 mb-1">Time: <span
                    class="capitalize text-stone-900">{{ $recipe->time }}</span>
            </h4>
            <x-tags :tags="$recipe->tags" class="text-xs" />
            <p class="mt-2 text-start font-medium">
                <span
                    class="uppercase">{{ substr($recipe->description, 0, 1) }}</span>{{ substr($recipe->description, 1) }}
            </p>
        </div>
    </x-card>
</a>
