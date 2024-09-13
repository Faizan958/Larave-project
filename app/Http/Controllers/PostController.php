<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Interface\PostRepositoryInterface;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public $postrepository;
    public function __construct(PostRepositoryInterface $postrepository){
        $this->postrepository = $postrepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = $this->postrepository->index();
        return view('posts.index', ['post' => $post]);
    }
    


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $this->postrepository->store($request->all());
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = $this->postrepository->find($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = $this->postrepository->update($request->all(), $id);
        return view("posts.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->postrepository->destory($id);
        return back();
    }
}
