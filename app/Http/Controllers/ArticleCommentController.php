<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\ArticleComment;
use Illuminate\Support\Facades\Auth;

class ArticleCommentController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $comment = new ArticleComment([
        'user_id' => Auth::id(),
        'content' => $request->input('content')
        ]);

        $article->comments()->save($comment);

        return response()->json([
            'user' => Auth::user()->name,
            'content' => $comment->content
        ]);
    }
}
