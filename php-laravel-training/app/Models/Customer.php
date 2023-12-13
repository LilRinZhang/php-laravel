<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // テーブルを指定する
    protected $table = 'customer';

    // fillableに指定したプロパティは入力可能になる
    protected  $fillable = [
        'name',
        'phone',
        'email'
    ];
}
