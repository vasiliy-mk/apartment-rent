<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApartmnetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rooms');
            $table->string('beds');
            $table->string('area');
            $table->text('photos');
            $table->integer('to_slider');
            $table->text('description');
            $table->string('street');
            $table->string('house');
            $table->string('flat');
            $table->integer('floor');
            $table->integer('floor_max');
            $table->string('map_lat');
            $table->string('map_lng');
            $table->string('slug');
            $table->string('seo_title');
            $table->string('seo_keywords');
            $table->string('seo_description');
            $table->string('note');
            $table->integer('price');
            $table->integer('active');
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
        Schema::drop('apartments');
    }
}
