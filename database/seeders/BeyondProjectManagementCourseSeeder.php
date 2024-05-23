<?php

namespace BeyondProjectManagement\Database\Seeders;

use Eduka\Cube\Models\Backend;
use Eduka\Cube\Models\Course;
use Eduka\Cube\Models\Student;
use Eduka\Cube\Models\Variant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class BeyondProjectManagementCourseSeeder extends Seeder
{
    public function run()
    {
        $backend = Backend::firstWhere('domain', env('BPRO_DOMAIN'));

        $student = Student::create([
            'name' => env('BPM_STUDENT_NAME'),
            'email' => env('BPM_STUDENT_EMAIL'),
            'password' => bcrypt(env('BPM_STUDENT_PASSWORD')),
        ]);

        // Create course.
        $course = Course::create([
            'name' => 'Beyond Project Management',
            'description' => 'There is a lot more beyond project management',
            'canonical' => 'course-beyond-project-management',
            'domain' => env('BPM_DOMAIN'),
            'provider_namespace' => 'BeyondProjectManagement\\BeyondProjectManagementServiceProvider',
            'backend_id' => $backend->id,

            'lemon_squeezy_store_id' => env('LEMON_SQUEEZY_STORE_ID'),
            'lemon_squeezy_api_key' => env('LEMON_SQUEEZY_API_KEY'),
            'lemon_squeezy_hash' => env('LEMON_SQUEEZY_HASH_KEY'),

            'progress' => 25,

            'theme_color' => '#1ba37b',

            'clarity_code' => null,

            'twitter_handle' => env('BPM_TWITTER'),
            'prelaunched_at' => now()->subHours(1),
            'launched_at' => now()->addDay(365),

            'student_admin_id' => $student->id,
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
            'name' => 'Beyond Project Management',
            'canonical' => 'beyond-project-management',
            'description' => 'Beyond Project Management (standard version)',
            'course_id' => $course->id,
            'lemon_squeezy_variant_id' => env('BPM_VARIANT_ID'),
        ]);

        $course->update(['student_admin_id' => $student->id]);

        // Lets create a 2nd student that is not admin.
        $anotherStudent = Student::create([
            'name' => env('BPM_ANOTHER_STUDENT_NAME'),
            'password' => bcrypt(env('BPM_ANOTHER_STUDENT_PASSWORD')),
            'email' => env('BPM_ANOTHER_STUDENT_EMAIL'),
        ]);

        // Add user to course.
        $anotherStudent->courses()->attach($course->id);
    }
}
