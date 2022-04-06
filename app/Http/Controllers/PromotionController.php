<?php

namespace App\Http\Controllers;

use App\Http\Requests\PromotionRequest;
use App\Models\Promotion;
use App\Repository\Student\Promotions\StudentPromotionRepositoryInterface;
use Illuminate\Http\Request;

class PromotionController extends Controller
{

    public $promotion;
    public function __construct(StudentPromotionRepositoryInterface $promotion)
    {
        $this->promotion = $promotion;
    }

    public function index()
    {
        return $this->promotion->index();
    }


    public function create()
    {
        return $this->promotion->create();
    }


    public function store(PromotionRequest $request)
    {
        return $this->promotion->store($request);
    }


    public function show(Promotion $promotion)
    {
        //
    }


    public function edit(Promotion $promotion)
    {
        //
    }


    public function update(Request $request, Promotion $promotion)
    {
        //
    }


    public function destroy(Promotion $promotion)
    {
        //
    }

    public function rollbackAllPromotions(){
        return $this->promotion->rollbackAllPromotions();
    }
}
