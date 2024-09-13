<?php
namespace App\Repository;

use App\Models\Post;
use App\Repository\Interface\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    public $post;
    public function __construct(Post $post){
        $this->post = $post;
    }

    public function index(){
{
    return Post::with('user')->get();
}
    }

    public function store(array $data){
        return $this->post::create($data);
    }

    public function find($id)
    {
        return $this->post::findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $post = $this->post::findOrFail($id);
        $post->update($data);
        return $post;

    }
    public function destory($id){
        $post = $this->post::find($id);
        $post->delete();
        return $post;
    }
}
?>