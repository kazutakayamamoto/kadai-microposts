<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function store($id)
    {
        \Auth::user()->favorite($id);
        return back();
    }

    /**
     * ユーザをアンフォローするアクション。
     *
     * @param  $id  相手ユーザのid
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \Auth::user()->unfavorite($id);
        return back();
    }
}
