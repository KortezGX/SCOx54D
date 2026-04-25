<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublisherUser extends Model
{
    use HasFactory;

    // 步驟 2 / 3 - 定義 PublisherUser(出版社管理員) 與 Publisher(出版社) 的關係

    public function publisher()
    {
        // belongsTo() 方法表示 PublisherUser(出版社管理員) 屬於一個 Publisher(出版社)，這裡的關聯是透過 publisher_id 外鍵來建立的
        return $this->belongsTo(Publisher::class);
    }
}
