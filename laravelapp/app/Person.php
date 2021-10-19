<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    // id以外の主キーを設定するとき
    // protected $primarykey = 'person_id'

    // $guarded…にゅうりょくしなくていいよ、フォームから値をもらわなくていいよ
    protected $guarded = array('id');

    // こっちは入力必須項目
    public static $rules = array(
        'name' => 'required',
        'mail' => 'email',
        'age' => 'integer|min:0|max:150'
    );

    public function getData()
    {
        return $this->id . ': ' .$this->name .' ( ' .$this->age.')';
    }

    // boardsテーブルのレコードを取り出せるようにする
    // public function board()
    // {
    //     // hasOne(関連付けるモデル)
    //     return $this->hasOne('App\Board');
    // }

    public function boards()
    {
        return $this->hasMany('App\Board');
    }
}
