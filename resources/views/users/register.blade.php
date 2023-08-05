<x-layout>
    <div class="text-center">
        <x-card class="w-1/2 p-2 mx-auto">
            <h2 class="uppercase text-3xl font-semibold text-rose-500">Sign up</h2>
            <h3 class="text-xl font-medium text-stone-600">Create a new account here!</h3>
            <form action="/recipes/public/users/new" method="POST">
                @csrf
                <div class="flex flex-col gap-2 items-start mb-4">
                    <label class="capitalize text-xl font-medium" for="name">name</label>
                    <input class="w-full text-lg p-1 border border-stone-200 rounded" type="text" name="name"
                        id="name" placeholder="john_doe" value="{{ old('name') }}">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-2 items-start mb-4">
                    <label class="capitalize text-xl font-medium" for="email">email</label>
                    <input class="w-full text-lg p-1 border border-stone-200 rounded" type="text" name="email"
                        id="email" placeholder="johndoe@mail.com" value="{{ old('email') }}">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-2 items-start mb-4">
                    <label class="capitalize text-xl font-medium" for="password">password</label>
                    <input class="w-full text-lg p-1 border border-stone-200 rounded" type="password" name="password"
                        id="password">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-2 items-start mb-4">
                    <label class="capitalize text-xl font-medium" for="password_confirmation">confirm password</label>
                    <input class="w-full text-lg p-1 border border-stone-200 rounded" type="password"
                        name="password_confirmation" id="password_confirmation">
                    @error('password_confirmation')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <button
                    class="text-xl text-white uppercase p-2 mb-4 bg-rose-500 rounded transition-colors duration-150 hover:bg-rose-400">register</button>
                <p class="mb-4 text-lg">Already have an account? Sign In <a class="text-rose-500 underline"
                        href="/recipes/public/login">here</a></p>
            </form>
        </x-card>
    </div>
</x-layout>
