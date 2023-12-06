<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        Setting::insert([
            [
                "key"=>"website_title",
                "label"=>"Website Title",
                "value"=> "Men News",
            ],
            [
                "key"=>"description",
                "label"=>"Description",
                "value"=> "Men News is a Clean Responsive Newspaper, Magazine, News and Blog theme. Built with Laravel and Tailwindcss that allow you to completely customize your website to your needs.",
            ],
            [
                "key"=>"keywords",
                "label"=>"Keywords",
                "value"=> "text,home,css",
            ],
            [
                "key"=>"logo",
                "label"=>"Logo",
                "value"=> "/images/logo.png",
            ],
            [
                "key"=>"logo_transparent",
                "label"=>"Logo Transparent",
                "value"=> "/images/logo-transparent.png",
            ],
            [
                "key"=>"facebook_link",
                "label"=>"Facebook Link",
                "value"=> "https://www.facebook.com/men.news",
            ],
            [
                "key"=>"x_link",
                "label"=>"X Link",
                "value"=> "https://twitter.com/men.news",
            ],
            [
                "key"=>"instagram_link",
                "label"=>"Instagram Link",
                "value"=> "https://www.instagram.com/man.news/",
            ],
            [
                "key"=>"tiktok_link",
                "label"=>"Tiktok Link",
                "value"=> "https://www.tiktok.com/@man.news",
            ],
            [
                "key"=>"youtube_link",
                "label"=>"Youtube Link",
                "value"=> "https://www.youtube.com/@man.news",
            ],
        ]);
    }
}
