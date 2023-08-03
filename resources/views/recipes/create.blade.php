    {{-- protected $fillable = ['name', 'dificulty', 'ingredients', 'steps', 'time', 'description', 'tags']; --}}

    <x-layout>
        <x-card class="w-2/3 mx-auto">
            <h2 class="uppercase text-3xl font-semibold text-rose-500">new recipe</h2>
            <h3 class="text-xl font-medium text-stone-600">Tell us about your recipe!</h3>
            <form action="/recipes/public/users/new" method="POST">
                @csrf
                {{-- name --}}
                <div class="flex flex-col gap-2 items-start mb-4">
                    <label class="capitalize text-xl font-medium" for="name">name</label>
                    <input class="w-full text-lg p-1 border border-stone-200 rounded" type="text" name="name"
                        id="name" placeholder="Mac & Cheese" value="{{ old('name') }}">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- difficulty --}}
                <div class="flex flex-col gap-2 items-start mb-4">
                    <label class="capitalize text-xl font-medium" for="beginner">difficulty</label>
                    <div class="flex gap-6">
                        <div>
                            <input type="radio" name="dificulty" id="beginner" value="beginner">
                            <label class="capitalize text-xl" for="dificulty">beginner</label>
                        </div>
                        <div>
                            <input type="radio" name="dificulty" id="intermediate" value="intermediate" checked>
                            <label class="capitalize text-xl" for="intermediate">intermediate</label>
                        </div>
                        <div>
                            <input type="radio" name="dificulty" id="expert" value="expert">
                            <label class="capitalize text-xl" for="expert">expert</label>
                        </div>
                        <div>
                            <input type="radio" name="dificulty" id="master_chef" value="master chef">
                            <label class="capitalize text-xl" for="master_chef">master chef</label>
                        </div>
                    </div>
                    @error('dificulty')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- ingredients --}}
                <div class="flex flex-col gap-2 items-start mb-4">
                    <label class="capitalize text-xl font-medium" for="ingredients">ingredients (Comma
                        Separated)</label>
                    <textarea class="w-full text-lg p-1 border border-stone-200 rounded" name="ingredients" id="ingredients" cols="30"
                        rows="5">{{ old('ingredients') }}</textarea>
                    @error('ingredients')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- steps --}}
                <div class="flex flex-col gap-2 items-start mb-4">
                    <label class="capitalize text-xl font-medium" for="steps">steps (Comma Separated)</label>
                    <textarea class="w-full text-lg p-1 border border-stone-200 rounded" name="steps" id="steps" cols="30"
                        rows="5">{{ old('steps') }}</textarea>
                    @error('steps')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- time --}}
                <div class="flex flex-col gap-2 items-start mb-4">
                    <label class="capitalize text-xl font-medium" for="time">time</label>
                    <div>
                        <input type="radio" name="dificulty" id="30" value="less than 30 minutes">
                        <label class="capitalize text-xl" for="30">less than 30 minutes</label>
                    </div>
                    <div>
                        <input type="radio" name="dificulty" id="60" value="60 minutes" checked>
                        <label class="capitalize text-xl" for="60">60 minutes</label>
                    </div>
                    <div>
                        <input type="radio" name="dificulty" id="90" value="around 90 minutes">
                        <label class="capitalize text-xl" for="90">around 90 minutes</label>
                    </div>
                    <div>
                        <input type="radio" name="dificulty" id="120" value="more than 120 minutes">
                        <label class="capitalize text-xl" for="120">more than 120 minutes</label>
                    </div>
                    @error('time')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- tags --}}
                <div class="flex flex-col gap-2 items-start mb-4">
                    <label for="tags" class="capitalize text-xl font-medium">
                        Tags (Comma Separated)
                    </label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags"
                        placeholder="Example: Tasty, Fast, Pasta, etc" value="{{ old('tags') }}" />
                    @error('tags')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- description --}}
                <div class="flex flex-col gap-2 items-start mb-4">
                    <label class="capitalize text-xl font-medium" for="description">description</label>
                    <textarea class="w-full text-lg p-1 border border-stone-200 rounded" name="description" id="description"
                        cols="30" rows="5">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- image --}}
                <div class="flex flex-col gap-2 items-start mb-4">
                    <label for="image" class="capitalize text-xl font-medium">
                        Image
                    </label>
                    <input type="file" class="border border-gray-200 rounded p-2 w-full" name="image" />
                    @error('image')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <button
                    class="text-xl text-white uppercase p-2 mb-4 bg-rose-500 rounded transition-colors duration-150 hover:bg-rose-400">ADD
                    RECIPE</button>

            </form>
        </x-card>
    </x-layout>
