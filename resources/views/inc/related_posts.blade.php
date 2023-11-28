<section id="related_posts">
    <div class="relative text-white my-5">
        <div class="relative tns-container">
            @for ($i = 0; $i < 5; $i++)
            <div class="relative py-28 px-10 text-center">
                <img class="absolute inset-0 w-full h-full object-cover" src="https://source.unsplash.com/random/600x400?mountain?sig={{$i}}" alt="">
                <div class="absolute inset-0 w-full h-full bg-black bg-opacity-50"></div>
                <div class="relative">
                    <div class="py-2">
                        <a href="#" class="inline-block py-0.5 text-sm px-1.5 rounded bg-green-500">{{ fake()->word() }}</a>
                    </div>
                    <div class="py-2">
                        <p>Oct 21, 2023</p>
                    </div>
                    <div class="text-3xl h-20 font-bold py-2 leading-10 overflow-hidden">
                        <a href="#">{{ fake()->sentence(7) }}</a>
                    </div>
                </div>
            </div>
           @endfor
        </div>
        <div class="tns-nav-container absolute bottom-0 left-0 w-full grid grid-cols-5 px-5 bg-black bg-opacity-50">
            @for ($i = 0; $i < 5; $i++)
            <div class="relative group py-5 px-1 text-center cursor-pointer">
                <div class="py-0.5 text-sm">
                    <p>Oct 21, 2023</p>
                </div>
                <div class="text-lg h-8 font-bold py-1 leading-8 overflow-hidden">
                    {{ fake()->sentence(7) }}
                </div>
                <div class="group-[.tns-nav-active]:h-1 absolute w-full bottom-0 left-0 h-0 bg-amber-400 transition-all"></div>
            </div>
           @endfor
        </div>
        <div class="absolute top-3 left-0 right-0 w-full py-2 text-xl font-bold text-center px-1">
            <div>Related Posts</div>
            <div class="my-1.5 w-10 h-0.5 bg-white mx-auto"></div>
        </div>
    </div>
</section>
<script>
    var slider = tns({
        container: '#related_posts .tns-container',
        items: 1,
        slideBy: 'page',
        autoplay: true,
        navContainer: '.tns-nav-container',
        controls: false,
        autoplayButtonOutput: false,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
    });
    var buttons = document.querySelectorAll('.tns-nav-container > div')
	buttons.forEach(function() {
		this.addEventListener('click', function(e) {
			slider.play()
		})
	});
</script>