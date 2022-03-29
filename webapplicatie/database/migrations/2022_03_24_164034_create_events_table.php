<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('sport');
            $table->string('location');
            $table->string('adress');
            $table->string('adress_nr');
            $table->date('date');
            $table->time('start_time');
            $table->boolean('equipment')->default('0');
            $table->integer('allowed_participants')->default('1');
            $table->integer('registered_participants')->default('1');
            $table->unsignedBigInteger('admin_id');
            $table->string('match_result')->nullable();
            $table->boolean('status')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
