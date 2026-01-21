<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure we have a user
        $user = User::first();
        if (!$user) {
            $user = User::create([
                'name' => 'Khadin Admin',
                'email' => 'admin@khadin.com',
                'password' => bcrypt('password'),
                'role' => 'admin'
            ]);
        }

        // Create Categories
        $categories = [
            ['name_en' => 'General', 'name_bn' => 'সাধারণ', 'slug' => 'general'],
            ['name_en' => 'Tips & Tricks', 'name_bn' => 'টিপস এবং ট্রিকস', 'slug' => 'tips-tricks'],
            ['name_en' => 'Safety', 'name_bn' => 'নিরাপত্তা', 'slug' => 'safety'],
            ['name_en' => 'Electronics', 'name_bn' => 'ইলেকট্রনিক্স', 'slug' => 'electronics'],
            ['name_en' => 'Vehicles', 'name_bn' => 'যানবাহন', 'slug' => 'vehicles'],
            ['name_en' => 'Property', 'name_bn' => 'সম্পত্তি', 'slug' => 'property'],
        ];

        $catIds = [];
        foreach ($categories as $cat) {
            $c = Category::firstOrCreate(['slug' => $cat['slug']], $cat);
            $catIds[$cat['slug']] = $c->id;
        }

        $posts = [
            [
                'category' => 'general',
                'title_en' => 'Welcome to Khadin - The New Era of Classifieds in Bangladesh',
                'title_bn' => 'খাদিনে স্বাগতম - বাংলাদেশে শ্রেণিভুক্ত বিজ্ঞাপনের নতুন যুগ',
                'body_en' => "We are thrilled to introduce Khadin.com, the newest and most user-friendly classified marketplace in Bangladesh. Whether you are looking to buy a used phone, sell your car, or find an apartment, Khadin makes it easy, fast, and secure. \n\nJoin our community today and experience a platform built with your needs in mind.",
                'body_bn' => "আমরা খাদিন.কম (Khadin.com) চালু করতে পেরে আনন্দিত, যা বাংলাদেশের সর্বাধুনিক এবং ব্যবহারকারী-বান্ধব ক্লাসিফাইড মার্কেটপ্লেস। আপনি যদি একটি ব্যবহৃত ফোন কিনতে চান, আপনার গাড়ি বিক্রি করতে চান, বা একটি ফ্ল্যাট খুঁজছেন, খাদিন আপনার জন্য কাজটিকে সহজ, দ্রুত এবং নিরাপদ করে তোলে। \n\nআজই আমাদের কমিউনিটিতে যোগ দিন এবং আপনার প্রয়োজনের কথা মাথায় রেখে তৈরি একটি প্ল্যাটফর্মের অভিজ্ঞতা নিন।",
            ],
            [
                'category' => 'tips-tricks',
                'title_en' => '5 Tips to Sell Your Used Mobile Phone Fast on Khadin',
                'title_bn' => 'খাদিনে আপনার ব্যবহৃত মোবাইল ফোন দ্রুত বিক্রি করার ৫টি টিপস',
                'body_en' => "Selling a phone? Here is how to get the best price quickly: \n1. Clean your phone thoroughly. \n2. Take clear, well-lit photos. \n3. Write a detailed description mentioning any defects. \n4. Set a competitive price. \n5. Respond to buyers promptly on Khadin.",
                'body_bn' => "ফোন বিক্রি করছেন? কীভাবে দ্রুত সেরা দাম পাবেন তা এখানে দেখুন: \n১. আপনার ফোনটি ভালোভাবে পরিষ্কার করুন। \n২. পরিষ্কার এবং উজ্জ্বল ছবি তুলুন। \n৩. কোনো ত্রুটি থাকলে তা উল্লেখ করে বিস্তারিত বিবরণ লিখুন। \n৪. একটি প্রতিযোগিতামূলক মূল্য নির্ধারণ করুন। \n৫. খাদিনে ক্রেতাদের দ্রুত উত্তর দিন।",
            ],
            [
                'category' => 'safety',
                'title_en' => 'Safety First: How to Avoid Scams While Buying Online',
                'title_bn' => 'নিরাপত্তা প্রথম: অনলাইনে কেনার সময় কীভাবে প্রতারণা এড়াবেন',
                'body_en' => "Your safety is our priority. When meeting a seller, always choose a public place. Do not send money in advance. Inspect the item carefully before paying. Khadin encourages face-to-face transactions for maximum security.",
                'body_bn' => "আপনার নিরাপত্তা আমাদের অগ্রাধিকার। কোনো বিক্রেতার সাথে দেখা করার সময়, সর্বদা একটি জনাকীর্ণ স্থান বেছে নিন। অগ্রিম টাকা পাঠাবেন না। টাকা দেওয়ার আগে জিনিসটি ভালোভাবে পরীক্ষা করে নিন। খাদিন সর্বোচ্চ নিরাপত্তার জন্য সরাসরি লেনদেনকে উৎসাহিত করে।",
            ],
            [
                'category' => 'electronics',
                'title_en' => 'Top Used Laptops to Buy for Students in 2026',
                'title_bn' => '২০২৬ সালে ছাত্রদের জন্য সেরা ব্যবহৃত ল্যাপটপ',
                'body_en' => "Students need reliable laptops on a budget. Check out our list of the most durable and affordable used laptop models available on Khadin right now. From ThinkPads to MacBooks, find great deals near you.",
                'body_bn' => "ছাত্রদের কম বাজেটে নির্ভরযোগ্য ল্যাপটপ প্রয়োজন। খাদিনে এই মুহূর্তে উপলব্ধ সবচেয়ে টেকসই এবং সাশ্রয়ী মূল্যের ব্যবহৃত ল্যাপটপ মডেলগুলির তালিকা দেখুন। থিঙ্কপ্যাড থেকে ম্যাকবুক, আপনার কাছাকাছি সেরা ডিলগুলি খুঁজুন।",
            ],
            [
                'category' => 'vehicles',
                'title_en' => 'Buying a Used Car? Check These Things First',
                'title_bn' => 'ব্যবহৃত গাড়ি কিনছেন? প্রথমে এই বিষয়গুলো পরীক্ষা করুন',
                'body_en' => "Buying a pre-owned car can be tricky. Always check the engine condition, tire health, and papers. Don't forget to take a test drive. Find thousands of verified car listings on Khadin today.",
                'body_bn' => "একটি ব্যবহৃত গাড়ি কেনা কিছুটা কঠিন হতে পারে। সর্বদা ইঞ্জিনের অবস্থা, টায়ারের স্বাস্থ্য এবং কাগজপত্র পরীক্ষা করুন। টেস্ট ড্রাইভ দিতে ভুলবেন না। আজই খাদিনে হাজার হাজার যাচাইকৃত গাড়ির লিস্টিং খুঁজুন।",
            ],
            [
                'category' => 'general',
                'title_en' => 'Why Khadin is the Best Alternative for Classifieds',
                'title_bn' => 'কেন খাদিন ক্লাসিফাইড এর জন্য সেরা বিকল্প',
                'body_en' => "Tired of complicated interfaces? Khadin offers a clean, ad-free experience focused on connecting buyers and sellers efficiently. We value your time and privacy.",
                'body_bn' => "জটিল ইন্টারফেস দেখে ক্লান্ত? খাদিন একটি পরিষ্কার, বিজ্ঞাপন-মুক্ত অভিজ্ঞতা অফার করে যা ক্রেতা এবং বিক্রেতাদের দক্ষতার সাথে সংযুক্ত করার উপর দৃষ্টি নিবদ্ধ করে। আমরা আপনার সময় এবং গোপনীয়তাকে মূল্য দিই।",
            ],
            [
                'category' => 'property',
                'title_en' => 'Finding Your Dream Home in Dhaka with Khadin',
                'title_bn' => 'খাদিনের মাধ্যমে ঢাকায় আপনার স্বপ্নের বাড়ি খুঁজুন',
                'body_en' => "Dhaka allows for diverse housing options. Whether you want a flat in Dhanmondi or a house in Uttara, filter your search on Khadin to find listings that match your budget and preferences.",
                'body_bn' => "ঢাকা বিভিন্ন আবাসনের সুযোগ দেয়। আপনি ধানমন্ডিতে ফ্ল্যাট চান বা উত্তরায় বাড়ি, খাদিনে আপনার বাজেট এবং পছন্দের সাথে মিল রেখে লিস্টিং খুঁজে পেতে ফিল্টার ব্যবহার করুন।",
            ],
            [
                'category' => 'tips-tricks',
                'title_en' => 'How to Take Great Photos for Your Ads',
                'title_bn' => 'আপনার বিজ্ঞাপনের জন্য কীভাবে সেরা ছবি তুলবেন',
                'body_en' => "Good photos attract more buyers. Use natural light, avoid clutter in the background, and take photos from multiple angles. A little effort in photography goes a long way on Khadin.",
                'body_bn' => "ভাল ছবি বেশি ক্রেতা আকর্ষণ করে। প্রাকৃতিক আলো ব্যবহার করুন, ব্যাকগ্রাউন্ডে বিশৃঙ্খলা এবং একাধিক কোণ থেকে ছবি তুলুন। খাদিনে ফটোগ্রাফিতে একটু প্রচেষ্টা অনেক দূর এগিয়ে নিয়ে যায়।",
            ],
            [
                'category' => 'electronics',
                'title_en' => 'Refurbished vs Used: What Should You Buy?',
                'title_bn' => 'রিফারবিশড বনাম ব্যবহৃত: আপনার কোনটি কেনা উচিত?',
                'body_en' => "Confused between refurbished and used items? Refurbished items are tested and fixed by professionals, while used items are sold as-is. Learn which one suits your needs better.",
                'body_bn' => "রিফারবিশড এবং ব্যবহৃত জিনিসের মধ্যে বিভ্রান্ত? রিফারবিশড আইটেমগুলি পেশাদারদের দ্বারা পরীক্ষা করা এবং ঠিক করা হয়, যখন ব্যবহৃত আইটেমগুলি যেমন আছে তেমন বিক্রি হয়। জানুন কোনটি আপনার প্রয়োজনের জন্য ভালো।",
            ],
            [
                'category' => 'safety',
                'title_en' => 'Setting a Strong Password for Your Khadin Account',
                'title_bn' => 'আপনার খাদিন অ্যাকাউন্টের জন্য একটি শক্তিশালী পাসওয়ার্ড সেট করা',
                'body_en' => "Protect your account. Use a mix of uppercase, lowercase, numbers, and symbols. Never share your password or OTP with anyone claiming to be from Khadin support.",
                'body_bn' => "আপনার অ্যাকাউন্ট সুরক্ষিত করুন। বড় হাতের অক্ষর, ছোট হাতের অক্ষর, সংখ্যা এবং চিহ্নের মিশ্রণ ব্যবহার করুন। খাদিন সাপোর্টের দাবি করা কারো সাথে কখনও আপনার পাসওয়ার্ড বা ওটিপি শেয়ার করবেন না।",
            ],
            // 11
            [
                'category' => 'general',
                'title_en' => 'Declutter Your Home and Make Cash on Khadin',
                'title_bn' => 'আপনার ঘর গুছিয়ে ফেলুন এবং খাদিনে আয় করুন',
                'body_en' => "Have unused items lying around? Turn them into cash! Listing on Khadin is free and takes less than 2 minutes. Start decluttering today.",
                'body_bn' => "অব্যবহৃত জিনিস পড়ে আছে? তাদের নগদ টাকায় পরিণত করুন! খাদিনে লিস্টিং করা সম্পূর্ণ ফ্রি এবং এতে ২ মিনিটেরও কম সময় লাগে। আজই ঘর গোছানো শুরু করুন।",
            ],
            [
                'category' => 'vehicles',
                'title_en' => 'Motorcycle Maintenance Tips for Buyers',
                'title_bn' => 'ক্রেতাদের জন্য মোটরসাইকেল রক্ষণাবেক্ষণের টিপস',
                'body_en' => "Bought a bike on Khadin? Here is how to keep it running smooth: Change oil regularly, check tire pressure, and keep the chain lubricated.",
                'body_bn' => "খাদিনে একটি বাইক কিনেছেন? এটি মসৃণভাবে চালানোর উপায় এখানে: নিয়মিত তেল পরিবর্তন করুন, টায়ারের চাপ পরীক্ষা করুন এবং চেইন লুব্রিকেটেড রাখুন।",
            ],
            [
                'category' => 'tips-tricks',
                'title_en' => 'Negotiation Skills 101 for Marketplace Shopping',
                'title_bn' => 'মার্কেটপ্লেস কেনাকাটার জন্য দরকষাকষি দক্ষতা ১০১',
                'body_en' => "Don't be afraid to make an offer. Be polite, research the market price beforehand, and suggest a fair price. Sellers often appreciate reasonable offers.",
                'body_bn' => "দাম বলতে ভয় পাবেন না। বিনয়ী হোন, আগে বাজার মূল্য যাচাই করুন এবং একটি ন্যায্য মূল্যের প্রস্তাব দিন। বিক্রেতারা প্রায়ই যুক্তিসঙ্গত অফার পছন্দ করেন।",
            ],
            [
                'category' => 'property',
                'title_en' => 'Renting Checklist: What to Ask Before Moving In',
                'title_bn' => 'ভাড়া নেওয়ার চেকলিস্ট: ওঠার আগে যা জিজ্ঞাসা করবেন',
                'body_en' => "Ask about utility bills, security deposits, and maintenance rules. Verify the owner's identity. Find transparent rental listings on Khadin.",
                'body_bn' => "ইউটিলিটি বিল, সিকিউরিটি মানি এবং রক্ষণাবেক্ষণের নিয়ম সম্পর্কে জিজ্ঞাসা করুন। মালিকের পরিচয় যাচাই করুন। খাদিনে স্বচ্ছ ভাড়ার লিস্টিং খুঁজুন।",
            ],
            [
                'category' => 'electronics',
                'title_en' => 'Gaming Consoles: PS4 vs Xbox One in 2026',
                'title_bn' => 'গেমিং কনসোল: ২০২৬ সালে পিএস৪ বনাম এক্সবক্স ওয়ান',
                'body_en' => "Still a great budget choice for gamers. We compare the availability and game library of PS4 and Xbox One on the used market in Bangladesh.",
                'body_bn' => "গেমারদের জন্য এখনও একটি দুর্দান্ত বাজেট পছন্দ। আমরা বাংলাদেশের ব্যবহৃত বাজারে পিএস৪ এবং এক্সবক্স ওয়ান-এর প্রাপ্যতা এবং গেম লাইব্রেরি তুলনা করেছি।",
            ],
            [
                'category' => 'tips-tricks',
                'title_en' => 'How to write a catchy title for your ad',
                'title_bn' => 'আপনার বিজ্ঞাপনের জন্য কীভাবে একটি আকর্ষণীয় শিরোনাম লিখবেন',
                'body_en' => "Include key details like Brand, Model, and Condition in the title. Example: 'iPhone 13 Pro - 128GB - Mint Condition' is better than just 'iPhone for sale'.",
                'body_bn' => "শিরোনামে ব্র্যান্ড, মডেল এবং অবস্থার মতো মূল বিবরণ অন্তর্ভুক্ত করুন। উদাহরণ: 'আইফোন বিক্রয়'-এর চেয়ে 'আইফোন ১৩ প্রো - ১২৮ জিবি - নতুনের মতো' অনেক ভালো।",
            ],
            [
                'category' => 'general',
                'title_en' => 'Khadin Mobile App: Buying and Selling on the Go',
                'title_bn' => 'খাদিন মোবাইল অ্যাপ: চলতে চলতে কেনা-বেচা',
                'body_en' => "Experience the convenience of Khadin on your mobile. Chat with sellers instantly and get notifications about new deals. (Coming Soon!)",
                'body_bn' => "আপনার মোবাইলে খাদিনের সুবিধার অভিজ্ঞতা নিন। বিক্রেতাদের সাথে তাৎক্ষণিক চ্যাট করুন এবং নতুন ডিল সম্পর্কে নোটিফিকেশন পান। (শীঘ্রই আসছে!)",
            ],
            [
                'category' => 'safety',
                'title_en' => 'Understanding Our Community Guidelines',
                'title_bn' => 'আমাদের কমিউনিটি নির্দেশিকা বোঝা',
                'body_en' => "To keep Khadin safe, we prohibit illegal items, hate speech, and spam. Read our guidelines to ensure your account remains in good standing.",
                'body_bn' => "খাদিনকে নিরাপদ রাখতে, আমরা অবৈধ আইটেম, ঘৃণাত্মক বক্তব্য এবং স্প্যাম নিষিদ্ধ করি। আপনার অ্যাকাউন্ট সচল রাখতে আমাদের নির্দেশিকা পড়ুন।",
            ],
            [
                'category' => 'vehicles',
                'title_en' => 'Best Family Cars under 15 Lakh BDT',
                'title_bn' => '১৫ লক্ষ টাকার নিচে সেরা পারিবারিক গাড়ি',
                'body_en' => "Looking for a family car? We verify listings for Toyota Axio, Honda City, and more. Find reliable rides within your budget on Khadin.",
                'body_bn' => "একটি পারিবারিক গাড়ি খুঁজছেন? আমরা টয়োটা অ্যাক্সিও, হোন্ডা সিটি এবং আরও অনেক কিছুর লিস্টিং যাচাই করি। খাদিনে আপনার বাজেটের মধ্যে নির্ভরযোগ্য গাড়ি খুঁজুন।",
            ],
            [
                'category' => 'general',
                'title_en' => 'Join the Khadin Revolution',
                'title_bn' => 'খাদিন বিপ্লবে যোগ দিন',
                'body_en' => "We are more than just a marketplace; we are a community. Help us build a transparent and trusted trading platform in Bangladesh. Happy buying and selling!",
                'body_bn' => "আমরা কেবল একটি মার্কেটপ্লেস নই; আমরা একটি পরিবার। বাংলাদেশে একটি স্বচ্ছ এবং বিশ্বস্ত ট্রেডিং প্ল্যাটফর্ম তৈরি করতে আমাদের সাহায্য করুন। কেনাকাটা শুভ হোক!",
            ],
        ];

        // Shuffle posts to mix categories but I'll keep them sequential for code readability here.
        // Actually, let's just loop and create them.

        foreach ($posts as $index => $data) {
            $imageName = 'posts/cat_' . $data['category'] . '.png';

            $post = Post::create([
                'user_id' => $user->id,
                'category_id' => $catIds[$data['category']],
                'title_en' => $data['title_en'],
                'title_bn' => $data['title_bn'],
                'body_en' => $data['body_en'],
                'body_bn' => $data['body_bn'],
                'slug' => Str::slug($data['title_en']),
                'status' => 'published',
                'featured_image' => $imageName,
                // Distribute dates over the last 60 days
                'created_at' => Carbon::now()->subDays(rand(1, 60))->subHours(rand(1, 24)),
                'updated_at' => Carbon::now(),
            ]);

            // Add some gallery images (randomly pick 2 others)
            $allCats = array_keys($catIds);
            $otherCats = array_diff($allCats, [$data['category']]);
            $randomKeys = array_rand($otherCats, 2);
            
            foreach ($randomKeys as $key) {
                 $galleryImg = 'posts/cat_' . $otherCats[$key] . '.png';
                 $post->images()->create(['image_path' => $galleryImg]);
            }
        }
    }
}
