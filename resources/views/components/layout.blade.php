<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-stone-50">
    <x-flash_message />
    <main class="text-stone-800">
        <nav>
            <div class="flex justify-between items-center px-4 py-2 mb-8 border-b-2 border-b-rose-400">
                <h1
                    class="uppercase text-3xl font-bold text-rose-500 transition-transform duration-150 hover:translate-x-4">
                    <a href="/recipes/public">recipes</a>
                </h1>
                <ul class="flex items-center gap-4 text-lg">
                    @auth
                        {{-- with user --}}
                        <li class="font-semibold"><span class="font-bold uppercase">hi!
                                {{ auth()->user()->name }}</span>
                        </li>
                        <a href="/recipes/public/recipes/manage">
                            <li class="hover:text-rose-600 duration-150 transition-colors"><i class="fa-solid fa-gear"></i>
                                Manage Recipes</li>
                        </a>
                        <li>
                            <form action="/recipes/public/users/logout" method="POST">
                                @csrf
                                <button type="submit"
                                    class="bg-rose-500 text-white py-2 px-4 rounded font-medium hover:bg-rose-600 duration-150 transition-colors">
                                    <i class="fa-solid fa-door-closed"></i> <span class="hidden md:inline">Logout</span>
                                </button>
                            </form>
                        </li>
                    @else
                        {{-- no user --}}
                        <a href="/recipes/public/login">
                            <li class="hover:text-rose-600 duration-150 transition-colors">
                                <i class="fa-solid fa-arrow-right-to-bracket"></i> <span class="font-medium">Login</span>
                            </li>
                        </a>
                        <a href="/recipes/public/register">
                            <li class="hover:text-rose-600 duration-150 transition-colors"><i
                                    class="fa-solid fa-user-plus"></i> <span class="font-medium">Register</span></li>
                        </a>
                    @endauth
                </ul>
            </div>
        </nav>
        <div class="px-2 mb-20">
            {{ $slot }}
        </div>
        <footer>
            <div
                class="fixed bottom-0 left-0 w-full items-center grid grid-rows-1 grid-cols-2 content-center bg-rose-500 p-3">
                <p class="text-start text-white font-medium text-lg">&copy; Copyright Juan Isturiz</p>
                <a class="justify-self-end"href="/recipes/public/add">
                    <button
                        class=" bg-white p-2 rounded text-rose-500 font-medium text-lg uppercase hover:animate-pulse">add
                        new
                        recipe</button>
                </a>
            </div>
        </footer>
    </main>
</body>

</html>
