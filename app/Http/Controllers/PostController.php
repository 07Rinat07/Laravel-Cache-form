<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        return inertia('Post/Create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $data[ 'user_id'] = auth()->id();

        Post::create($data);

        return response()->json([
           'message' => 'Пост добавлен'
        ]);
    }
}
