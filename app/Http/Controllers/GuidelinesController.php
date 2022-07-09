<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Guideline;

use App\User;

class GuidelinesController extends Controller
{
    public function index()
    {
        $data = [];
        $guidelines = Guideline::orderBy('created_at', 'desc')->paginate(10);
        $data = [
            'guidelines' => $guidelines,
        ];
        // 記事一覧ビューでそれを表示
        return view('welcome', $data);
    }
    
    public function summary()
    {
        $data = [];
        $guidelines = Guideline::orderBy('created_at', 'desc')->paginate(10);
        $data = [
            'guidelines' => $guidelines,
        ];
        // 記事一覧ビューでそれを表示
        return view('guidelines.summary', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guideline = new Guideline;

        // 記事作成ビューを表示
        return view('guidelines.create', [
            'guideline' => $guideline,
        ]);
    }

    // postでguidelines/にアクセスされた場合の「新規登録処理」
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'title' => 'required|max:15',   
        ]);

        // 記事を作成
        $request->user()->guidelines()->create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        // トップページへリダイレクトさせる
        return redirect('/');

    }

    // getでguidelines/（任意のid）にアクセスされた場合の「取得表示処理」
    public function show($id)
    {
        $guideline = Guideline::findOrFail($id);
        
        // 記事詳細ビューでそれを表示
        return view('guidelines.show', [
            'guideline' => $guideline,
        ]);
    }

    // getでguidelines/（任意のid）/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
    {
        // idの値で記事を検索して取得
        $guideline = Guideline::findOrFail($id);

        // 記事編集ビューでそれを表示
        return view('guidelines.edit', [
            'guideline' => $guideline,
        ]);
    }

    // putまたはpatchでguidelines/（任意のid）にアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
          // バリデーション
        $request->validate([
            'title' => 'required|max:15',   
        ]);
        
        // idの値で記事を検索して取得
        $guideline = Guideline::findOrFail($id);
        // 記事を更新
        $guideline->title = $request->title; 
        $guideline->content = $request->content;
        $guideline->save();

        // トップページへリダイレクトさせる
        return redirect('/');
    }

    // deleteでguidelines/（任意のid）にアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        // idの値で記事を検索して取得
        $guideline = Guideline::findOrFail($id);
        // 記事を削除
        if (\Auth::id() === $guideline->user_id) {
            $guideline->delete();
        }

        // トップページへリダイレクトさせる
        return redirect('/');
    }
}
