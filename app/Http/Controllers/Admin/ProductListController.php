<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductList;
class ProductListController extends Controller
{
    //
    public function ProductListByRemark(Request $request) {
        $remark = $request->remark;
        $productlist = ProductList::where('remark', strtoupper($remark))->limit(8)->get();
        return $productlist;
    } // End method! 
    public function ProductListByCategory(Request $request){
        $category = $request->category;
        $productlist = ProductList::where('category',$category)->get();
        return $productlist;
    }
    //  get product by categor and subcateogry
    public function ProductListByCategoryAndSubcateogry(Request $request){
        $category = $request->category;
        $subcateogry = $request->subcategory;
        $productlist = ProductList::where('category', $category)->where('subcategory', $subcateogry)->get();
        return $productlist;
    }
    // Search method
    public function ProductBySearch(Request $request){
        $key = $request->key;
        $productlist = ProductList::where("title","LIKE","%{$key}%")->orWhere("brand","LIKE", "%{$key}%")->get(); 
        return $productlist;    
    } // End method

    public function SimilarProduct(Request $request){
        $subcategory = $request->subcategory;
        $productlist = ProductList::where('subcategory', $subcategory)->orderBy('id','desc')->limit(6)->get();
        return $productlist;
    }
    
}
