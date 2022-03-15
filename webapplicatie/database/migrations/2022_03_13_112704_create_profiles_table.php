<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->string("user_name")->nullable();
            $table->string("familyname")->nullable();
            $table->string("location")->nullable();
            $table->string("gender")->nullable();
            $table->date("date_of_birth")->nullable();
            $table->string("favorite_sport")->nullable();
            $table->string("biography")->nullable();
            $table->string("profil_photo")->nullable();
            $table->index("user_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
