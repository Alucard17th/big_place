<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntreprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entreprises', function (Blueprint $table) {
            $table->id();
            $table->string('nom_entreprise')->nullable();
            $table->date('date_creation')->nullable();
            $table->string('domiciliation')->nullable();
            $table->string('siege_social')->nullable();
            $table->string('valeurs_fortes')->nullable();
            $table->string('nombre_implementations')->nullable();
            $table->string('effectif')->nullable();
            $table->string('fondateurs')->nullable();
            $table->string('chiffre_affaire')->nullable();
            $table->text('photos_locaux')->nullable();
            $table->string('logo')->nullable();

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
        Schema::dropIfExists('entreprises');
    }
}
