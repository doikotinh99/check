<?php


namespace App\Http\Services;

use App\Models\Categorys;
use App\Models\Product;
use App\Models\Product_more_detail;
use App\Models\ProductLikes;
use App\Models\User;
use App\Models\vote;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ProductService {

    public function create($request){
        $productA = Product::create([
            "title" => (string) $request -> input("addPrd_name"),
            "status" => 1,
            "id_vendor" => Auth::user()->id,
            "made" => (string) $request -> input("addPrd_made"),
            "material" => (string) $request -> input("addPrd_material"),
            "location" => (string) $request -> input("addPrd_location"),
            "description" => (string) $request -> input("addPrd_desc"),
            "slug" => Str::slug($request -> input("addPrd_name"),"-")

        ]);
        $prdId = $productA->id;
        $arr = explode(",", $request-> input("ip_list_typeCount"));
        for ($i = 0; $i < count($arr); $i++){
            $file = $request -> file("addPrd_image".$arr[$i]);
            $ext =$file->extension();
            $fileName = time().$i.'-prdType'.'.'.$ext;
            $file->move(public_path("upload/images/testUp"), $fileName);
            Product_more_detail::create([
                "size" => (string) $request -> input("addPrd_size".$arr[$i]),
                "product_id" => $prdId,
                "id_category" => (integer) $request->input("addPrd_category".$arr[$i]),
                "type" => (string) $request -> input("addPrd_type".$arr[$i]),
                "price" => (integer) $request -> input("addPrd_price".$arr[$i]),
                "count" => (integer) $request -> input("addPrd_count".$arr[$i]),
                "category_id" => (integer) $request -> input("addPrd_ctgr".$arr[$i]),
                "images" => $fileName
            ]);
        }
        return true;
    }
    public function activeCategory($id){
        $category = Categorys::where("id", $id)->first();
        $category->status = 1;
        $category->save();
        return true;
    }

    public function unactiveCategory($id){
        $category = Categorys::where("id", $id)->first();
        $category->status = 0;
        $category->save();
        return true;
    }
    public function deleteCategory($id){
        $category = Categorys::where("id", $id)->first();
        $category->delete();
        return true;
    }
    public function checkCategory($category){
        $categorys = Categorys::get();
        for($i = 0; $i < count($categorys); $i++){
            if($categorys[$i]->name == $category){
                return false;
            }
        }
        return true;
    }
    public function categoryCreate($name){
        if ($this->checkCategory($name)){
            Categorys::create([
                "name" => (string) $name,
                "status" => 1,
                "slug" => Str::slug($name,"-")
            ]);
            return true;
        }else{
            return false;
        }
    }

    public function getCategory($id = false){
        if(!$id){
            return Categorys::get();
        }else{
            return Categorys::where('id', $id)->where("status", 1)
                -> get();
        }

    }

    public function getProduct(){
        $product = Product::get();
        for($i = 0; $i < count($product); $i++){
            $id = User::where("id", $product[$i]->id_vendor)->get();
            $product[$i]->vendor = $id;
        }
        return $product;
    }

    private function getMoreDetail($product){
        for($i = 0; $i < count($product); $i++){
            $id = User::where("id", $product[$i]->id_vendor)->get();
            $more_detail = Product_more_detail::where("product_id", $product[$i]->id)->get();
            for($j = 0; $j < count($more_detail); $j++){
                $category = Categorys::where("id", $more_detail[$j]->category_id)->first();
                $more_detail[$j]->category = $category;
            }
            $product[$i]->vendor = $id;
            $product[$i]->more_detail = $more_detail;
        }
        return $product;
    }

    public function getProductDetail($id){
        $product = Product::where("id", $id)->where("status", 1)->first();
        $id = User::where("id", $product->id_vendor)->get();
        $more_detail = Product_more_detail::where("product_id", $product->id)->orderBy("price")->get();
        for($j = 0; $j < count($more_detail); $j++){
            $category = Categorys::where("id", $more_detail[$j]->category_id)->first();
            $more_detail[$j]->category = $category;
        }
        $product->vendor = $id;
        $product->more_detail = $more_detail;
        return $product;
    }
    public function getProductAction($status){
        if($status == "active"){
            $product = Product::where("status", 1)->get();
            $product = $this->getMoreDetail($product);

        }else{
            $product = Product::where("status", 0)->get();
            for($i = 0; $i < count($product); $i++){
                $id = User::where("id", $product[$i]->id_vendor)->get();
                $product[$i]->vendor = $id;
            }
        }
        return $product;
    }
    public function activeProduct($id){
        $product = Product::where("id", $id)->first();
        if($product->status == 1){
            $product->status = 0;
        }else{
            $product->status = 1;
        }
        $product->save();
        return true;
    }

    public function deleteProduct($id){
        $product = Product::where("id", $id)->first();
        $product_more_detail = Product_more_detail::where("product_id", $product->id)->delete();
        $product->delete();
        return true;
    }

    public function getProductBetSale(){
        $product = Product::where("status", 1)->orderby("sale", 'desc')->get();
        $product = $this->getMoreDetail($product);
        return $product;
    }

    public function getSearchProduct($key){
        $product = Product::where("status", 1)->where("title", "like", "%$key%")->limit(5)->get();
        $product = $this->getMoreDetail($product);
        return $product;
    }

    public function addCart($product_id, $count){
        $productLike = ProductLikes::where("product_id", $product_id)->where("user_id", Auth::id())->get();
        if(count($productLike) > 0){
            $productLike = ProductLikes::where("product_id", $product_id)->where("user_id", Auth::id())
                ->first();
            $productLike->update(["count" => $productLike->count + $count]);
            return 0;
        }
        ProductLikes::create([
            "product_id" => $product_id,
            "user_id" => Auth::id(),
            "action" => "cart",
            "count" => $count
        ]);
        return 1;
    }

    public function getCountCart(){
        $count = ProductLikes::where("user_id", Auth::id())->count();
        return $count;
    }

    public function getProductCart(){
        $cart = ProductLikes::join("products", 'product_likes.product_id', '=', 'products.id')
            ->where("user_id", Auth::id())->get();
        $product = $this->getMoreDetail($cart);
        return $product;
    }

    public function VoteStore($countV, $cmt, $product_id){
        vote::create([
            'product_id' => $product_id,
            'user_id' => Auth::id(),
            'vote' => $countV,
            'comment' => $cmt,
            'status' => 1
        ]);
        return true;
    }

    public function getVotePrd($id, $skip){
        $vote = vote::where("status", 1)->where("product_id", $id)->orderBy("id", 'desc')->skip($skip)->take(5)->get();
        for($i = 0; $i < count($vote); $i++){
            $user = User::where('id', $vote[$i]->user_id)->first();
            $vote[$i]->user = $user;
        }
        return $vote;
    }

    public function getVoteAllPrd($id){
        $vote = vote::where("status", 1)->where("product_id", $id)->orderBy("id", 'desc')->get();
        for($i = 0; $i < count($vote); $i++){
            $user = User::where('id', $vote[$i]->user_id)->first();
            $vote[$i]->user = $user;
        }
        return $vote;
    }
}
?>
