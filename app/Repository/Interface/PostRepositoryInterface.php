<?php

namespace App\Repository\Interface;

interface PostRepositoryInterface
{
    public function index();
    public function store(array $data);
    public function find($id);
    public function update(array $data,$id);
    public function destory($id);
}
?>