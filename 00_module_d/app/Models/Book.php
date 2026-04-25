<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // 步驟 3 / 3 - 定義 Book(書籍) 與 Publisher(出版社) 的關係

    public function publisher()
    {
        // belongsTo() 方法表示 Book(書籍) 屬於一個 Publisher(出版社)，這裡的關聯是透過 publisher_id 外鍵來建立的
        return $this->belongsTo(Publisher::class);
    }
}
