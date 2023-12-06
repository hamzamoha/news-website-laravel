<footer>
    <div class="text-white bg-slate-800 px-2">
        <div class="max-w-screen-xl mx-auto py-5">
            <div class="grid py-5 gap-8 sm:grid-cols-2 md:grid-cols-4">
                <div>
                    <div class="mb-3">
                        <span class="inline-block py-3 border-b-2 border-white">Most Viewed Posts</span>
                    </div>
                    @for ($i = 0; $i < 3; $i++)
                    <a href="#" class="block {{$i==2?"pl-3":"pb-3 pl-3"}} group border-l-2 border-slate-900 relative">
                        <div class="text-[10px] leading-tight text-neutral-400">May 17, 2023</div>
                        <div class="text-sm font-bold py-1 group-hover:text-amber-400 transition-all">{{fake()->sentence(7)}}</div>
                        <div class="absolute w-3 h-3 group-hover:border-amber-500 group-hover:bg-amber-400 transition-all rounded-full bg-neutral-600 border-2 border-neutral-500 top-0 -left-[7px]"></div>
                    </a>
                    @endfor
                </div>
                <div>
                    <div class="mb-3">
                        <span class="inline-block py-3 border-b-2 border-white">Last Modified Posts</span>
                    </div>
                    <div class="grid grid-cols-3 gap-2">
                        @for ($i = 0; $i < 9; $i++)
                        <a href="#" class="block bg-white h-14">
                            <img class="block h-full w-full object-cover transition-all hover:opacity-80" src="https://source.unsplash.com/random/100x55?&sig={{$i}}" alt="test">
                        </a>
                        @endfor
                    </div>
                </div>
                <div>
                    <div class="mb-3">
                        <span class="inline-block py-3 border-b-2 border-white">Tags</span>
                    </div>
                    <div class="flex gap-2 flex-wrap">
                        @for ($i = 0; $i < 20; $i++)
                        <a href="#" class="block py-1 px-2 rounded border transition-all hover:bg-slate-700 text-sm border-slate-500">{{fake()->word()}}</a>
                        @endfor
                    </div>
                </div>
                <div>
                    <div class="mb-3">
                        <span class="inline-block py-3 border-b-2 border-white">Follow Us</span>
                    </div>
                    <div class="grid lg:grid-cols-2 gap-3">
                        <a href="#" class="flex bg-blue-500 transition-all hover:bg-blue-400 h-10">
                            <div class="h-full w-10 leading-8 py-1 text-center font-black text-lg text-white"><i class="fa-brands fa-facebook-f"></i></div>
                            <div class="flex flex-col justify-center">
                                <div class="text-white font-bold text-xs leading-4">1.3M</div>
                                <div class="text-neutral-300 text-[10px] leading-3">Likes</div>
                            </div>
                        </a>
                        <a href="#" class="flex bg-neutral-900 transition-all hover:bg-neutral-800 h-10">
                            <div class="h-full w-10 leading-8 py-1 text-center font-black text-lg text-white"><i class="fa-brands fa-x-twitter"></i></div>
                            <div class="flex flex-col justify-center">
                                <div class="text-white font-bold text-xs leading-4">943.5K</div>
                                <div class="text-neutral-300 text-[10px] leading-3">Followers</div>
                            </div>
                        </a>
                        <a href="#" class="flex bg-red-600 transition-all hover:bg-red-500 h-10">
                            <div class="h-full w-10 leading-8 py-1 text-center font-black text-lg text-white"><i class="fa-brands fa-youtube"></i></div>
                            <div class="flex flex-col justify-center">
                                <div class="text-white font-bold text-xs leading-4">1.1M</div>
                                <div class="text-neutral-300 text-[10px] leading-3">Subscribers</div>
                            </div>
                        </a>
                        <a href="#" class="flex bg-fuchsia-600 transition-all hover:bg-fuchsia-500 h-10">
                            <div class="h-full w-10 leading-8 py-1 text-center font-black text-lg text-white"><i class="fa-brands fa-instagram"></i></div>
                            <div class="flex flex-col justify-center">
                                <div class="text-white font-bold text-xs leading-4">1.5M</div>
                                <div class="text-neutral-300 text-[10px] leading-3">Followers</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="grid md:grid-cols-3 gap-10 py-8">
                <div class="">
                    <img src="/images/logo-transparent.png" alt="Logo" class="block max-w-full h-20 object-contain mx-auto">
                </div>
                <div>
                    <p class="text-sm">Men News is a Clean Responsive Newspaper, Magazine, News and Blog theme. Built with Laravel and Tailwindcss that allow you to completely customize your website to your needs.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="text-slate-200 text-sm bg-slate-900">
        <div class="max-w-screen-xl mx-auto flex h-16 items-center">
            <p class="mr-auto">© Copyright 2023, All Rights Reserved</p>
            <ul class="flex mr-4">
                <li><a class="transition-all rounded py-0.5 px-1.5 hover:bg-amber-500" href="#"><i class="fa-brands fa-facebook"></i></a></li>
                <li><a class="transition-all rounded py-0.5 px-1.5 hover:bg-amber-500" href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                <li><a class="transition-all rounded py-0.5 px-1.5 hover:bg-amber-500" href="#"><i class="fa-brands fa-instagram"></i></a></li>
                <li><a class="transition-all rounded py-0.5 px-1.5 hover:bg-amber-500" href="#"><i class="fa-brands fa-youtube"></i></a></li>
            </ul>
            <ul class="flex gap-3">
                <li><a class="transition-all hover:text-amber-400" href="#">Home</a></li>
                <li><a class="transition-all hover:text-amber-400" href="#">Activity</a></li>
                <li><a class="transition-all hover:text-amber-400" href="#">Authors</a></li>
                <li><a class="transition-all hover:text-amber-400" href="#">Members</a></li>
                <li><a class="transition-all hover:text-amber-400" href="#">Shop</a></li>
            </ul>
        </div>
    </div>
</footer>