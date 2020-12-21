<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('address');
            $table->string('image');
            $table->tinyInteger('valid')->default(1);
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });

        DB::table('admins')->insert(
            array('id'=> 0, 'name'=> 'Administrator','email'=> 'admin@gmail.com', 'email_verified_at'=> NULL, 'password'=> '$2y$10$IWGhwRHClTWxTGk91.UXceS8jPB/P2WV3yDEsqo0qz3/GWQgznMjC','created_at'=> '2019-10-27 22:19:28', 'updated_at'=> NULL,'address' => 'Dhaka','image' => '', 'valid' => 1)
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
