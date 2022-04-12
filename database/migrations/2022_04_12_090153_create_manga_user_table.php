<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manga_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('manga_id')->constrained('mangas')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')
                ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::table('manga_user', function (Blueprint $table) {
            $table->dropIfExists();
        });
    }
};
