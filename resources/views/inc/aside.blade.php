<aside class="sticky -top-60">
    <section id="follow_us">
        <div class="py-3 mb-3 text-lg border-b-2">
            Follow Us
        </div>
        <div class="grid sm:grid-cols-2 gap-0.5 sm:gap-1 md:gap-2 lg:gap-3">
            <a href="#" class="flex bg-blue-500 transition-all hover:bg-blue-400 h-14">
                <div class="h-full w-14 leading-10 py-2 text-center text-xl text-white"><i class="fa-brands fa-facebook-f"></i></div>
                <div class="flex flex-col justify-center">
                    <div class="text-white font-bold text-sm leading-5">1.3M</div>
                    <div class="text-neutral-300 text-xs leading-4">Likes</div>
                </div>
            </a>
            <a href="#" class="flex bg-neutral-900 transition-all hover:bg-neutral-800 h-14">
                <div class="h-full w-14 leading-10 py-2 text-center text-xl text-white"><i class="fa-brands fa-x-twitter"></i></div>
                <div class="flex flex-col justify-center">
                    <div class="text-white font-bold text-sm leading-5">943.5K</div>
                    <div class="text-neutral-300 text-xs leading-4">Followers</div>
                </div>
            </a>
            <a href="#" class="flex bg-red-600 transition-all hover:bg-red-500 h-14">
                <div class="h-full w-14 leading-10 py-2 text-center text-xl text-white"><i class="fa-brands fa-youtube"></i></div>
                <div class="flex flex-col justify-center">
                    <div class="text-white font-bold text-sm leading-5">1.1M</div>
                    <div class="text-neutral-300 text-xs leading-4">Subscribers</div>
                </div>
            </a>
            <a href="#" class="flex bg-fuchsia-600 transition-all hover:bg-fuchsia-500 h-14">
                <div class="h-full w-14 leading-10 py-2 text-center text-xl text-white"><i class="fa-brands fa-instagram"></i></div>
                <div class="flex flex-col justify-center">
                    <div class="text-white font-bold text-sm leading-5">1.5M</div>
                    <div class="text-neutral-300 text-xs leading-4">Followers</div>
                </div>
            </a>
        </div>
    </section>
    <section id="weather">
        <div class="py-5">
            <div class="relative">
                <div class="py-3 mb-3 text-lg border-b-2">
                    Weather
                </div>
                <div class="tomorrow" data-language="EN" data-unit-system="METRIC" data-skin="dark" data-widget-type="aqiMini"></div>
                <script id="tomorrow-sdk" src="https://www.tomorrow.io/v1/widget/sdk/sdk.bundle.min.js"></script>
            </div>
        </div>
    </section>
    <section id="ad_banner">
        <div class="py-5">
            <div class="relative">
                <div class="py-3 mb-3 text-lg border-b-2">
                    Ad Banner
                </div>
                <div class="pt-[80%] bg-neutral-800 relative">
                    <div class="absolute inset-0 w-full h-full flex items-center justify-center text-center">
                        <span class="text-white text-5xl font-medium">Ad Banner 5:4</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="featured">
        <div class="py-3">
            <div class="flex">
                <button type="button" class="w-1/2 border bg-neutral-100 transition-all hover:bg-neutral-200 text-neutral-800 py-4 text-center">Recent</button>
                <button type="button" class="w-1/2 border bg-neutral-100 transition-all hover:bg-neutral-200 text-neutral-800 py-4 text-center">Popular</button>
            </div>
            <div class="py-2">
                @for ($i = 0; $i < 5; $i++) 
                <div class="felx items-center my-2">
                    <a href="#" class="flex group">
                        <div class="w-1/3 h-16 md:h-20 group-hover:opacity-80 transition-all">
                            <img class="w-full h-full object-cover" src="https://source.unsplash.com/random/200x112?Lifestyle&sig={{$i}}" alt="test">
                        </div>
                        <div class="w-2/3 pl-2">
                            <h3 class="font-medium text-sm md:text-base text-neutral-700 transition-all group-hover:text-blue-500 leading-6 overflow-hidden max-h-14">From the River to the Sea to the Sea to the Sea</h3>
                            <p class="text-neutral-500 text-sm leading-5"><i class="fa-regular fa-clock"></i> Nov 15, 2023</p>
                        </div>
                    </a>
                </div>
                @endfor
            </div>
        </div>
    </section>
    <section id="mailling_list">
        <div class="bg-neutral-100 p-10 text-center my-5">
            <h3 class="text-2xl font-medium py-2">Never Miss a Post</h3>
            <p class="text-sm text-neutral-600 py-2">Signup for free and be the first to get notified on new updates.</p>
            <input class="p-3 bg-white w-full my-4 leading-relaxed outline-none" placeholder="Your Email*" type="email" name="email" id="email">
            <button class="bg-neutral-800 text-white py-3 px-1 w-full">Subscribe</button>
        </div>
    </section>
    <section id="categories">
        <div class="overflow-hidden">
            <div class="py-3 mb-3 text-lg border-b-2">
                Categories
            </div>
            <div class="rounded overflow-hidden bg-cover bg-[url('https://images.unsplash.com/photo-1522778119026-d647f0596c20?q=80&w=400&h=100&fit=crop')] mb-3">
                <a href="#" class="flex items-center p-3 bg-black bg-opacity-50 text-xl transition-all hover:bg-opacity-30 text-white font-bold">
                    <img src="/images/categories/sports.png" alt="Sports" class="w-14 h-14 block mr-4"><span class="block">Sports</span>
                </a>
            </div>
            <div class="rounded overflow-hidden bg-cover bg-[url('https://images.unsplash.com/photo-1498050108023-c5249f4df085?q=80&w=400&h=100&fit=crop')] mb-3">
                <a href="#" class="flex items-center p-3 bg-black bg-opacity-50 text-xl transition-all hover:bg-opacity-30 text-white font-bold">
                    <img src="/images/categories/technology.png" alt="Sports" class="w-14 h-14 block mr-4"><span class="block">Technology</span>
                </a>
            </div>
            <div class="rounded overflow-hidden bg-cover bg-[url('https://images.unsplash.com/photo-1488085061387-422e29b40080?q=80&w=400&h=100&fit=crop')] mb-3">
                <a href="#" class="flex items-center p-3 bg-black bg-opacity-50 text-xl transition-all hover:bg-opacity-30 text-white font-bold">
                    <img src="/images/categories/travel.png" alt="Sports" class="w-14 h-14 block mr-4"><span class="block">Travel</span>
                </a>
            </div>
            <div class="rounded overflow-hidden bg-cover bg-[url('https://images.unsplash.com/photo-1616047006789-b7af5afb8c20?q=80&w=400&h=100&fit=crop')] mb-3">
                <a href="#" class="flex items-center p-3 bg-black bg-opacity-50 text-xl transition-all hover:bg-opacity-30 text-white font-bold">
                    <img src="/images/categories/lifestyle.png" alt="Sports" class="w-14 h-14 block mr-4"><span class="block">Life Style</span>
                </a>
            </div>
            <div class="rounded overflow-hidden bg-cover bg-[url('https://images.unsplash.com/photo-1555939594-58d7cb561ad1?q=80&w=400&h=100&fit=crop')] mb-3">
                <a href="#" class="flex items-center p-3 bg-black bg-opacity-50 text-xl transition-all hover:bg-opacity-30 text-white font-bold">
                    <img src="/images/categories/food.png" alt="Sports" class="w-14 h-14 block mr-4"><span class="block">Food</span>
                </a>
            </div>
        </div>
    </section>
</aside>