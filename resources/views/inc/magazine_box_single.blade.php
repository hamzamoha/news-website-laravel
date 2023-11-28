<section id="magazine-box">
    <div class="bg-blue-100 px-5 pb-3 my-5">
        <div class="flex py-3 border-b-2 border-neutral-400">
            <div class="text-lg text-blue-500 mr-auto font-semibold">Technology</div>
        </div>
        <div class="grid grid-cols-2 gap-3 my-5">
            <div class="py-3">
                <a href="{{ route('posts.show', ['slug'=>fake()->slug(6)]) }}" class="block hover:opacity-80 transition-all">
                    <img src="https://source.unsplash.com/random/400x225?Technology" class="h-52 w-full object-cover block mb-2" alt="">
                </a>
                <div class="flex text-xs py-1">
                    <p class="mr-auto">
                        <i class="fa-regular fa-circle-user"></i> John Smith <i class="fa-regular fa-clock"></i> May 12, 2023
                    </p>
                    <p>
                        <i class="fa-solid fa-comments"></i> 21 <i class="fa-solid fa-eye"></i> 21,684
                    </p>
                </div>
                <a href="{{ route('posts.show', ['slug'=>fake()->slug(6)]) }}" class="block hover:text-blue-400 transition-all text-xl font-medium py-1">Budget issues force the Tour to be cancelled</a>
                <p class="text-sm text-neutral-500 py-1 mb-3">Stay focused and remember we design the best WordPress News and Magazine Themes</p>
                <a href="{{ route('posts.show', ['slug'=>fake()->slug(6)]) }}" class="py-2.5 text-sm px-5 inline-block font-medium rounded-full text-white bg-blue-500 transition-all hover:bg-blue-600">Read More <i class="fa-solid fa-angles-right fa-2xs"></i></a>
            </div>
            <div class="grid grid-rows-4 grid-flow-col gap-5">
                @for ($i = 0; $i < 4; $i++) <div class="felx items-center">
                    <a href="{{ route('posts.show', ['slug'=>fake()->slug(6)]) }}" class="flex group">
                        <div class="w-1/3 h-20 group-hover:opacity-80 transition-all">
                            <img class="w-full h-full object-cover" src="https://source.unsplash.com/random/200x112?Technology&sig={{$i+1}}" alt="test">
                        </div>
                        <div class="w-2/3 pl-2">
                            <p class="text-neutral-500 text-sm leading-6">Nov 15, 2023</p>
                            <h3 class="text-lg group-hover:text-blue-400 transition-all font-medium leading-7 overflow-hidden max-h-14">From the River to the Sea to the Sea to the Sea</h3>
                        </div>
                    </a>
            </div>
            @endfor
        </div>
    </div>
    </div>
</section>