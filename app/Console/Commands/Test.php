<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\User;
use finfo;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function get_categories(array $cat){
        $categories = json_decode('[{"id":778,"name":"Community News"},{"id":9,"name":"Obituaries"},{"id":776,"name":"Top Stories"},{"id":10,"name":"Top Feature"},{"id":8,"name":"Sports"},{"id":785,"name":"Arts &amp; Entertainment"},{"id":2,"name":"News"},{"id":1155,"name":"Stevens Point"},{"id":777,"name":"State News"},{"id":786,"name":"Outdoors &amp; Sustainability"},{"id":794,"name":"Education"},{"id":798,"name":"Opinion"},{"id":797,"name":"Open Letters"},{"id":3,"name":"Commentary"},{"id":783,"name":"Local Business"},{"id":792,"name":"Police &amp; Sheriff Calls"},{"id":2161,"name":"Around the County"},{"id":1271,"name":"Business"},{"id":7,"name":"County Fare"},{"id":793,"name":"Photo of the Day"},{"id":781,"name":"Court Appearances"},{"id":5,"name":"Hometown"},{"id":2783,"name":"Portage County"},{"id":6,"name":"Outdoors"},{"id":12,"name":"Letters"},{"id":782,"name":"Police/Courts"},{"id":1,"name":"Uncategorized"},{"id":2089,"name":"Plover"},{"id":1148,"name":"Roads &amp; Construction"},{"id":747,"name":"Crime"},{"id":2774,"name":"Covid 19"},{"id":812,"name":"Financially Speaking"},{"id":779,"name":"Editorial"},{"id":2459,"name":"History"},{"id":791,"name":"Inside the Schools"},{"id":787,"name":"Food"},{"id":4,"name":"Feature"},{"id":2107,"name":"Amherst"},{"id":1154,"name":"Video"},{"id":1152,"name":"Election 2015"},{"id":1146,"name":"Election 2014"},{"id":1165,"name":"zhidefeatured"},{"id":1147,"name":"Wellness"},{"id":1151,"name":"School Board Watch"},{"id":2171,"name":"Rosholt"},{"id":2256,"name":"Election 2019"},{"id":2403,"name":"Wisconsin Rapids Rafters"},{"id":2090,"name":"Almond"},{"id":4334,"name":"Healthcare"},{"id":1150,"name":"Park Ridge"},{"id":780,"name":"Election 2013"},{"id":799,"name":"Election 2012"},{"id":2303,"name":"School Board"},{"id":1266,"name":"Election 2016"},{"id":4800,"name":"Election"},{"id":4220,"name":"health"},{"id":1163,"name":"Whiting"},{"id":1270,"name":"Election 2018"},{"id":2217,"name":"Hull"},{"id":2102,"name":"Amherst Junction"},{"id":2462,"name":"On Point"},{"id":4408,"name":"Local Government"},{"id":1153,"name":"Open Letter Policy"},{"id":2319,"name":"Junction City"},{"id":2109,"name":"Custer"},{"id":4448,"name":"Pet of the Week"},{"id":11,"name":"Classifieds"},{"id":4197,"name":"Tuesdays with the Mayor"},{"id":1784,"name":"National News"},{"id":2158,"name":"Sparta"},{"id":2388,"name":"Pine Grove"},{"id":4486,"name":"Weather"},{"id":2545,"name":"Test"}]');
        return array_map(fn ($w) => strtolower($w->name), array_filter($categories, fn ($e) => in_array($e->id, $cat)));
    }
    public function get_tags_ids(){
        $c = Post::get("categories")->toArray();
        $c = array_map(fn ($e) => $e['categories'], $c);
        $c = array_map(fn ($e) => explode(",", $e), $c);
        $r = [];
        foreach ($c as $s) {
            foreach ($s as $v) {
                if (!in_array($v, $r)) array_push($r, $v);
            }
        }
        return $r;
    }
    public function update_tags()
    {
        $tags = '[{"id":5605,"name":"2024"},{"id":5635,"name":"8-player football"},{"id":5630,"name":"Ageless Aviation Veteran Dream Flights"},{"id":5638,"name":"AJGA"},{"id":5644,"name":"Allison Smaglik"},{"id":563,"name":"Almond-Bancroft boys basketball"},{"id":74,"name":"Almond-Bancroft football"},{"id":2299,"name":"Almond-Bancroft girls basketball"},{"id":2734,"name":"Almond-Bancroft Volleyball"},{"id":3615,"name":"American Red Cross"},{"id":5629,"name":"American Red Cross of Wisconsin"},{"id":272,"name":"Amherst"},{"id":564,"name":"Amherst boys basketball"},{"id":75,"name":"Amherst football"},{"id":565,"name":"Amherst girls basketball"},{"id":394,"name":"Amherst soccer"},{"id":2178,"name":"Amherst volleyball"},{"id":5619,"name":"Amherst volleyball quad"},{"id":5639,"name":"Amherst Youth football"},{"id":5646,"name":"Ashley Kopp"},{"id":5611,"name":"Aspirus Stevens Point Hospital"},{"id":4295,"name":"Aspirus Wausau Hospital"},{"id":5631,"name":"Ayden Kazda"},{"id":5633,"name":"Basin Short Film Festival"},{"id":5599,"name":"Best-In-State Wealth Advisor"},{"id":26,"name":"Boys &amp; Girls Club of Portage County"},{"id":5620,"name":"Centergy Inc"},{"id":5627,"name":"Centers for Disease Control and Prevention"},{"id":2923,"name":"central Wisconsin"},{"id":209,"name":"Central Wisconsin Conference"},{"id":5621,"name":"Central Wisconsin Days"},{"id":3776,"name":"Central Wisconsin Youth Symphony Orchestra Program"},{"id":5626,"name":"Childhood immunizations"},{"id":346,"name":"Chronic Wasting Disease"},{"id":2436,"name":"city of Stevens Point"},{"id":5637,"name":"Conference title"},{"id":577,"name":"CREATE Portage County"},{"id":5244,"name":"CWC-East"},{"id":5634,"name":"CWC-Large"},{"id":5592,"name":"CWC-Small"},{"id":5112,"name":"CWC-South"},{"id":2085,"name":"Diggin\' The Cause"},{"id":255,"name":"Festival of India"},{"id":5604,"name":"FIFA World Cup"},{"id":1884,"name":"forbes"},{"id":5622,"name":"Freshwater Collaborative of Wisconsin"},{"id":2949,"name":"Goerke Field"},{"id":4560,"name":"Green Bay"},{"id":5616,"name":"Growth Hotels LLC"},{"id":3439,"name":"Hall of Fame"},{"id":5061,"name":"home opener"},{"id":5617,"name":"Home2 Suites"},{"id":2126,"name":"homecoming"},{"id":5647,"name":"Jamie Reeve"},{"id":5624,"name":"Jensen Community Center"},{"id":5612,"name":"KASH Playground at Mead Park"},{"id":5632,"name":"Lagers and Loggers"},{"id":5640,"name":"Level one"},{"id":992,"name":"Madison"},{"id":5614,"name":"Maui wilfires"},{"id":3346,"name":"Mid-State Technical College"},{"id":5610,"name":"National Agriculture in the Classroom Conference"},{"id":5642,"name":"National Signing Day"},{"id":5628,"name":"NCAA record"},{"id":1276,"name":"NCAA Tournament"},{"id":880,"name":"news"},{"id":5430,"name":"non-conference"},{"id":5598,"name":"Northwestern Mutual"},{"id":2122,"name":"Ol\' River Jug"},{"id":566,"name":"Pacelli boys basketball"},{"id":622,"name":"Pacelli Co-op boys hockey"},{"id":2101,"name":"Pacelli cross country"},{"id":76,"name":"Pacelli football"},{"id":567,"name":"Pacelli girls basketball"},{"id":2676,"name":"Pacelli Soccer"},{"id":211,"name":"Pacelli volleyball"},{"id":5623,"name":"Philharmonia Conductor"},{"id":758,"name":"Portage County"},{"id":5574,"name":"Portage County Board of Supervisors"},{"id":29,"name":"Portage County Health Care Center"},{"id":2537,"name":"Project Fresh Clothes"},{"id":5040,"name":"quadrangular"},{"id":5071,"name":"Rivalry"},{"id":5625,"name":"River Run"},{"id":5510,"name":"Rosholt basketball"},{"id":2100,"name":"Rosholt cross country"},{"id":77,"name":"Rosholt football"},{"id":2179,"name":"Rosholt volleyball"},{"id":5032,"name":"Scrimmage"},{"id":5154,"name":"season opener"},{"id":5158,"name":"season preview"},{"id":5431,"name":"senior athletes"},{"id":4979,"name":"senior spotlight"},{"id":415,"name":"Sentry Insurance"},{"id":1636,"name":"sentryworld"},{"id":1384,"name":"SPASH athletics"},{"id":18,"name":"spash boys basketball"},{"id":260,"name":"SPASH boys cross country"},{"id":2194,"name":"SPASH cross country"},{"id":78,"name":"SPASH football"},{"id":709,"name":"SPASH girls basektball"},{"id":325,"name":"SPASH girls tennis"},{"id":1421,"name":"SPASH hockey"},{"id":5133,"name":"SPASH Mountain Biking Club"},{"id":678,"name":"SPASH Softball"},{"id":2084,"name":"SPASH volleyball"},{"id":4971,"name":"sportsmanship"},{"id":5608,"name":"St. Paul&#039;s United Methodist Church"},{"id":469,"name":"Stevens Point"},{"id":3731,"name":"Stevens Point Area Senior High"},{"id":49,"name":"Stevens Point Fire Department"},{"id":137,"name":"Stevens Point Police Department"},{"id":356,"name":"Stevens Point Sculpture Park"},{"id":5643,"name":"TJ Lamb"},{"id":5609,"name":"Tri-County Elementary"},{"id":5607,"name":"United States Senate race"},{"id":3428,"name":"University of Wisconsin-Stevens Point"},{"id":3167,"name":"UW-Stevens Point"},{"id":5645,"name":"UW-Stevens Point volleyball"},{"id":5603,"name":"UW-Stevens Point women&#039;s soccer"},{"id":1836,"name":"UWSP athletics"},{"id":301,"name":"UWSP volleyball"},{"id":2030,"name":"UWSP Women\'s Soccer"},{"id":5636,"name":"Valley Football Association"},{"id":5618,"name":"volleyball invite"},{"id":579,"name":"Wausau"},{"id":5641,"name":"WIAA boys hockey"},{"id":2204,"name":"WIAA Footbal Playoffs"},{"id":5138,"name":"WIAA state cross country"},{"id":2176,"name":"WIAA Volleyball Playoffs"},{"id":4166,"name":"Wisconsin Department of Natural Resources"},{"id":1409,"name":"Wisconsin Newspaper Association"},{"id":2847,"name":"Wisconsin Rapids"},{"id":2885,"name":"Worzalla"},{"id":5159,"name":"WVC basketball"},{"id":5164,"name":"WVC hockey"}]';
        $tags = json_decode($tags);
        $posts = Post::all();
        echo "starting...\n";
        foreach ($posts as $key => $post) {
            echo "Post $post->id: ";
            if($post->tags == "") {
                echo "skipped (no tags)\n";
                continue;
            }
            $post_tags = explode(",", $post->tags);
            $post_tags = array_filter($post_tags, fn ($e) => $e != "");
            $post_tags = array_map(fn ($e) => intval($e), $post_tags);
            $post_tags = array_map(fn ($e) => $e->name, array_filter($tags, fn ($e) => in_array($e->id, $post_tags)));
            $post->tags = count($post_tags) > 0 ? implode(",", $post_tags) : "";
            $post->save();
            echo "Done\n";
        }
        echo "Finished...\n";
    }
    public function get_posts(): array{
        $business = json_decode(file_get_contents(app_path('Http/Controllers/json/business.json')));
        $education = json_decode(file_get_contents(app_path('Http/Controllers/json/education.json')));
        $food = json_decode(file_get_contents(app_path('Http/Controllers/json/food.json')));
        $health = json_decode(file_get_contents(app_path('Http/Controllers/json/health.json')));
        $history = json_decode(file_get_contents(app_path('Http/Controllers/json/history.json')));
        $posts = json_decode(file_get_contents(app_path('Http/Controllers/json/posts.json')));
        $wellness = json_decode(file_get_contents(app_path('Http/Controllers/json/wellness.json')));
        $posts = array_merge($business, $education, $food, $health, $history, $posts, $wellness);
        $result = [];
        foreach ($posts as $post) {
            $result["" . $post->id] = $post;
        }
        return $result;
    }
    public function insert(){
        $posts = $this->get_posts();
        echo "Starting ...\n";
        $key = 1;
        foreach ($posts as $value) {
            echo "\rPost " . $key++;
            Post::create([
                'title' => $value->title->rendered,
                'slug' => $value->slug,
                'status' => 'publish',
                'content' => $value->content->rendered,
                'categories' =>  implode(',', $this->get_categories($value->categories)),
                'tags' =>  implode(',', $value->tags),
                'image' => $value->featured_media,
                'video' => false,
                'user_id' => 1,
            ]);
        }
        echo "\nDone ...\n";
    }
    public function create_admin(){
        User::create([
            'name' => 'John Doe',
            'username' => 'admin',
            'email' => 'john@example.com',
            'password' => Hash::make('1111'),
            'about' => 'admin',
            'photo' => '/images/photo.jpg',
        ]);
        echo "Admin Created\n";
    }
    public function image()
    {
        $user_agent = '[{"device":"iphone","useragent":"Mozilla/5.0 (iPhone; CPU iPhone OS 9_2_6; like Mac OS X) AppleWebKit/534.48 (KHTML, like Gecko) Chrome/47.0.2694.305 Mobile Safari/537.5"},{"device":"iphone","useragent":"Mozilla/5.0 (iPhone; CPU iPhone OS 10_9_1; like Mac OS X) AppleWebKit/603.40 (KHTML, like Gecko) Chrome/47.0.2819.359 Mobile Safari/601.1"},{"device":"iphone","useragent":"Mozilla/5.0 (iPhone; CPU iPhone OS 8_2_2; like Mac OS X) AppleWebKit/601.45 (KHTML, like Gecko) Chrome/55.0.2212.154 Mobile Safari/534.8"},{"device":"iphone","useragent":"Mozilla/5.0 (iPhone; CPU iPhone OS 11_3_3; like Mac OS X) AppleWebKit/602.37 (KHTML, like Gecko) Chrome/47.0.2536.108 Mobile Safari/534.4"},{"device":"iphone","useragent":"Mozilla/5.0 (iPhone; CPU iPhone OS 10_0_0; like Mac OS X) AppleWebKit/600.12 (KHTML, like Gecko) Chrome/51.0.3696.277 Mobile Safari/600.2"},{"device":"iphone","useragent":"Mozilla/5.0 (iPhone; CPU iPhone OS 7_8_2; like Mac OS X) AppleWebKit/535.21 (KHTML, like Gecko) Chrome/50.0.3852.122 Mobile Safari/600.5"},{"device":"iphone","useragent":"Mozilla/5.0 (iPhone; CPU iPhone OS 9_1_9; like Mac OS X) AppleWebKit/600.20 (KHTML, like Gecko) Chrome/54.0.3117.382 Mobile Safari/535.3"},{"device":"iphone","useragent":"Mozilla/5.0 (iPhone; CPU iPhone OS 11_5_6; like Mac OS X) AppleWebKit/603.21 (KHTML, like Gecko) Chrome/51.0.1061.190 Mobile Safari/536.7"},{"device":"iphone","useragent":"Mozilla/5.0 (iPhone; CPU iPhone OS 8_1_4; like Mac OS X) AppleWebKit/600.44 (KHTML, like Gecko) Chrome/47.0.2306.209 Mobile Safari/602.6"},{"device":"iphone","useragent":"Mozilla/5.0 (iPhone; CPU iPhone OS 7_7_8; like Mac OS X) AppleWebKit/533.5 (KHTML, like Gecko) Chrome/51.0.1766.348 Mobile Safari/534.8"},{"device":"firefox","useragent":"Mozilla/5.0 (Macintosh; U; Intel Mac OS X 8_5_7) Gecko/20100101 Firefox/49.9"},{"device":"firefox","useragent":"Mozilla/5.0 (Windows; Windows NT 6.1; WOW64; en-US) Gecko/20100101 Firefox/66.0"},{"device":"firefox","useragent":"Mozilla/5.0 (Linux; Linux x86_64; en-US) Gecko/20100101 Firefox/51.1"},{"device":"firefox","useragent":"Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_9_1; en-US) Gecko/20100101 Firefox/65.0"},{"device":"firefox","useragent":"Mozilla/5.0 (Macintosh; Intel Mac OS X 9_3_3) Gecko/20100101 Firefox/66.8"},{"device":"firefox","useragent":"Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_7_6; en-US) Gecko/20100101 Firefox/68.6"},{"device":"firefox","useragent":"Mozilla/5.0 (Windows; Windows NT 10.0; WOW64; en-US) Gecko/20100101 Firefox/53.4"},{"device":"firefox","useragent":"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_1_6) Gecko/20130401 Firefox/68.6"},{"device":"firefox","useragent":"Mozilla/5.0 (Macintosh; Intel Mac OS X 8_4_3; en-US) Gecko/20100101 Firefox/60.1"},{"device":"firefox","useragent":"Mozilla/5.0 (Linux; U; Linux i682 x86_64; en-US) Gecko/20130401 Firefox/66.8"},{"device":"chrome","useragent":"Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_2_5; en-US) AppleWebKit/603.16 (KHTML, like Gecko) Chrome/55.0.1402.252 Safari/537"},{"device":"chrome","useragent":"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_2; en-US) AppleWebKit/535.12 (KHTML, like Gecko) Chrome/49.0.1896.147 Safari/537"},{"device":"chrome","useragent":"Mozilla/5.0 (Windows; Windows NT 6.1; Win64; x64; en-US) AppleWebKit/601.48 (KHTML, like Gecko) Chrome/49.0.2355.161 Safari/600"},{"device":"chrome","useragent":"Mozilla/5.0 (U; Linux x86_64; en-US) AppleWebKit/602.2 (KHTML, like Gecko) Chrome/53.0.1396.163 Safari/535"},{"device":"chrome","useragent":"Mozilla/5.0 (Windows; Windows NT 10.1; x64) AppleWebKit/603.26 (KHTML, like Gecko) Chrome/54.0.3065.324 Safari/535"},{"device":"chrome","useragent":"Mozilla/5.0 (Windows; Windows NT 10.4; Win64; x64; en-US) AppleWebKit/535.33 (KHTML, like Gecko) Chrome/50.0.2037.329 Safari/602"},{"device":"chrome","useragent":"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_3_5) AppleWebKit/603.43 (KHTML, like Gecko) Chrome/48.0.3184.181 Safari/600"},{"device":"chrome","useragent":"Mozilla/5.0 (Windows; Windows NT 10.2; WOW64) AppleWebKit/601.8 (KHTML, like Gecko) Chrome/53.0.1322.360 Safari/601"},{"device":"chrome","useragent":"Mozilla/5.0 (Linux i581 x86_64) AppleWebKit/603.37 (KHTML, like Gecko) Chrome/53.0.1537.364 Safari/535"},{"device":"chrome","useragent":"Mozilla/5.0 (Linux; Linux i553 x86_64; en-US) AppleWebKit/600.37 (KHTML, like Gecko) Chrome/51.0.1126.372 Safari/534"}]';
        $user_agent = json_decode($user_agent);
        $posts = Post::where('image', 'regexp', '^[0-9]+$')->get();
        echo "starting...\n";
        foreach ($posts as $key => $post) {
            $context = stream_context_create(
                array(
                    "http" => array(
                        "header" => "User-Agent: " . $user_agent[random_int(0, 9)]->useragent
                    ),
                    "ssl" => array(
                        "verify_peer" => false,
                        "verify_peer_name" => false,
                    ),
                )
            );
            $media_id = $post->image;
            $file_info = new finfo(FILEINFO_MIME_TYPE);
            if ($media_id == 0 || $media_id == "") continue;
            echo "$key: trying media: $media_id";
            try {
                $data = json_decode(file_get_contents('https://stevenspoint.news/wp-json/wp/v2/media/' . $media_id, false, $context));
                $image = file_get_contents($data->link, false, $context);
            }
            catch(\Throwable $e) {
                echo "\nError: " . $e->getMessage() . "\n";
                continue;
            }
            $mime_type = $file_info->buffer($image);
            $extension = explode('/', $mime_type)[1];
            $full_path = "images/uploads/" . $post->slug . "." . $extension;
            if(file_exists(public_path($full_path))){
                echo " file exist\n";
            }
            else {
                file_put_contents(public_path($full_path), $image);
                echo " downloaded\n";
            }
            $post->image = "/$full_path";
            $post->save();
            echo "-> $full_path\n";
            usleep(10);
            // for i in public/images/uploads/*; do ffmpeg -y -i $i ${i%.*}.jpg ; done
        }
    }
    public function count()
    {
        $c = Post::get("categories")->toArray();
        $c = array_map(fn ($e) => $e['categories'], $c);
        $c = array_map(fn ($e) => explode(",", $e), $c);
        $r = [];
        foreach ($c as $s) {
            foreach ($s as $v) {
                if (!in_array($v, $r)) array_push($r, $v);
            }
        }
        return $r;
    }
    public function handle()
    {
        ($this->image());
    }
}
