<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrontEndSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('front_end_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('banner_text1')->nullable();
            $table->string('banner_text2')->nullable();
            $table->string('banner_text3')->nullable();

            $table->string('featureTitle1')->nullable();
            $table->string('featureTitle2')->nullable();

            $table->string('foodTitle1')->nullable();
            $table->string('foodTitle2')->nullable();

            $table->string('footerText')->nullable();

            $table->string('reservation_title1')->nullable();
            $table->string('reservation_title2')->nullable();
            $table->text('reservation_openingTime')->nullable();

            $table->string('foodGalleryTitle1')->nullable();
            $table->string('foodGalleryTitle2')->nullable();

            $table->string('eventTitle1')->nullable();
            $table->string('eventTitle2')->nullable();

            $table->string('newsTitle1')->nullable();
            $table->string('newsTitle2')->nullable();

            $table->string('chefTitle1')->nullable();
            $table->string('chefTitle2')->nullable();

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
        Schema::dropIfExists('front_end_settings');
    }
}

