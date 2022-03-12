<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Services\ProductService;
use App\Models\Categorys;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Auth;
class ProductController extends Controller
{
    protected $productService;
    public function __construct(ProductService $productServices)
    {
        $this->productService = $productServices;
    }
    //
    public function create(){
        $data = [
            'title' => "Thêm sản phẩm",
            'page' => "admin.pages.addproduct",
            'tabs' => ["add", "product"]
        ];
        return view("admin.admin", $data);
    }

    public function store(ProductRequest $request){
        $result = $this->productService->create($request);
        return redirect()->back();
    }

    public function addType($type_count){
        $category = Categorys::where("status", 1)->get();
        return view("admin.blocks.add_product_type",
            ['type_count' => $type_count,
                'category' => $category
            ]);
    }

    public function categoryView($id = false){
        $result = $this->productService->getCategory();
        return view("admin.pages.category_show", ["ctgr" => $result]);
    }

    public function categoryStore($name){
        $result = $this->productService->categoryCreate($name);
        return $result;
    }

    public function activeCategory($id){
        $result = $this->productService->activeCategory($id);
        return $result;
    }

    public function unactiveCategory($id){
        $result = $this->productService->unactiveCategory($id);
        return $result;
    }

    public function deleteCategory($id){
        $result = $this->productService->deleteCategory($id);
        return $result;
    }
    public function getsProduct(){
        $data = [
            'title' => "asd",
            'pages' => [
                "pages.contact",
                "pages.home_best_sell",
                "pages.home_benefit",
                "pages.home_blogs",
                "pages.home_newsletter"
            ],
//            'product' => $this->productService->getProduct()
        ];
        return view("master_layout", $data);
    }
    public function getSearch($search = ""){
        $searchData = $this->productService->getSearchProduct($search);
        $bestsale = $this->productService->getProductBetSale();
        $data = [
            'title' => $search,
            'pages' => [
                "pages.home_new_arr",
                "pages.search",
                "pages.home_best_sell",
                "pages.home_benefit",
                "pages.home_blogs",
                "pages.home_newsletter"
            ],
            'title_newArr' => 'Tìm kiếm "'.$search.'"',
            'product' => $searchData,
            'best_sale' => $bestsale
        ];
        return view("master_layout", $data);
    }

    function getDataSearch($search = ""){
        $searchData = $this->productService->getSearchProduct($search);
        return json_decode($searchData);
    }
    public function getLike(Request $request){
        $product_id = $request->product_id;
        $count = $request->count;
        $result = $this->productService->addCart($product_id, $count);
        return $result;
    }



    public function getCart(){
        $bestsale = $this->productService->getProductBetSale();
        $product = $this->productService->getProductCart();
        $data = [
            'title' => "Giỏ hàng",
            'pages' => [
                "pages.my_cart",
                "pages.home_best_sell",
                "pages.home_benefit",
                "pages.home_blogs",
                "pages.home_newsletter"
            ],
            'product' => $product,
            'best_sale' => $bestsale
        ];
        return view("master_layout", $data);
    }

    public function PayProducts(){
        $bestsale = $this->productService->getProductBetSale();
        $product = $this->productService->getProductCart();
        $data = [
            'title' => "Thanh toán",
            'pages' => [
                "pages.pay_product",
                "pages.home_best_sell",
                "pages.home_benefit",
                "pages.home_blogs",
                "pages.home_newsletter"
            ],
            'product' => $product,
            'best_sale' => $bestsale
        ];
        return view("master_layout", $data);
    }

    public function productDetail($id, $slug){
        $product = $this->productService->getProductDetail($id);
        $vote = $this->productService->getVotePrd($id, 0);
        $votes = $this->productService->getVoteAllPrd($id);
        $data = [
            'title' => $product->title,
            'pages' => [
                "pages.product_detail"
            ],
            'product' => $product,
            'vote' => $vote,
            'votes' => $votes
        ];
        return view("master_layout", $data);
    }

    public function adminGetProduct(){
        $result = $this->productService->getProduct();
        return view("admin.pages.product_show", ["product" => $result]);
    }

    public function activeProduct($id){
        $result = $this->productService->activeProduct($id);
        return $result;
    }

    public function deleteProduct($id){
        $result = $this->productService->deleteProduct($id);
        return $result;
    }
    public function getProductAction($status){
        $result = $this->productService->getProductAction($status);
        return view("admin.pages.product_show", ["product" => $result]);
    }

    public function getCountCart(){
        $result = $this->productService->getCountCart();
        return $result;
    }

    public function VoteStore(Request $request){
        $countV = $request->count;
        $comment = $request->comment;
        $product_id = $request->product_id;
        $result = $this->productService->VoteStore($countV, $comment, $product_id);
        return $result;
    }

    public function VoteView(Request $request){
        $product_id = $request->product_id;
        $product = $this->productService->getProductDetail($product_id);
        $votes = $this->productService->getVoteAllPrd($product_id);
        $vote = $this->productService->getVotePrd($product_id, 0);
        return view("pages.vote_product", ['votes' => $votes, 'vote' => $vote, 'product' => $product]);
    }

    public function getCmtPrd(Request $request){
        $skip = $request->skip;
        $product_id = $request->product_id;
        $vote = $this->productService->getVotePrd($product_id, $skip);
        return view("pages.list_cmt_prd", ['vote' => $vote]);
    }
}
