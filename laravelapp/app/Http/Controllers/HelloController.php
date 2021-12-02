<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Person;

class HelloController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $sort = $request->sort;
        $items = Person::orderBy('name','asc')->simplePaginate(3);
        $param = ['items' => $items,'sort' => $sort, 'user' => $user];
        return view('hello.index', $param);
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

    public function ses_get(Request $request)
    {
        $sesdata = $request->session()->get('msg');
        return view('hello.session',['session_data' => $sesdata]);
    }

    public function ses_put(Request $request)
    {
        $msg = $request->input;
        $request->session()->put('msg',$msg);
        return redirect('hello/session');
    }

    public function getAuth(Request $request)
    {
        $param = ['message' => 'ログインしてください。'];
        return view('hello.auth',$param);
    }
    public function postAuth(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email,'password' => $password])){
            $msg = 'ログインしました。(' . Auth::user()->name . ')';
        }else{
            $msg = 'ログインに失敗しました。';
        }
        return view('hello.auth',['message' => $msg]);
    }


}