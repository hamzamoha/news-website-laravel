<section>
    <div class="py-4">
        <div class="py-2 text-2xl font-semibold text-slate-800">
            <i class="fa-regular fa-comment-dots fa-flip-horizontal"></i> Leave a Comment
        </div>
        <form action="?" method="POST" class="py-3">
            <div class="my-2">
                <label for="name" class="text-sm text-neutral-700">Name:</label>
                <input type="text" name="name" id="name" placeholder="Enter Your Name" class="block w-full py-2 px-1 leading-8 text-sm bg-neutral-200 hover:bg-neutral-300 focus:bg-neutral-100 hover:focus:bg-neutral-100 border border-neutral-300 rounded outline-none">
            </div>
            <div class="my-2 grid sm:grid-cols-2 gap-2">
                <div>
                    <label for="email" class="text-sm text-neutral-700">Email:</label>
                    <input type="email" name="email" id="email" placeholder="Enter Your Email" class="block w-full py-2 px-1 leading-8 text-sm bg-neutral-200 hover:bg-neutral-300 focus:bg-neutral-100 hover:focus:bg-neutral-100 border border-neutral-300 rounded outline-none">
                </div>
                <div>
                    <label for="url" class="text-sm text-neutral-700">Webiste:</label>
                    <input type="url" name="url" id="url" placeholder="Link to your website/profile" class="block w-full py-2 px-1 leading-8 text-sm bg-neutral-200 hover:bg-neutral-300 focus:bg-neutral-100 hover:focus:bg-neutral-100 border border-neutral-300 rounded outline-none">
                </div>
            </div>
            <div class="my-2">
                <label for="text" class="text-sm text-neutral-700">Comment:</label>
                <textarea rows="3" name="text" id="text" placeholder="Enter Your Text Here" class="block w-full py-2 px-1 leading-8 text-sm bg-neutral-200 hover:bg-neutral-300 focus:bg-neutral-100 hover:focus:bg-neutral-100 border border-neutral-300 rounded outline-none"></textarea>
            </div>
            <div>
                <button type="submit" class="outline-none my-5 block w-full py-2 px-1 leading-8 text-center bg-slate-500 rounded transition-all hover:bg-slate-600 text-white text-sm font-bold">Send</button>
            </div>
        </form>
        <div class="py-1">
            <div class="pb-4 text-2xl font-semibold text-slate-800">
                <i class="fa-regular fa-comments mr-2"></i> Recent Comments
            </div>
            @for ($i = 0; $i < 5; $i++)
            <div class="py-1">
                <div class="flex gap-2">
                    <img class="w-12 h-12 rounded-full block overflow-hidden object-cover" src="https://source.unsplash.com/random/150x150?man,boy,guy,male,person&sig={{$i}}" alt="">
                    <div class="relative flex-1 rounded-lg border py-2 px-4 border-neutral-300">
                        <div class="flex items-center">
                            <span class="text-neutral-800 text-sm font-medium mr-2">{{ fake()->name() }}</span>
                            <span class="text-neutral-600 text-xs">{{ \Carbon\Carbon::createFromTimestamp(fake()->dateTimeThisYear()->getTimestamp())->diffForHumans() }}</span>
                        </div>
                        <p class="p-1 text-sm text-neutral-600">
                            {{ fake()->sentence(12) }}
                        </p>
                        <button class="my-1 hover:underline text-neutral-500 text-xs font-bold">Reply</button>
                        <div class="absolute border-[12px] border-t-neutral-300 border-transparent -top-[1px] -left-[12px]"></div>
                        <div class="absolute border-[14px] border-t-white border-transparent top-0 -left-[10px]"></div>
                    </div>
                </div>
                <div class="pl-14 py-1">
                    @for ($k = 0; $k < 1; $k++)
                    <div class="py-1">
                        <div class="flex gap-2">
                            <img class="w-12 h-12 rounded-full block overflow-hidden object-cover" src="https://source.unsplash.com/random/150x150?man,boy,guy,male,person&sig=1{{$i.$k}}" alt="">
                            <div class="relative flex-1 rounded-lg border py-2 px-4 border-neutral-300">
                                <div class="flex items-center">
                                    <span class="text-neutral-800 text-sm font-medium mr-2">{{ fake()->name() }}</span>
                                    <span class="text-neutral-600 text-xs">{{ \Carbon\Carbon::createFromTimestamp(fake()->dateTimeThisYear()->getTimestamp())->diffForHumans() }}</span>
                                </div>
                                <p class="p-1 text-sm text-neutral-600">
                                    {{ fake()->sentence(12) }}
                                </p>
                                <button class="my-1 hover:underline text-neutral-500 text-xs font-bold">Reply</button>
                                <div class="absolute border-[12px] border-t-neutral-300 border-transparent -top-[1px] -left-[12px]"></div>
                                <div class="absolute border-[14px] border-t-white border-transparent top-0 -left-[10px]"></div>
                            </div>
                        </div>
                        <div class="pl-14 py-1">
                            @for ($j = 0; $j < 1; $j++)
                            <div class="py-1">
                                <div class="flex gap-2">
                                    <img class="w-12 h-12 rounded-full block overflow-hidden object-cover" src="https://source.unsplash.com/random/150x150?man,boy,guy,male,person&sig=1{{$i.$k.$j}}" alt="">
                                    <div class="relative flex-1 rounded-lg border py-2 px-4 border-neutral-300">
                                        <div class="flex items-center">
                                            <span class="text-neutral-800 text-sm font-medium mr-2">{{ fake()->name() }}</span>
                                            <span class="text-neutral-600 text-xs">{{ \Carbon\Carbon::createFromTimestamp(fake()->dateTimeThisYear()->getTimestamp())->diffForHumans() }}</span>
                                        </div>
                                        <p class="p-1 text-sm text-neutral-600">
                                            {{ fake()->sentence(12) }}
                                        </p>
                                        <button class="my-1 hover:underline text-neutral-500 text-xs font-bold">Reply</button>
                                        <div class="absolute border-[12px] border-t-neutral-300 border-transparent -top-[1px] -left-[12px]"></div>
                                        <div class="absolute border-[14px] border-t-white border-transparent top-0 -left-[10px]"></div>
                                    </div>
                                </div>
                            </div>
                            @endfor
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
            @endfor
        </div>
    </div>
</section>