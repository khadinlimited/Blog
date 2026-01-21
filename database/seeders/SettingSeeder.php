<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    public function run()
    {
        $settings = [
            ['key' => 'site_title', 'value' => 'Khadin Blog'],
            ['key' => 'site_logo_text', 'value' => 'KhadinBlog'],
            ['key' => 'footer_text', 'value' => '© 2026 Khadin.com. All rights reserved.'],
            ['key' => 'facebook_url', 'value' => 'https://facebook.com'],
            ['key' => 'twitter_url', 'value' => 'https://twitter.com'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
