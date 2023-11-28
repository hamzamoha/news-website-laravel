<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ fake()->sentence(6) }} | Men News</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.min.css" integrity="sha512-06CZo7raVnbbD3BlY8/hGUoUCuhk8sTdVGV3m3nuh9i2R+UmkLbLRTE/My8TuJ3ALbDulhBObJQWtOUt0mXzNQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/min/tiny-slider.min.js" integrity="sha512-sfTO4Pp4bdGjTlI1WZZ7zqcbBIo4NY51k1Gr99l1ezQIRboEqAbCNegL3vP65zQwP6aJjqqdDm1GPULlqp94Qw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    @include('inc.header')
    <div class="flex max-w-screen-xl mx-auto gap-10">
        <div class="w-2/3">
            <main>
                <div class="py-6 text-sm text-neutral-700">
                    <a class="transition-all hover:text-amber-500" href="/"><i class="fa-solid fa-house-chimney"></i> Home</a>
                    <span>/</span>
                    <a class="transition-all hover:text-amber-500" href="#">{{ fake()->word() }}</a>
                    <span>/</span>
                    <span>{{ fake()->sentence(8) }}</span>
                </div>
                <div class="py-2">
                    <a href="#" class="py-1 px-3.5 leading-6 rounded bg-green-500 hover:bg-green-600 text-white text-sm">News</a>
                </div>
                <h1 class="py-2 text-4xl font-semibold leading-normal text-neutral-800">
                    {{ Illuminate\Support\Str::title(fake()->sentence(7)) }}
                </h1>
                <h3 class="py-2 text-xl font-medium text-neutral-500">{{ ucfirst(fake()->sentence(9)) }}</h3>
                <div class="flex text-xs py-3 items-center">
                    <img src="" alt="" class="w-6 h-6 rounded-full inline-block mr-2">
                    <p>
                        John Smith <i class="fa-brands fa-x-twitter"></i> <i class="fa-solid fa-at"></i>
                    </p>
                    <span class="mx-3"><i class="fa-solid fa-circle text-[6px] leading-5 text-neutral-600"></i></span>
                    <p>May 12, 2023</p>
                    <span class="mx-3"><i class="fa-solid fa-circle text-[6px] leading-5 text-neutral-600"></i></span>
                    <p>Last Updated: Jul 8, 2023</p>
                    <p class="ml-auto">
                        <i class="fa-solid fa-comments"></i> 21 <i class="fa-solid fa-eye"></i> 21,684
                    </p>
                </div>
                <div class="h-0 relative pt-[56.25%] my-3">
                    <img src="https://source.unsplash.com/random/1600x1000?space" alt="" class="absolute inset-0 w-full h-full object-cover block border p-1">
                </div>
                <div id="content">
                    <h3 class="font-bold text-lg py-2 mb-2">{{ ucfirst(fake()->sentence(5)) }}</h3>
                    <p class="py-4">{{ fake()->paragraph(7) }}</p>
                    <p class="py-4">{{ fake()->paragraph(8) }}</p>
                    <p class="py-4">{{ fake()->paragraph(10) }}</p>
                    <p class="py-4">{{ fake()->paragraph(5) }}</p>
                    <p class="py-4">{{ fake()->paragraph(4) }}</p>
                    <h3 class="font-bold text-lg py-2 mb-2">{{ ucfirst(fake()->sentence(4)) }}</h3>
                    <p class="py-4">{{ fake()->paragraph(8) }}</p>
                    <p class="py-4">{{ fake()->paragraph(10) }}</p>
                    <p class="py-4">{{ fake()->paragraph(5) }}</p>
                    <h3 class="font-bold text-lg py-2 mb-2">{{ ucfirst(fake()->sentence(6)) }}</h3>
                    <p class="py-4">{{ fake()->paragraph(5) }}</p>
                    <p class="py-4">{{ fake()->paragraph(6) }}</p>
                    <p class="py-4">{{ fake()->paragraph(3) }}</p>
                </div>
                <div class="py-3 flex flex-wrap gap-2 items-center">
                    <div class="font-bold">Tags:</div>
                    @for ($i = 0; $i < 5; $i++)
                        <a href="#" class="py-0.5 px-1.5 text-sm border rounded transition-all hover:bg-neutral-100">{{ fake()->word() }}</a>
                    @endfor
                </div>
                <div class="px-3 py-4 border my-5 flex items-start">
                    <div class="font-bold leading-10 text-sm px-4"><i class="fa-solid fa-share-nodes mr-2"></i>Share</div>
                    <div class="ml-auto">
                        <ul class="flex flex-wrap gap-2 justify-end">
                            <li><a class="block h-10 w-10 leading-10 text-white text-center rounded-full transition-all hover:opacity-70 bg-neutral-900" href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                            <li><a class="block h-10 w-10 leading-10 text-white text-center rounded-full transition-all hover:opacity-70 bg-sky-700" href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            <li><a class="block h-10 w-10 leading-10 text-white text-center rounded-full transition-all hover:opacity-70 bg-blue-500" href="#"><i class="fa-brands fa-facebook"></i></a></li>
                            <li><a class="block h-10 w-10 leading-10 text-white text-center rounded-full transition-all hover:opacity-70 bg-red-600" href="#"><i class="fa-brands fa-pinterest"></i></a></li>
                            <li><a class="block h-10 w-10 leading-10 text-white text-center rounded-full transition-all hover:opacity-70 bg-orange-600" href="#"><i class="fa-brands fa-reddit"></i></a></li>
                            <li><a class="block h-10 w-10 leading-10 text-white text-center rounded-full transition-all hover:opacity-70 bg-gray-700" href="#"><i class="fa-brands fa-tumblr"></i></a></li>
                            <li><a class="block h-10 w-10 leading-10 text-white text-center rounded-full transition-all hover:opacity-70 bg-[#45668e]" href="#"><i class="fa-brands fa-vk"></i></a></li>
                            <li><a class="block h-10 w-10 leading-10 text-white text-center rounded-full transition-all hover:opacity-70 bg-sky-600" href="#"><i class="fa-brands fa-facebook-messenger"></i></a></li>
                            <li><a class="block h-10 w-10 leading-10 text-white text-center rounded-full transition-all hover:opacity-70 bg-yellow-700" href="#"><i class="fa-solid fa-envelope"></i></a></li>
                            <li><a class="block h-10 w-10 leading-10 text-white text-center rounded-full transition-all hover:opacity-70 bg-yellow-800" href="#"><i class="fa-solid fa-print"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="flex text-neutral-800 items-start py-3">
                    <img class="w-40 h-40 rounded-full object-cover" src="https://source.unsplash.com/random/400x400?man,boy,guy,male,person" alt="">
                    <div class="px-5 flex-1">
                        <div class="text-lg font-medium pb-2">{{ fake()->name() }}</div>
                        <div class="text-sm py-2">
                            <p>{{ fake()->paragraph(2) }}</p>
                        </div>
                        <div class="py-1">
                            <ul class="flex items-center gap-3 text-sm">
                                <li><a href="#" class="transition-all hover:text-amber-400"><i class="fa-brands fa-x-twitter"></i></a></li>
                                <li><a href="#" class="transition-all hover:text-amber-400"><i class="fa-brands fa-instagram"></i></a></li>
                                <li><a href="#" class="transition-all hover:text-amber-400"><i class="fa-brands fa-facebook"></i></a></li>
                                <li><a href="#" class="transition-all hover:text-amber-400"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </main>
            @include('inc.related_posts')
            <section>
                <form action="/" method="POST" class="px-6 py-4 my-5 bg-neutral-100 border text-center border-neutral-300">
                    @csrf
                    <div class="py-3">
                        <i class="fa-solid fa-envelope text-5xl text-neutral-300"></i>
                    </div>
                    <div class="text-xl py-1">
                        With Product You Purchase
                    </div>
                    <div class="text-3xl py-1 font-medium">
                        Subscribe to our mailing list to get the new updates!
                    </div>
                    <div class="py-1 text-sm">
                        With Product You Purchase
                    </div>
                    <div class="relative my-2">
                        <input type="email" name="email" placeholder="Enter your Email address" class="w-full rounded text-sm bg-neutral-100 block border py-2.5 text-center leading-5 px-1 outline-none border-neutral-300">
                        <i class="fa-solid fa-envelope fa-lg text-neutral-300 h-10 leading-10 w-10 absolute left-0 top-0 text-center"></i>
                    </div>
                    <div class="py-2">
                        <button type="submit" class="outline-none block w-full py-1 leading-8 text-sm rounded-full bg-amber-500 transition-all hover:bg-amber-600 text-white">Subscribe</button>
                    </div>
                </form>
            </section>
            @include('inc.comments')
        </div>
        <div class="w-1/3">
            @include('inc.aside')
        </div>
    </div>
    @include('inc.footer')
</body>
</html>