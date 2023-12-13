<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20);
            $table->string('phone', 12);
            $table->string('email', 50)->unique();
            $table->dateTime('create_at')->nullable();
            $table->dateTime('update_at')->nullable();
        });

        DB::table('customer')->insert([
            'id' => 1,
            'name' => 'LilRin',
            'email' => 'LilRin@xon.jp',
            'phone' => '12345678901',
            'create_at' => date("Y-m-d H:i:s"),
            'update_at' => date("Y-m-d H:i:s")
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
