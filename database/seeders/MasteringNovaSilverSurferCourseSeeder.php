<?php

namespace MasteringNovaSilverSurfer\Database\Seeders;

use Eduka\Cube\Models\Chapter;
use Eduka\Cube\Models\Course;
use Eduka\Cube\Models\Domain;
use Eduka\Cube\Models\Order;
use Eduka\Cube\Models\User;
use Eduka\Cube\Models\Variant;
use Eduka\Cube\Models\Video;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MasteringNovaSilverSurferCourseSeeder extends Seeder
{
    private static $videoIndex = 0;

    public function run(): void
    {
        $course = Course::create([
            'name' => 'Mastering Nova - Silver Surfer version',
            'canonical' => 'course-mastering-nova-silver-surfer',
            'admin_name' => 'Bruno Falcao',
            'admin_email' => env('MASTERING_NOVA_EMAIL'),
            'twitter_handle' => env('MASTERING_NOVA_TWITTER'),
            'provider_namespace' => 'MasteringNova\\MasteringNovaServiceProvider',
            'lemon_squeezy_store_id' => env('LEMON_SQUEEZY_STORE_ID'),
        ]);

        // Full course variant.
        $variantFull = Variant::create([
            'uuid' => (string) Str::uuid(),
            'canonical' => 'mastering-nova-silver-surfer-full',
            'course_id' => $course->id,
            'description' => 'Full videos + 1h consulting',
            'lemon_squeezy_variant_id' => env('MASTERING_NOVA_MAIN_VARIANT_FULL_COURSE_ID'),
            'lemon_squeezy_price_override' => env('MASTERING_NOVA_MAIN_VARIANT_FULL_COURSE_PRICE'),
        ]);

        // Just videos variant.
        $variantVideos = Variant::create([
            'uuid' => (string) Str::uuid(),
            'canonical' => 'mastering-nova-silver-surfer-videos-only',
            'course_id' => $course->id,
            'description' => 'Full videos (no consulting)',
            'lemon_squeezy_variant_id' => env('MASTERING_NOVA_MAIN_VARIANT_JUST_VIDEOS_ID'),
        ]);

        $domain = Domain::create([
            'name' => env('MASTERING_NOVA_DOMAIN'),
            'course_id' => $course->id,
        ]);

        // Create admin user.
        $admin = User::create([
            'name' => 'Bruno Falcao (MS)',
            'email' => env('MASTERING_NOVA_EMAIL'),
            'password' => bcrypt('password'),
        ]);

        // Now, lets create some chapters, series and videos.
        $chapter1 = Chapter::create([
            'name' => "What's news on the Silver Surfer version",
            'description' => "Let's deep dive just in the new features that this new version brings, and I can say you will be amazed on how much the Laravel Nova team heard about what the community was asking for",
            'course_id' => 1,
        ]);

        $chapter2 = Chapter::create([
            'name' => 'Deep diving into the Resources',
            'description' => "The Resource logic is the heart of Laravel Nova. Let's dive into what powerful features you can take from it, and how easy is to create your CRUD features to your Eloquent models",
            'course_id' => 1,
        ]);

        // Add 2 videos to each chapter.
        $video1 = Video::create([
            'name' => 'Video 1 / Chapter 1 from Mastering Nova',
            'created_by' => 1,
        ])->chapters()->attach($chapter1->id, ['index' => 1]);

        $video2 = Video::create([
            'name' => 'Video 2 / Chapter 1 from Mastering Nova',
            'created_by' => 1,
        ])->chapters()->attach($chapter1->id, ['index' => 2]);

        $video3 = Video::create([
            'name' => 'Video 3 / Chapter 2 from Mastering Nova',
            'created_by' => 1,
        ])->chapters()->attach($chapter1->id, ['index' => 1]);

        $video4 = Video::create([
            'name' => 'Video 4 / Chapter 2 from Mastering Nova',
            'created_by' => 1,
        ])->chapters()->attach($chapter1->id, ['index' => 2]);

        /**
         * Create an order like if the user was paying for the course.
         * The variant is assigned to a user via the orders/variants/users
         * logic. Meaning there is no user_variant table. We check the
         * user_id in the orders, grab all the variant id, and get the
         * lemonsqueezy variants from the variants table. The we can
         * match what course belongs to what variant.
         */
        /*
        $order = Order::create([
            'user_id' => 1,
            'variant_id' => 70434,
        ]);
        */
    }
}
