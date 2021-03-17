<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('websiteTitle')->nullable();
            $table->string('colorCode')->nullable();
            $table->string('currencyText')->nullable();

            $table->string('currencySymbol')->nullable();
            $table->string('receiveEmail')->nullable();

            $table->text('sms_api')->nullable();
            $table->string('email_sent_form')->nullable();
            $table->text('email_template')->nullable();

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
        Schema::dropIfExists('general_settings');
    }
}
