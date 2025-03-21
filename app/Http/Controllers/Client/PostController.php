<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        return view('client.post.index');
    }

    public function detail($id = 0)
    {
        $post = DB::table('posts')->where('id', $id)->first();
        $data = ['id' => $id, 'post' => $post];
        return view('client.post.detail', $data);
    }

    public function postInCategory($category_id = 0)
    {
        $category = DB::table('post_categories')->where('id', $category_id)->first();

        if (!$category) {
            abort(404); 
        }

        $listPost = DB::table('posts')->where('category_id', $category_id)->get();

        return view('client.post.posts-in-category', [
            'category' => $category,
            'listPost' => $listPost
        ]);
    }


    public function getMenu()
    {
        $categories = DB::table('categories')
            ->where('AnHien', 1)
            ->orderBy('ThuTu', 'asc')
            ->get();

        // Trả về view và truyền danh sách danh mục
        return view('client.menu', compact('categories'));
    }
}
