<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //TaskControllerのstoreで必要になる
    protected $fillable = ['status', 'content', 'user_id'];
    
    public function user()
    //Task を持つ User は1人なので、 function user() のように単数形 user でメソッドを定義する
    {
        //Task のインスタンスが所属している唯一の User を取得することができる
        //$task->user()->first() もしくは簡単に $task->user で取得できる ($thisには$taskが入る)
        return $this->belongsTo(User::class);
    }
}
