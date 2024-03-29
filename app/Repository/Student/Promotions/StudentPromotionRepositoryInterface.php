<?php 

namespace App\Repository\Student\Promotions;

interface StudentPromotionRepositoryInterface {

    // index
    public function index();

    // create
    public function create();

    // store
    public function store($request);

    // rollback one promotion
    public function destroy($promotion);

    // rollback all promotions
    public function rollbackAllPromotions();
}