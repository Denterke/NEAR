<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppletsActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applets_actions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('applet_id');
            $table->integer('action_id');

            $table->foreign('applet_id')
                ->references('id')
                ->on('applets_contents')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('action_id')
                ->references('id')
                ->on('actions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applets_actions');
    }
}
