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
            $table->text('web_desc')->nullable();
            $table->text('web_story')->nullable();
            $table->text('web_vision')->nullable();
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
