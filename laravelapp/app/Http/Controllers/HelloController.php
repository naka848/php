<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    public function index(Request $request)
    {
        $items = DB::select('select * from people');
        return view('hello.index', ['items'=>$items]);
    }

    public function post(Request $request)
    {
        $items = DB::select('select * from people');
        return view('hello.index', ['items'=>$items]);
    }

    // getでアクセスしたときは、入力フォームをだす
    public function add(Request $request)
    {
        return view('hello.add');
    }

    // postでアクセス（入力フォームが送信された）したときは、
    // 入ってる値をデータフォームにつっこむ
    public function create(Request $request)
    {
        // このcreateアクションはデータベースに対してお仕事するだけ
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::insert('insert into people (name,mail,age) values(:name,:mail,:age)', $param);

        // ここのreturnはViewではなくリダイレクトになっている
        return redirect('/hello');
    }

    public function edit(Request $request)
    {
        $param = ['id' => $request->id];
        $item = DB::select('select * from people where id = :id',$param);
        return view('hello.edit',['form' => $item[0]]);
    }

    public function update(Request $request)
    {
        $param = [
            'id' => $request->id,
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::update('update people set name = :name,mail=:mail,age=:age where id=:id',$param);
        return redirect('/hello');
    }
}