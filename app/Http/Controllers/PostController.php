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
        $this->postrepository->index();
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
        return view('posts');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
