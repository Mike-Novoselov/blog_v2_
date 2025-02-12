<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_avatars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Внешний ключ для связи с таблицей users
            $table->string('avatar_path'); // Путь к файлу аватара
            $table->timestamps();

            // Внешний ключ для связи с пользователями и каскадное удаление
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_avatars');
    }
};
