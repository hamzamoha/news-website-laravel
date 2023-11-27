<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/css/app.css')
</head>

<body>
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
                            <input required type="text" name="q" placeholder="Search..." id="name"
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
    @include('inc.slide')
    <div class="flex max-w-screen-xl mx-auto gap-5">
        <div class="w-3/5">
            @include('inc.magazine_box')
            @include('inc.Magazine_2rows')
            @include('inc.magazine_box_single')
            @include('inc.videos')
            <main>
            </main>
        </div>
        <div class="w-2/5">
            <aside></aside>
        </div>
    </div>
</body>

</html>
