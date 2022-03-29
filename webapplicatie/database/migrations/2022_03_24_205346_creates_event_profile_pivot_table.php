<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatesEventProfilePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_profile', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('profile_id');
            $table->unsignedBigInteger('best_player_id')->nullable();
            $table->boolean('active')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_profile');
    }
}
