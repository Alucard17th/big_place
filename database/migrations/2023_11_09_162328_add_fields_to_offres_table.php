<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToOffresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('offres', function (Blueprint $table) {
            //
            $table->string('project_campaign_name')->nullable();
            $table->string('job_title')->nullable();
            $table->date('start_date')->nullable();
            $table->string('location_city')->nullable();
            $table->string('location_postal_code')->nullable();
            $table->string('location_address')->nullable();
            $table->string('rome_code')->nullable();
            $table->string('contract_type')->nullable();
            $table->text('work_schedule')->nullable();
            $table->json('weekly_hours')->nullable();
            $table->json('experience_level')->nullable();
            $table->json('desired_languages')->nullable();
            $table->json('education_level')->nullable();
            $table->string('brut_salary')->nullable();
            $table->json('industry_sector')->nullable();
            $table->text('benefits')->nullable();
            $table->date('publication_date')->nullable(); 
            $table->date('unpublish_date')->nullable();
            $table->json('selected_jobboards')->nullable();
            $table->string('advertising_costs')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('offres', function (Blueprint $table) {
            //
        });
    }
}
