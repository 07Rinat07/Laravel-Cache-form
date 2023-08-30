<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StoreCacheRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function create()
    {
        $key = 'post_user_' . auth()->id();
        $cache = Cache::get($key);
        return inertia('Post/Create', compact('cache'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = auth()->id();

        Post::create($data);

        $key = 'post_user_' . auth()->id();
        if (Cache::has($key)) {
            Cache::forget($key);
        }

        return response()->json([
            'message' => 'Пост добавлен'
        ]);
    }

    public function storeCache(StoreCacheRequest $request)
    {
        $data = $request->validated();
        $key = 'post_user_' . auth()->id();
        Cache::put($key, $data);
    }
}
