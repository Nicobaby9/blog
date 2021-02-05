<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('web_name')->default('Blog Web');
            $table->string('web_logo')->default('logo.png');
            $table->string('web_desc')->default('Web Description');
            $table->string('web_story')->default('Web Story');
            $table->string('web_vision')->default('Web Vision');
            $table->string('instagram')->default('www.instagram.com');
            $table->string('facebook')->default('www.facebook.com');
            $table->string('twitter')->default('www.twitter.com');
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
        Schema::dropIfExists('web_settings');
    }
}
