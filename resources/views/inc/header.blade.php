<header>
    <nav class="bg-black text-white">
        <div class="flex max-w-screen-xl mx-auto items-center">
            <img class="mr-auto block h-10" src="/images/logo.png" alt="{{ env('APP_NAME', 'App Name') }}"
                title="{{ env('APP_NAME', 'App Name') }}">
            <ul class="ml-auto flex items-center h-16">
                <li class="mx-2"><a class="transition-all hover:text-yellow-400 p-1" href="#">News</a></li>
                <li class="mx-2"><a class="transition-all hover:text-yellow-400 p-1" href="#">News</a></li>
                <li class="mx-2"><a class="transition-all hover:text-yellow-400 p-1" href="#">News</a></li>
                <li class="mx-2"><a class="transition-all hover:text-yellow-400 p-1" href="#">News</a></li>
                <li class="mx-2">
                    <form action="/search" class="relative block text-neutral-800">
                        <input required type="text" name="q" placeholder="Search..." id="q"
                            class="block rounded leading-8 px-1 w-32 transition-all focus:w-56 border-none outline-none">
                        <button type="submit"
                            class="absolute top-0 right-0 h-8 w-8 rounded leading-8 text-center"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
</header>