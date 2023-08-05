 @php
     $ingredients = explode(',', $recipe->ingredients);
     $steps = explode(',', $recipe->steps);
 @endphp

 <x-layout>
     <div class="flex justify-center gap-8 mb-8">
         <div>
             <hr class="my-2">
             <div class="flex items-center gap-4 px-2">
                 <a class="text-[1rem]" href="{{ $_SERVER['HTTP_REFERER'] }}"><button
                         class="text-rose-500 bg-stone-200 px-2 rounded font-medium hover:bg-stone-300"><i
                             class="fa-solid fa-left-long text-md"></i> Back</button></a>
                 <h2 class="capitalize text-4xl text-rose-500 font-bold">
                     {{ $recipe->name }}</h2>
             </div>
             <hr class="my-2">
             <h4 class="text-start text-xl font-medium text-stone-700 mb-4">Difficulty: <span
                     class="uppercase text-stone-900">{{ $recipe->difficulty }}</span>
             </h4>
             <h4 class="text-start text-xl font-medium text-stone-700 mb-4">Time: <span
                     class="capitalize text-stone-900">{{ $recipe->time }}</span>
             </h4>
             <x-tags :tags="$recipe->tags" class="text-lg" />
             <p class="mt-4 text-start font-medium">
                 <span
                     class="uppercase">{{ substr($recipe->description, 0, 1) }}</span>{{ substr($recipe->description, 1) }}
             </p>
         </div>
         <div class="w-1/3 shadow-lg rounded-full">
             <img class="w-full rounded-full border-4 border-stone-900"
                 src="{{ $recipe->image ? asset('storage/' . $recipe->image) : asset('/images/no-image.png') }}"
                 alt="Recipe Image" />
         </div>
     </div>
     <div class="flex justify-around gap-2 w-2/3 mx-auto">
         <x-card class="w-96 p-2">
             <h3 class="text-3xl text-rose-500 font-medium">Ingredients</h3>
             <hr class="my-2">
             <ul class="text-start">
                 @foreach ($ingredients as $ingredient)
                     <li class="text-xl capitalize mb-2">- {{ $ingredient }}</li>
                 @endforeach
             </ul>
         </x-card>
         <x-card class="w-96 p-2">
             <h3 class="text-3xl text-rose-500 font-medium">Steps</h3>
             <hr class="my-2">
             <ol class="text-start">
                 @foreach ($steps as $index => $step)
                     <li class="text-xl capitalize mb-2">{{ $index }}. {{ $step }}</li>
                 @endforeach
             </ol>
         </x-card>
     </div>
 </x-layout>
