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
        return $this->post::all();
    }

    public function store(array $data){
        return $this->post::create($data);
    }
}
?>