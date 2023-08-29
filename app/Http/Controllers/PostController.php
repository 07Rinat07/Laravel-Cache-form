<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StoreRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        return inertia('Post/Create');
    }

    public function store(StoreRequest $request)
    {

    }
}
