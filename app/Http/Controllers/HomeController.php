<?php

namespace App\Http\Controllers;

use App\Http\Services\ProductService;
use App\Models\Categorys;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $productServices;
    public function __construct(ProductService $productService)
    {
//         $this->middleware('auth');
        $this->productServices = $productService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $category = $this->productServices->getCategory();
        $product = $this->productServices->getProductAction("active");
        $bestsale = $this->productServices->getProductBetSale();
        $data = [
            'pages' => ["pages.home_slide", "pages.home_banner", "pages.home_new_arr", "pages.home_dealofweek", "pages.home_best_sell", "pages.home_benefit", "pages.home_blogs", "pages.home_newsletter"],
            'title' => "SALE3S - shop bán quần áo uy tín số 1",
            'title_newArr' => "Sản phẩm mới về",
            'category_product' => $category,
            'product' => $product,
            'best_sale' => $bestsale
        ];
        return view('master_layout', $data);
    }

    public function welcome(){
        return view("welcome");
    }
}
