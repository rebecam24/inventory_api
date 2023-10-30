<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddModificationsOnUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('address',100);
            $table->date('birthday');
            $table->softDeletes('deleted_at',1);
            $table->string('gender',45);
            $table->string('id_number');
            $table->string('lastname',50);
            $table->string('phone',15);
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->string('url_image',500)->nullable();
            $table->string('work_position')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('role_id');
            $table->dropColumn(['role_id','address','birthday','gender','id_number','lastname','phone','url_image','work_position']);
        });
    }
}
