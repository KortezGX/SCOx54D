<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;

    // 步驟 1 / 3 - 定義 Publisher(出版社) 與 PublisherUser(出版社管理員) 以及 Book(書籍) 的關係

    // 定義與 PublisherUser 的一對多關係，users() 用來取得與 Publisher(出版社) 相關的所有 PublisherUser(出版社管理員)
    // hasMany() 方法表示 Publisher(出版社) 可以有多個 PublisherUser(出版社管理員)，這裡的關聯是透過 publisher_id 外鍵來建立的
    public function users() {
        return $this->hasMany(PublisherUser::class);
    }

    // 定義與 Book 的一對多關係，books() 用來取得與 Publisher(出版社) 相關的所有 Book(書籍)
    // hasMany() 方法表示 Publisher(出版社) 可以有多個 Book(書籍)，這裡的關聯是透過 publisher_id 外鍵來建立的
    public function books() {
        return $this->hasMany(Book::class);
    }
}
