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
        Schema::create('eventis', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->double('price',8,2);
            $table->text('description');
            $table->dateTime('date');
            $table->string('cover_url');
            $table->string('address');
            $table->double('lat', 8, 2);
            $table->double('lng', 8, 2);
            $table->decimal('views_count');
            $table->decimal('comments_count');
            $table->decimal('likes_count');

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
        Schema::dropIfExists('eventis');
    }
};
