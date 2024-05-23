<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Artisan;

class BpmInitialDataImport extends Migration
{
    public function up()
    {
        Artisan::call('db:seed', [
            '--class' => 'BeyondProjectManagement\Database\Seeders\BeyondProjectManagementCourseSeeder',
            '--force' => true,
        ]);
    }

    public function down()
    {
        //
    }
}
