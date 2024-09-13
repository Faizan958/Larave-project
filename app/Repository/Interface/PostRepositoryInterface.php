<?php

namespace App\Repository\Interface;

interface PostRepositoryInterface
{
    public function index();
    public function store(array $data);
}
?>