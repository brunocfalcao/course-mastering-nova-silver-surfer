<?php

namespace MasteringNovaSilverSurfer\Database\Seeders;

use Eduka\Cube\Models\Backend;
use Eduka\Cube\Models\Chapter;
use Eduka\Cube\Models\Course;
use Eduka\Cube\Models\Episode;
use Eduka\Cube\Models\Student;
use Eduka\Cube\Models\Variant;
use Illuminate\Database\Seeder;

class MasteringNovaSilverSurferCourseSeeder extends Seeder
{
    public function run()
    {
        $backend = Backend::firstWhere('name', 'brunofalcao.dev');

        // Create course.
        $course = Course::create([
            'name' => 'Mastering Nova - Silver Surfer',
            'description' => 'Course to learn Laravel Nova - Silver surfer version',
            'canonical' => 'course-mastering-nova-silver-surfer',
            'domain' => env('MNSS_DOMAIN'),
            'payments_gateway_class' => 'Eduka\Payments\PaymentProviders\Paddle\Paddle',
            'service_provider_class' => 'MasteringNovaSilverSurfer\\MasteringNovaSilverSurferServiceProvider',
            'backend_id' => $backend->id,
            'clarity_code' => env('MNSS_CLARITY_CODE'),

            'lemon_squeezy_store_id' => env('LEMON_SQUEEZY_STORE_ID'),
            'lemon_squeezy_api_key' => env('LEMON_SQUEEZY_API_KEY'),
            'lemon_squeezy_hash' => env('LEMON_SQUEEZY_HASH_KEY'),

            'progress' => 25,

            'theme' => [
                'primary-color' => '#1338BE',
                'secondary-color' => '#10414a',
                'danger-color' => '#23dafc',
            ],

            'clarity_code' => env('MNSS_CLARITY_CODE'),

            'twitter_handle' => env('MNSS_TWITTER'),
            'prelaunched_at' => now()->subHours(1),
            'launched_at' => now()->addDay(365),

            'student_admin_id' => 1,
        ]);

        // Add the 'course' filesystem disk.
        push_canonical_filesystem_disk($course->canonical);

        $variant = Variant::create([
            'name' => 'Mastering Nova Silver Surfer',
            'canonical' => 'mastering-nova-silver-surfer',
            'description' => 'Mastering Nova Silver Surfer (standard version)',
            'course_id' => $course->id,
            'product_id' => env('MNSS_VARIANT_ID'),
        ]);

        // Lets simulate someone that bought the course.
        $buyer = Student::create([
            'name' => env('MNSS_BUYER_NAME'),
            'email' => env('MNSS_BUYER_EMAIL'),
            'password' => bcrypt(env('MNSS_BUYER_PASSWORD')),
        ]);

        // Add buyer to course.
        $buyer->courses()->attach($course->id);

        // Now, lets create some chapters, series and episodes.
        $chapter1 = Chapter::create([
            'name' => "What's new on the Silver Surfer version",
            'description' => "Let's deep dive just in the new features that this new version brings, and I can say you will be amazed on how much the Laravel Nova team heard about what the community was asking for",
            'course_id' => 1,
            //'vimeo_uri' => '/users/78811133/projects/19631829',
            //'vimeo_folder_id' => 19631829,
        ]);

        $chapter2 = Chapter::create([
            'name' => 'Deep diving into the Resources',
            'description' => "The Resource logic is the heart of Laravel Nova. Let's dive into what powerful features you can take from it, and how easy is to create your CRUD features to your Eloquent models",
            'course_id' => 1,
            //'vimeo_uri' => '/users/78811133/projects/19631830',
            //'vimeo_folder_id' => 19631830,
        ]);

        // Add 2 episodes to each chapter.
        $episode1 = Episode::create([
            'name' => 'Episode 1 / Chapter 1 from Mastering Nova Silver Surfer',
            'course_id' => 1,
            'chapter_id' => $chapter1->id,
        ]);

        $episode2 = Episode::create([
            'name' => 'Episode 2 / Chapter 1 from Mastering Nova Silver Surfer',
            'course_id' => 1,
            'chapter_id' => $chapter1->id,
        ]);

        $episode3 = Episode::create([
            'name' => 'Episode 3 / Chapter 2 from Mastering Nova Silver Surfer',
            'course_id' => 1,
            'chapter_id' => $chapter2->id,
        ]);

        $episode4 = Episode::create([
            'name' => 'Episode 4 / Chapter 2 from Mastering Nova Silver Surfer',
            'course_id' => 1,
            'chapter_id' => $chapter2->id,
        ]);
    }
}
