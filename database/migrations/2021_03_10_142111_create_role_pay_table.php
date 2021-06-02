<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolePayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_pay', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id')->nullable();            
            $table->date('dibayar')->nullable();
            $table->date('tgl_bayar')->nullable();
            $table->integer('harga')->nullable();
            $table->integer('bank')->nullable();
            $table->integer('pay')->nullable();
            $table->string('image')->nullable();
            $table->string('is_read')->nullable();
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
        Schema::dropIfExists('role_pay');
    }
}
