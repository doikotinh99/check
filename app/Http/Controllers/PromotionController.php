<?php

namespace App\Http\Controllers;

use App\Http\Services\ProductService;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    protected $productService;
    public function __construct(ProductService $productServices)
    {
        $this->productService = $productServices;
    }

    public function index(){
        $category = $this->productService->getCategory();
        $bestsale = $this->productService->getProductBetSale();
        $data = [
            'pages' => ["pages.home_new_arr",
                "pages.home_best_sell",
                "pages.home_benefit",
                "pages.home_blogs",
                "pages.home_newsletter"],
            'title' => "Các khuyến mãi của shop | SALE3S",
            'title_newArr' => "Khuyễn mãi",
            'best_sale' => $bestsale,
            'product' => $bestsale,
            'category_product' => $category,
        ];
        return view("master_layout", $data);
    }
}
