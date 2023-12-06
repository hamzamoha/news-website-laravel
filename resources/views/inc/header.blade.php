<header>
    <nav class="bg-black text-white">
        <div class="flex max-w-screen-xl mx-auto items-center px-2">
            <a class="mr-auto block h-14 pl-0.5" href="/">
                <img class="block h-full" src="/images/logo.png" alt="{{ env('APP_NAME', 'App Name') }}"
                title="{{ env('APP_NAME', 'App Name') }}">
            </a>
            <ul class="hidden sm:flex ml-auto items-center h-16">
                <li class="mx-2"><a class="transition-all hover:text-yellow-400 text-sm md:text-base py-1 px-0.5 md:px-1" href="#">News</a></li>
                <li class="mx-2"><a class="transition-all hover:text-yellow-400 text-sm md:text-base py-1 px-0.5 md:px-1" href="#">News</a></li>
                <li class="mx-2"><a class="transition-all hover:text-yellow-400 text-sm md:text-base py-1 px-0.5 md:px-1" href="#">News</a></li>
                <li class="mx-2"><a class="transition-all hover:text-yellow-400 text-sm md:text-base py-1 px-0.5 md:px-1" href="#">News</a></li>
                <li class="ml-2">
                    <form action="/search" class="relative block text-neutral-800">
                        <input required type="text" name="q" placeholder="Search..." id="q"
                            class="block rounded leading-8 px-1 w-32 transition-all focus:w-44 md:focus:w-56 border-none outline-none">
                        <button type="submit"
                            class="absolute block hidden lg:block top-0 right-0 h-8 w-8 rounded leading-8 text-center"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </li>
            </ul>
            <div class="flex-1 flex sm:hidden">
                <button type="button" onclick="this.classList.add('hidden')" class="peer bg-neutral-900 ml-auto h-14 w-14 text-center py-2 leading-10">
                    <i class="fa-solid fa-magnifying-glass text-lg"></i>
                </button>
                <form action="/search" class="hidden peer-[.hidden]:block relative text-neutral-800 pl-2 pr-1 w-full">
                    <input required type="text" name="q" placeholder="Search..." id="q"
                        class="block rounded leading-10 px-1 w-full transition-all border-none outline-none">
                    <button type="button" onclick="this.closest('form').parentElement.children[0].classList.remove('hidden')"
                        class="absolute block outline-none sm:hidden md:block top-0 right-1 h-10 w-10 rounded leading-8 text-center"><i
                            class="fa-solid fa-times"></i></button>
                </form>
            </div>
        </div>
        <div class="py-1 max-w-screen-xl mx-auto sm:hidden">
            <ul class="w-full flex flex-wrap items-center mx-auto gap-2">
                <li class="flex-1 block text-center pr-4"><a class="block py-2" href="#">News</a></li>
                <li class="flex-1 block text-center px-2"><a class="block py-2" href="#">Home</a></li>
                <li class="flex-1 block text-center pl-4"><a class="block py-2" href="#">About Us</a></li>
            </ul>
        </div>
    </nav>
</header>