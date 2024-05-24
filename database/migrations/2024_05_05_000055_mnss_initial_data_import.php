<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Artisan;

class MnssInitialDataImport extends Migration
{
    public function up()
    {
        Artisan::call('db:seed', [
            '--class' => 'MasteringNovaSilverSurfer\Database\Seeders\MasteringNovaSilverSurferCourseSeeder',
            '--force' => true,
        ]);
    }

    public function down()
    {
        //
    }
}
