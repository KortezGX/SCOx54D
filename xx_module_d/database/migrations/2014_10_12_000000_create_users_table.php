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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('account')->unique(); // 修改預設的 email 欄位為 account
            // $table->timestamp('email_verified_at')->nullable(); // 如果不使用 email 驗證，可以移除這行
            $table->string('password');
            $table->string('role'); // 新增 role 欄位 分為 超級管理員(admin) 和 出版社管理員(manager)
            // $table->rememberToken(); // 記住我功能，如果不需要可以移除這行
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
