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
        Schema::create('publisher_users', function (Blueprint $table) {
            // 步驟 2 / 3 - 建立 publisher_users 資料表
            $table->id();

            // 重點：建立與出版社的連結 => constrained() 會自動參照 publishers 資料表的 id 欄位 => onDelete('cascade') 表示當出版社被刪除時，相關的管理員帳號也會被自動刪除
            $table->foreignId('publisher_id')->constrained()->onDelete('cascade');

            $table->string('account')->unique(); // 登入帳號 => unique() 表示帳號必須唯一，若有重複會導致資料庫錯誤，這是題目規範
            $table->string('password');          // 密碼 (記得加密)
            $table->string('name');              // 管理員真實姓名

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publisher_users');
    }
};
