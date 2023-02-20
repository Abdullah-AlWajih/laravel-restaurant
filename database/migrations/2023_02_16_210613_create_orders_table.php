<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('phone');
            $table->string('date');
            $table->string('time');
            $table->integer('meal_id');
            $table->integer('qty')->default(0);
            $table->text('address');
            $table->string('status')->default('تتم المراجعة');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
