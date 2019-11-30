<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaylistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playlists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            // $table->unsignedBigInteger('playlist_id')->nullable();
            // $table->foreign('playlist_id')->references('id')->on('playlist')->onDelete('set null');

            $table->unsignedBigInteger('belonger_receiver_id');
            $table->foreign('belonger_receiver_id')->references('id')->on('belonger_receivers');
            
            $table->timestamps();
        });
    }
}
