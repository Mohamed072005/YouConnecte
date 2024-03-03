<?php

namespace App\Services;

interface LikeServiceInterface
{
    public function store($id);

    public function getLikes();
}
