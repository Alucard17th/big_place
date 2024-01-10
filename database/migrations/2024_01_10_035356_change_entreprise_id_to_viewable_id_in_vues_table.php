<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeEntrepriseIdToViewableIdInVuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vues', function (Blueprint $table) {
            //
            $table->renameColumn('entreprise_id', 'viewable_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('viewable_id_in_vues', function (Blueprint $table) {
            //
            $table->renameColumn('viewable_id', 'entreprise_id');
        });
    }
}
