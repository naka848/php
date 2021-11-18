<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    public function index(Request $request)
    {
        // $items = DB::table('people')->get();
        // return view('hello.index', ['items'=>$items]);

        $items = DB::table('people')->orderBy('age','asc')->get();
        return view('hello.index', ['items'=>$items]);
    }

    public function show(Request $request)
    {
        $page = $request->page;
        $items = DB::table('people')
            ->offset($page * 3)
            ->limit(3)
            ->get();
        return view('hello.show',['items' => $items]);
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
        DB::table('people')->insert($param);

        // ここのreturnはViewではなくリダイレクトになっている
        return redirect('/hello');
    }

    public function edit(Request $request)
    {
        // $param = ['id' => $request->id];
        $item = DB::table('people')
            ->where('id',$request->id)->first();
        return view('hello.edit',['form' => $item]);
    }

    public function update(Request $request)
    {
        $param = [
            // 'id' => $request->id,
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::table('people')
            ->where('id',$request->id)
            ->update($param);
        return redirect('/hello');
    }
}