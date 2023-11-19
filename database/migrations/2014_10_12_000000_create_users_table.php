<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('username')->default('');
            $table->string('email');
            $table->string('password');
            $table->string('phone');
            $table->string('image')->default('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTeMIAx7-Zgl6AdkUXBXZydQPW0EyvuyxAI5w&usqp=CAU');
            $table->string('role')->default('user');
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
        Schema::dropIfExists('users');
    }
};
