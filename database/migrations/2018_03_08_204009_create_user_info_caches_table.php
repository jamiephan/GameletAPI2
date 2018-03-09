<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInfoCachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_info_caches', function (Blueprint $table) {
            $table->string('id', 50)->primary();
            $table->string("nickname");
            $table->string("location");
            $table->string("website");
            $table->string("origin");
            $table->string("icon_id");
            $table->string("icon_type");
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
        Schema::dropIfExists('user_info_caches');
    }
}
