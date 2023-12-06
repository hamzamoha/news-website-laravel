<section id="magazine-box">
    <div class="flex py-3 border-b-2">
        <div class="text-lg text-rose-400 mr-auto font-semibold">Trending News</div>
        <div class="ml-auto">
            <ul class="flex">
                <li class="group mx-0.5 lg:mx-1 active"><a class="group-[.active]:text-rose-400 hover:group-[.active]:text-white rounded-sm transition-all hover:bg-rose-400 hover:text-white text-xs px-1.5 py-1" href="#">All</a></li>
                <li class="group mx-0.5 lg:mx-1"><a class="group-[.active]:text-rose-400 hover:group-[.active]:text-white rounded-sm transition-all hover:bg-rose-400 hover:text-white text-xs px-1.5 py-1" href="#">Foods</a></li>
                <li class="group mx-0.5 lg:mx-1"><a class="group-[.active]:text-rose-400 hover:group-[.active]:text-white rounded-sm transition-all hover:bg-rose-400 hover:text-white text-xs px-1.5 py-1" href="#">Life Style</a></li>
                <li class="group mx-0.5 lg:mx-1"><a class="group-[.active]:text-rose-400 hover:group-[.active]:text-white rounded-sm transition-all hover:bg-rose-400 hover:text-white text-xs px-1.5 py-1" href="#">Sports</a></li>
                <li class="group mx-0.5 lg:mx-1"><a class="group-[.active]:text-rose-400 hover:group-[.active]:text-white rounded-sm transition-all hover:bg-rose-400 hover:text-white text-xs px-1.5 py-1" href="#">Travel</a></li>
                <li class="group mx-0.5 lg:mx-1"><a class="group-[.active]:text-rose-400 hover:group-[.active]:text-white rounded-sm transition-all hover:bg-rose-400 hover:text-white text-xs px-1.5 py-1" href="#">Technology</a></li>
            </ul>
        </div>
    </div>
    <div class="grid grid-cols-2 gap-3 h-[480px] my-5">
        <div class="relative group bg-cover bg-[url('https://source.unsplash.com/random/500x900')]">
            <div class="absolute group-hover:opacity-80 transition-all inset-0 w-full h-full bg-gradient-to-t from-[rgba(0,0,0,0.7)] to-transparent"></div>
            <a href="{{ route('posts.show', ['slug'=>fake()->slug(6)]) }}" class="absolute inset-0 w-full h-full flex flex-col justify-end px-3">
                <div class="block text-white pb-3">
                    <span href="#" class="py-0.5 px-2.5 leading-6 rounded bg-blue-500 hover:bg-blue-600 text-sm">News</span>
                    <h3 class="text-2xl font-medium py-1">From the River to the Sea h-140 120 / 5 60</h3>
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
        <div class="grid grid-rows-5 grid-flow-col gap-5">
            @for ($i = 0; $i < 5; $i++)
            <div class="felx items-center">
                <a href="{{ route('posts.show', ['slug'=>fake()->slug(6)]) }}" class="flex group">
                    <div class="w-1/3 h-20 group-hover:opacity-80 transition-all">
                        <img class="w-full h-full object-cover" src="https://source.unsplash.com/random/200x112?sig={{$i}}" alt="test">
                    </div>
                    <div class="w-2/3 pl-2">
                        <p class="text-neutral-500 text-xs md:text-sm leading-6">Nov 15, 2023</p>
                        <h3 class="text-sm md:text-base lg:text-lg font-medium leading-7 overflow-hidden max-h-14">From the River to the Sea to the Sea to the Sea</h3>
                    </div>
                </a>
            </div>
            @endfor
        </div>
    </div>
</section>