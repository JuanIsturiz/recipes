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
    <main class="max-w-6xl mx-auto text-stone-800">
        <nav>
            <div class="flex justify-between items-center px-4 py-2 mb-8 border-b-2 border-b-rose-300">
                <h1 class="uppercase text-3xl font-bold text-rose-400">recipes</h1>
                <ul class="flex gap-4 text-lg">
                    @auth
                        {{-- with user --}}
                        <li class="font-semibold"><span class="font-bold uppercase">Welcome
                                {{ auth()->user()->name }}</span>
                        </li>
                        <a href="/recipes/public/manage">
                            <li class="hover:text-rose-600 duration-150 transition-colors"><i class="fa-solid fa-gear"></i>
                                Manage Listings</li>
                        </a>
                        <li>
                            <form action="/recipes/public/users/logout" method="POST">
                                @csrf
                                <button type="submit">
                                    <i class="fa-solid fa-door-closed"></i> Logout
                                </button>
                            </form>
                        </li>
                    @else
                        {{-- no user --}}
                        <a href="/recipes/public/recipes">
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
        {{ $slot }}
        <footer>footer</footer>
    </main>
</body>

</html>
