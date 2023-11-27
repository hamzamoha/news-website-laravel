<aside class="sticky -top-60">
    <section id="follow_us">
        <div class="py-3 mb-3 text-lg border-b-2">
            Follow Us
        </div>
        <div class="grid grid-cols-2 gap-3">
            <div class="flex bg-blue-500 transition-all hover:bg-blue-400 h-14">
                <div class="h-full w-14 leading-10 py-2 text-center font-black text-xl text-white"><i class="fa-brands fa-facebook-f"></i></div>
                <div class="flex flex-col justify-center">
                    <div class="text-white font-bold text-sm leading-5">1.3M</div>
                    <div class="text-neutral-300 text-xs leading-4">Likes</div>
                </div>
            </div>
            <div class="flex bg-neutral-900 transition-all hover:bg-neutral-800 h-14">
                <div class="h-full w-14 leading-10 py-2 text-center font-black text-xl text-white"><i class="fa-brands fa-x-twitter"></i></div>
                <div class="flex flex-col justify-center">
                    <div class="text-white font-bold text-sm leading-5">943.5K</div>
                    <div class="text-neutral-300 text-xs leading-4">Followers</div>
                </div>
            </div>
            <div class="flex bg-red-600 transition-all hover:bg-red-500 h-14">
                <div class="h-full w-14 leading-10 py-2 text-center font-black text-xl text-white"><i class="fa-brands fa-youtube"></i></div>
                <div class="flex flex-col justify-center">
                    <div class="text-white font-bold text-sm leading-5">1.1M</div>
                    <div class="text-neutral-300 text-xs leading-4">Subscribers</div>
                </div>
            </div>
            <div class="flex bg-fuchsia-600 transition-all hover:bg-fuchsia-500 h-14">
                <div class="h-full w-14 leading-10 py-2 text-center font-black text-xl text-white"><i class="fa-brands fa-instagram"></i></div>
                <div class="flex flex-col justify-center">
                    <div class="text-white font-bold text-sm leading-5">1.5M</div>
                    <div class="text-neutral-300 text-xs leading-4">Followers</div>
                </div>
            </div>
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
                        <div class="w-1/3 h-20 group-hover:opacity-80 transition-all">
                            <img class="w-full h-full object-cover" src="https://source.unsplash.com/random/200x112?Lifestyle&sig={{$i}}" alt="test">
                        </div>
                        <div class="w-2/3 pl-2">
                            <h3 class="font-medium text-neutral-700 transition-all group-hover:text-blue-500 leading-6 overflow-hidden max-h-14">From the River to the Sea to the Sea to the Sea</h3>
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
    <section id="categories"></section>
</aside>