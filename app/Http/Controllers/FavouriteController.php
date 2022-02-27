<?php

namespace App\Http\Controllers;

use App\Models\Favourites;
use App\Models\ProductList;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    //
    public function AddFavourite(Request $requset){ 
        $product_code = $requset->product_code; 
        $email = $requset->email;
        $productDetails = ProductList::where('product_code',$product_code)->get(); 
        $result = Favourites::insert([
            "product_name" => $productDetails[0]['title'],
            "email" => $email,
            "product_code" => $product_code,
            'image' => $productDetails[0]['image'],
        ]); 
        return $result; 
    }
    
    // get FavouriteList
    public function FavouriteList(Request $request){
        $email = $request->email;
        $result = Favourites::where('email',$email)->get();
        return $result;

    }// End Mehtod 
    public function FavouriteRemove(Request $request){
        $product_code = $request->product_code;
        $email = $request->email;
        $result = Favourites::where('product_code',$product_code)->where('email',$email )->delete();
        return $product_code;

    }// End Mehtod 
}
