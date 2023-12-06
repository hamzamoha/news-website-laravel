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
    @include('inc.header')
    @include('inc.slide')
    <div class="flex flex-wrap md:flex-nowrap max-w-screen-xl mx-auto gap-10 px-2">
        <div class="w-full md:w-2/3">
            <section class="ad-banner">
                <div class="my-5 mx-auto max-w-[700px] h-24 bg-neutral-800 text-center leading-10 py-7">
                    <span class="text-white text-3xl">Ad Banner</span>
                </div>
            </section>
            <main>
                <div class="my-5 px-1">
                    <div class="py-6 text-sm text-neutral-700">
                        <a class="transition-all hover:text-amber-500" href="/"><i class="fa-solid fa-house-chimney"></i> Home</a>
                        <span>/</span>
                        <span>{{ ucwords($category) }}</span>
                    </div>
                    <div class="py-6">
                        <div class="text-5xl text-neutral-800 mr-auto font-medium">{{ ucwords($category) }}</div>
                    </div>
                    <div class="mb-8">
                        @for ($i = 0; $i < 8; $i++)
                        <div class="grid sm:grid-cols-2 gap-3 py-2">
                            <div class="relative">
                                <a href="#" class="relative pt-[56.25%] block w-full hover:opacity-80 transition-all">
                                    <img src="https://source.unsplash.com/random/800x450?Nature&sig={{$i}}" class="absolute inset-0 h-full w-full object-cover block" alt="">
                                </a>
                            </div>
                            <div class="">
                                <div class="flex text-xs py-1">
                                    <p class="mr-auto">
                                        <i class="fa-regular fa-circle-user"></i> John Smith <i class="fa-regular fa-clock"></i> May 12, 2023
                                    </p>
                                    <p>
                                        <i class="fa-solid fa-comments"></i> 21 <i class="fa-solid fa-eye"></i> 21,684
                                    </p>
                                </div>
                                <a href="#" class="block hover:text-sky-500 transition-all text-xl font-medium py-1">Budget issues force the Tour to be cancelled</a>
                                <p class="text-sm text-neutral-500 py-1">Stay focused and remember we design the best WordPress News and Magazine Themes</p>
                                <div class="py-1">
                                    <a class="inline-block py-2.5 text-sm font-semibold text-white px-7 bg-sky-400 transition-all hover:bg-sky-500 rounded-full" href="#">Read More <i class="fa-solid fa-angles-right fa-xs"></i></a>
                                </div>
                            </div>
                        </div>
                        @endfor
                    </div>
                    <button type="button" class="mx-auto max-w-full block text-sm w-52 text-center py-3 px-1 border transition-all hover:text-red-500">Load More</button>
                </div>
            </main>
        </div>
        <div class="w-full md:w-1/3">
            @include('inc.aside')
        </div>
    </div>
    @include('inc.footer')
</body>

</html>
