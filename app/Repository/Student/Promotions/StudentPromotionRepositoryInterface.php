<?php 

namespace App\Repository\Student\Promotions;

interface StudentPromotionRepositoryInterface {

    // index
    public function index();

    // store
    public function store($request);
}