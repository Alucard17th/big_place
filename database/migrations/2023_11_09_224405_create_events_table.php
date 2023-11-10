<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('organizer_name');
            $table->string('job_position');
            $table->integer('participants_count');
            $table->string('event_address');
            $table->boolean('free_entry');
            $table->string('digital_badge_download')->nullable();
            $table->string('required_documents')->nullable();
            $table->boolean('registration_closed')->default(false);
            $table->date('event_date');
            $table->time('event_hour');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
