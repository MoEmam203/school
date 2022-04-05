<?php 

namespace App\Repository\Student\Promotions;

interface StudentPromotionRepositoryInterface {

    // create
    public function create();

    // store
    public function store($request);
}