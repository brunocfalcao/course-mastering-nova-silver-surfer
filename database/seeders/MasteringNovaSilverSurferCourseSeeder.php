<?php

namespace MasteringNovaSilverSurfer\Database\Seeders;

use Eduka\Cube\Models\Backend;
use Eduka\Cube\Models\Chapter;
use Eduka\Cube\Models\Course;
use Eduka\Cube\Models\Episode;
use Eduka\Cube\Models\Variant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class MasteringNovaSilverSurferCourseSeeder extends Seeder
{
    public function run()
    {
        if (! Backend::exists()) {
            $backend = Backend::create([
                'name' => 'brunofalcao.dev',
                'domain' => env('EDUKA_BACKEND_URL'),
                'provider_namespace' => '\Eduka\Dev\DevServiceProvider',
            ]);
        } else {
            $backend = Backend::find(1);
        }

        // Create course.
        $course = Course::create([
            'name' => 'Mastering Nova - Silver Surfer',
            'description' => 'Course to learn Laravel Nova - Silver surfer version',
            'canonical' => 'course-mastering-nova-silver-surfer',
            'domain' => env('MN_SS_DOMAIN'),
            'provider_namespace' => 'MasteringNovaSilverSurfer\\MasteringNovaSilverSurferServiceProvider',
            'backend_id' => 1,

            //'vimeo_folder_id' => env('MN_SS_COURSE_VIMEO_FOLDER_ID'),
            //'vimeo_uri' => env('MN_SS_COURSE_VIMEO_URI'),

            'lemon_squeezy_store_id' => env('LEMON_SQUEEZY_STORE_ID'),
            'lemon_squeezy_api_key' => env('LEMON_SQUEEZY_API_KEY'),
            'lemon_squeezy_hash' => env('LEMON_SQUEEZY_HASH_KEY'),

            'progress' => 25,

            'theme_color' => '#1ba37b',

            'clarity_code' => env('MN_SS_CLARITY_CODE'),

            'twitter_handle' => env('MN_SS_TWITTER'),
            'prelaunched_at' => now()->subHours(1),
            'launched_at' => now()->addDay(365),

            'student_admin_id' => 1,
        ]);

        // Add the 'course' filesystem disk.
        push_course_filesystem_driver($course);

        // Add twitter and logo images and update course.
        $twitter = Storage::disk('course')
            ->putFile(__DIR__.
                      '/../assets/twitter.jpg');

        $email = Storage::disk('course')
            ->putFile(__DIR__.
                      '/../assets/email-logo.jpg');

        $main = Storage::disk('course')
            ->putFile(__DIR__.
                      '/../assets/seo-logo.jpg');

        $course->update([
            'filename_twitter' => $course->canonical.'/'.$twitter,
            'filename_email_logo' => $course->canonical.'/'.$email,
            'filename_main_logo' => $course->canonical.'/'.$main,
        ]);

        $variant = Variant::create([
            'name' => 'Mastering Nova Silver Surfer',
            'canonical' => 'mastering-nova-silver-surfer',
            'description' => 'Mastering Nova Silver Surfer (standard version)',
            'course_id' => $course->id,
            'lemon_squeezy_variant_id' => env('MN_SS_VARIANT_ID'),
        ]);

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
            'chapter_id' => $chapter1->id,
        ]);

        $episode4 = Episode::create([
            'name' => 'Episode 4 / Chapter 2 from Mastering Nova Silver Surfer',
            'course_id' => 1,
            'chapter_id' => $chapter1->id,
        ]);
    }
}
