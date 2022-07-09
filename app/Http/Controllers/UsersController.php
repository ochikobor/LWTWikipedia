<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Guideline;

use App\User; // 追加

class UsersController extends Controller
{
    public function index()
    {
        // ユーザの投稿一覧を作成日時の降順で取得
        $user = \Auth::user();
        $guidelines = \Auth::user()->guidelines()->orderBy('created_at', 'desc')->paginate(10);
        $tutorials = \Auth::user()->guidelines()->orderBy('created_at', 'desc')->paginate(10);
        // ユーザ詳細ビューでそれらを表示
        return view('users.show', [
            'user' => $user,
            'guidelines' => $guidelines,
            'tutorials' => $tutorials,
        ]);
    }
    
    
    public function tutorials($id)
    {
        $user = User::find($id);
        $tutorials = $user->tutorials()->orderBy('created_at', 'desc')->paginate(25);
        
        // 記事詳細ビューでそれを表示
        return view('users.tutorials_show', [
            'tutorials' => $tutorials,
        ]);
    }
    
    public function guidelines($id)
    {
        $user = User::find($id);
        $guidelines = $user->guidelines()->paginate(25);
        
        // 記事詳細ビューでそれを表示
        return view('users.guidelines_show', [
            'guidelines' => $guidelines,
        ]);
    }
    
}