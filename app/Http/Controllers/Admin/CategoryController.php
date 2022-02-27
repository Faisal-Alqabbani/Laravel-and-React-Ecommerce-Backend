<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
class CategoryController extends Controller
{
    //
    public function AllCategories(){
      $categories = Category::all();
      $categoryDetailsArray = [];
      foreach ($categories as $value) {
        # code...
        $subcategory = SubCategory::where("category_name", $value["category_name"])->get();
        $item = [
          "category_name" => $value["category_name"],
          'category_image' => $value["category_image"],
          "subcategory_name" => $subcategory,
        ]; 
        array_push($categoryDetailsArray, $item);
      }
      return $categoryDetailsArray;  
    }
}
