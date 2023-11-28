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
    <div class="flex max-w-screen-xl mx-auto gap-10">
        <div class="w-2/3">
            @include('inc.magazine_box')
            @include('inc.Magazine_2rows')
            @include('inc.magazine_box_single')
            @include('inc.videos')
            <section class="ad-banner">
                <div class="my-5 mx-auto max-w-[700px] h-24 bg-neutral-800 text-center leading-10 py-7">
                    <span class="text-white text-3xl">Ad Banner</span>
                </div>
            </section>
            <main>
                <div class="my-5">
                    <div class="flex py-3 border-b-2 mb-3">
                        <div class="text-lg text-red-500 mr-auto font-semibold">What's New</div>
                    </div>
                    <div class="grid sm:grid-cols-2 gap-8 mb-8">
                        @for ($i = 0; $i < 4; $i++)
                        <div>
                            <div class="h-52 relative">
                                <a href="#" class="block h-full w-full hover:opacity-80 transition-all">
                                    <img src="https://source.unsplash.com/random/800x450?Nature&sig={{$i}}" class="h-full w-full object-cover block" alt="">
                                </a>
                                <a class="absolute bottom-2 block right-2 px-2 py-1 rounded-sm text-white bg-cyan-500 transition-all hover:bg-cyan-600 text-xs" href="#">Home</a>
                            </div>
                            <div>
                                <div class="flex text-xs py-1">
                                    <p class="mr-auto">
                                        <i class="fa-regular fa-circle-user"></i> John Smith <i class="fa-regular fa-clock"></i> May 12, 2023
                                    </p>
                                    <p>
                                        <i class="fa-solid fa-comments"></i> 21 <i class="fa-solid fa-eye"></i> 21,684
                                    </p>
                                </div>
                                <a href="#" class="block hover:text-red-500 transition-all text-xl font-medium py-1">Budget issues force the Tour to be cancelled</a>
                                <p class="text-sm text-neutral-500 py-1">Stay focused and remember we design the best WordPress News and Magazine Themes</p>
                            </div>
                        </div>
                        @endfor
                    </div>
                    <button type="button" class="mx-auto max-w-full block text-sm w-52 text-center py-3 px-1 border transition-all hover:text-red-500">Load More</button>
                </div>
            </main>
        </div>
        <div class="w-1/3">
            @include('inc.aside')
        </div>
    </div>
    @include('inc.footer')
</body>

</html>
