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
        Schema::create('books', function (Blueprint $table) {
            $table->id(); // 主鍵
            $table->string('name'); // 書名
            $table->text('description'); // 書籍描述
            $table->string('author'); // 作者
            $table->string('isbn')->unique(); // ISBN 編號，唯一
            $table->string('publisher'); // 出版社
            $table->timestamps(); // 建立與更新時間
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
