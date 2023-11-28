<section>
    <div class="grid md:grid-cols-2 gap-8">
    @for ($i = 0; $i < 2; $i++)
        <div>
            <div class="py-3 text-lg text-amber-500 border-b-2 font-medium">
                Sports
            </div>
            <div class="py-3">
                <div class="mb-3">
                    <a href="#" class="block hover:opacity-80 transition-all">
                        <img src="https://source.unsplash.com/random/400x225?sig={{$i}}" class="h-52 w-full object-cover block mb-2" alt="">
                    </a>
                    <div class="flex text-xs py-1">
                        <p class="mr-auto">
                            <i class="fa-regular fa-circle-user"></i> John Smith <i class="fa-regular fa-clock"></i> May 12, 2023
                        </p>
                        <p>
                            <i class="fa-solid fa-comments"></i> 21 <i class="fa-solid fa-eye"></i> 21,684
                        </p>
                    </div>
                    <a href="{{ route('posts.show', ['slug'=>fake()->slug(6)]) }}" class="block hover:text-amber-400 transition-all text-xl font-medium py-1">Budget issues force the Tour to be cancelled</a>
                    <p class="text-sm text-neutral-500 py-1 mb-3">Stay focused and remember we design the best WordPress News and Magazine Themes</p>
                    <a href="{{ route('posts.show', ['slug'=>fake()->slug(6)]) }}" class="py-2.5 text-sm px-5 inline-block font-medium rounded-full text-white bg-amber-500 transition-all hover:bg-amber-600">Read More <i class="fa-solid fa-angles-right fa-2xs"></i></a>
                </div>
            </div>
            @for ($j = 0; $j < 2; $j++)
            <div class="felx items-center my-3">
                <a href="{{ route('posts.show', ['slug'=>fake()->slug(6)]) }}" class="flex group">
                    <div class="w-1/3 h-20 group-hover:opacity-80 transition-all">
                        <img class="w-full h-full object-cover" src="https://source.unsplash.com/random/200x112?sig={{ rand(15,8888) }}" alt="test">
                    </div>
                    <div class="w-2/3 pl-2">
                        <p class="text-neutral-500 text-sm leading-6">Nov 15, 2023</p>
                        <h3 class="text-lg font-medium leading-7 overflow-hidden max-h-14">From the River to the Sea to the Sea to the Sea</h3>
                    </div>
                </a>
            </div>
            @endfor
        </div>
    @endfor
    </div>
</section>