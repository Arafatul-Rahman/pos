<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id',200);
            $table->foreignId('group_id',200);
            $table->string('name',100);
            $table->string('email',100);
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone',15)->nullable();
            $table->string('address',200)->nullable();
            $table->tinyInteger('valid')->default(1);
            $table->timestamps();
        });

        DB::table('users')->insert(
            array('id'=> 0, 'name'=> 'Arafat','email'=> 'user@gmail.com','admin_id'=> 1,'admin_id'=> 1,'group_id'=> 1, 'password'=> '$2y$10$IWGhwRHClTWxTGk91.UXceS8jPB/P2WV3yDEsqo0qz3/GWQgznMjC','address'=>'', 'phone'=>'','created_at'=> '2019-10-27 22:19:28', 'updated_at'=> NULL, 'valid' => 1)
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
