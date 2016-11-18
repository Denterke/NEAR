<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppletsContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applets_contents', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('icon', 150);
            $table->string('name', 50);
            $table->string('description', 300);
            $table->string('source_link', 300);
            $table->boolean('is_moderated');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applets_contents');
    }
}
