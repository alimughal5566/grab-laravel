<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->default('admin');
            $table->string('userName')->default('admin');
            $table->string('email',80)->unique()->default('admin@gmail.com');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->default('$2y$10$2XjJVCbg92f1nC.zyLyjveQAFc7SQdqKpR6xZyEDrTi/dWaWF9NKm');
            $table->rememberToken();
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
        Schema::dropIfExists('admins');
    }
}
