<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tutorial;

use App\User;

class TutorialsController extends Controller
{
    public function index()
    {
        $data = [];
        $tutorials = Tutorial::orderBy('created_at', 'desc')->paginate(10);
        $data = [
            'tutorials' => $tutorials,
        ];
        // 記事一覧ビューでそれを表示
        return view('welcome', $data);
    }
    
    public function summary()
    {
        $data = [];
        $tutorials = Tutorial::orderBy('created_at', 'desc')->paginate(10);
        $data = [
            'tutorials' => $tutorials,
        ];
        // 記事一覧ビューでそれを表示
        return view('tutorials.summary', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tutorial = new Tutorial;

        // 記事作成ビューを表示
        return view('tutorials.create', [
            'tutorial' => $tutorial,
        ]);
    }

    // postでtutorials/にアクセスされた場合の「新規登録処理」
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'title' => 'required|max:15',   
        ]);

        // 記事を作成
        $request->user()->tutorials()->create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        // トップページへリダイレクトさせる
        return redirect('/');

    }

    // getでtutorials/（任意のid）にアクセスされた場合の「取得表示処理」
    public function show($id)
    {
        $tutorial = Tutorial::findOrFail($id);
        
        // 記事詳細ビューでそれを表示
        return view('tutorials.show', [
            'tutorial' => $tutorial,
        ]);
    }

    // getでtutorials/（任意のid）/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
    {
        // idの値で記事を検索して取得
        $tutorial = Tutorial::findOrFail($id);

        // 記事編集ビューでそれを表示
        return view('tutorials.edit', [
            'tutorial' => $tutorial,
        ]);
    }

    // putまたはpatchでtutorials/（任意のid）にアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
          // バリデーション
        $request->validate([
            'title' => 'required|max:15',   
        ]);
        
        // idの値で記事を検索して取得
        $tutorial = Tutorial::findOrFail($id);
        // 記事を更新
        $tutorial->title = $request->title; 
        $tutorial->content = $request->content;
        $tutorial->save();

        // トップページへリダイレクトさせる
        return redirect('/');
    }

    // deleteでtutorials/（任意のid）にアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        // idの値で記事を検索して取得
        $tutorial = Tutorial::findOrFail($id);
        // 記事を削除
        if (\Auth::id() === $tutorial->user_id) {
            $tutorial->delete();
        }

        // トップページへリダイレクトさせる
        return redirect('/');
    }
}
