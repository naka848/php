<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $guarded = array('id');

        // 必須入力項目
        public static $rules = array(
            'person_id' => 'required',
            'title' => 'required',
            'message' => 'required'
        );

    public function getData()
    {
        return $this-> id . ': ' . $this-> title;
    }
}
