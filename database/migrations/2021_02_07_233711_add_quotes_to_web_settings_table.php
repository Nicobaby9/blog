<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQuotesToWebSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('web_settings', function (Blueprint $table) {
            $table->text('web_quotes')->after('web_vision');
            $table->string('web_quotes_creator')->after('web_quotes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('web_settings', function (Blueprint $table) {
            $table->dropColumn('web_quotes');
            $table->dropColumn('web_quotes_creator');
        });
    }
}
