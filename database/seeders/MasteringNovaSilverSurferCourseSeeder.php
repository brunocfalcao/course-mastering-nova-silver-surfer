<?php

namespace MasteringNovaSilverSurfer\Database\Seeders;

use Eduka\Cube\Models\Chapter;
use Eduka\Cube\Models\Course;
use Eduka\Cube\Models\Organization;
use Eduka\Cube\Models\User;
use Eduka\Cube\Models\Variant;
use Eduka\Cube\Models\Video;
use Illuminate\Database\Seeder;

class MasteringNovaSilverSurferCourseSeeder extends Seeder
{
    public function run()
    {
        if (! Organization::exists()) {
            $organization = Organization::create([
                'name' => 'brunofalcao.dev',
                'domain' => env('EDUKA_BACKEND_URL'),
                'provider_namespace' => '\Eduka\Dev\DevServiceProvider',
            ]);
        } else {
            $organization = Organization::find(1);
        }

        $course = Course::create([
            'name' => 'Mastering Nova - Silver Surfer',
            'canonical' => 'course-mastering-nova-silver-surfer',
            'domain' => env('MN_SS_DOMAIN'),
            'provider_namespace' => 'MasteringNovaSilverSurfer\\MasteringNovaSilverSurferServiceProvider',
            'organization_id' => 1,

            'lemon_squeezy_store_id' => env('LEMON_SQUEEZY_STORE_ID'),
            'lemon_squeezy_api_key' => env('LEMON_SQUEEZY_API_KEY'),
            'lemon_squeezy_hash_key' => env('LEMON_SQUEEZY_HASH_KEY'),

            'prelaunched_at' => now()->subHours(1),
            'launched_at' => now()->addDay(365),
            'meta' => [
                'description' => 'my seo description',
                'author' => 'my seo author',
                'twitter:site' => 'my seo twitter',
            ],
        ]);

        $variant = Variant::create([
            'name' => 'Mastering Nova Silver Surfer',
            'canonical' => 'mastering-nova-silver-surfer',
            'description' => 'Mastering Nova Silver Surfer (standard version)',
            'course_id' => $course->id,
            'lemon_squeezy_variant_id' => env('MN_SS_VARIANT_ID'),
        ]);

        // Create admin user.
        $admin = User::create([
            'name' => 'Bruno Falcao (SS)',
            'email' => env('MN_SS_EMAIL'),
            'twitter_handle' => env('MN_SS_TWITTER'),
            'password' => bcrypt('password'),
            'course_id_as_admin' => $course->id,
        ]);

        // Now, lets create some chapters, series and videos.
        $chapter1 = Chapter::create([
            'name' => "What's new on the Silver Surfer version",
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
            'name' => 'Video 1 / Chapter 1 from Mastering Nova Silver Surfer',
            'course_id' => 1,
            'chapter_id' => $chapter1->id,
        ]);

        $video2 = Video::create([
            'name' => 'Video 2 / Chapter 1 from Mastering Nova Silver Surfer',
            'course_id' => 1,
            'chapter_id' => $chapter1->id,
        ]);

        $video3 = Video::create([
            'name' => 'Video 3 / Chapter 2 from Mastering Nova Silver Surfer',
            'course_id' => 1,
            'chapter_id' => $chapter1->id,
        ]);

        $video4 = Video::create([
            'name' => 'Video 4 / Chapter 2 from Mastering Nova Silver Surfer',
            'course_id' => 1,
            'chapter_id' => $chapter1->id,
        ]);
    }
}
