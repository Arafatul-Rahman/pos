<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminUserInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_user_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id',200)->nullable();
            $table->string('surname')->nullable();
            $table->string('designation')->nullable();
            $table->string('mobile')->nullable();
            $table->string('office_phone')->nullable();
            $table->string('fax')->nullable();
            $table->date('dob')->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->longText('about')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('valid')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
        DB::table('admin_user_infos')->insert(
            array('admin_id'=> '1')
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_user_infos');
    }
}
