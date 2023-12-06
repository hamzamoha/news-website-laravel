<section id="videos">
    <div class="flex py-3 border-b-2 mb-3">
        <div class="text-lg text-purple-500 mr-auto font-semibold">Videos</div>
    </div>
    <div class="relative h-[450px] group bg-cover bg-[url('https://source.unsplash.com/random/600x500?Video')]">
        <div class="absolute group-hover:opacity-80 transition-all inset-0 w-full h-full bg-gradient-to-t from-[rgba(0,0,0,0.7)] to-transparent"></div>
        <a href="#" class="absolute inset-0 w-full h-full flex flex-col justify-end px-3">
            <div class="block text-white pb-3">
                <span href="#" class="py-0.5 px-2.5 leading-6 rounded bg-blue-500 hover:bg-blue-600 text-sm">News</span>
                <h3 class="text-2xl font-medium py-1 group-hover:text-purple-300 transition-all">From the River to the Sea h-140 120 / 5 60</h3>
                <div class="flex text-xs text-white py-1">
                    <p class="mr-auto">
                        <i class="fa-regular fa-circle-user"></i> John Smith <i class="fa-regular fa-clock"></i> May 12, 2023
                    </p>
                    <p>
                        <i class="fa-solid fa-comments"></i> 21 <i class="fa-solid fa-eye"></i> 21,684
                    </p>
                </div>
            </div>
        </a>
    </div>
    <div class="py-8">
        <div class="grid grid-cols-2 md:grid-cols-3 gap-8">
            @for ($i = 0; $i < 3; $i++)
            <div class="py-3{{$i==2?' hidden md:block':''}}">
                <a href="#" class="block hover:opacity-80 transition-all">
                    <img src="https://source.unsplash.com/random/400x225?Video&sig={{$i+1}}" class="h-40 w-full object-cover block mb-2" alt="">
                </a>
                <div class="flex text-xs py-1">
                    <p class="mr-auto">
                        <i class="fa-regular fa-clock"></i> May 12, 2023
                    </p>
                    <p>
                        <i class="fa-solid fa-comments"></i> 10
                    </p>
                </div>
                <a href="#" class="block hover:text-purple-400 transition-all text-xl font-medium py-1">Budget issues force the Tour to be cancelled</a>
            </div>
            @endfor
        </div>
    </div>
</section>