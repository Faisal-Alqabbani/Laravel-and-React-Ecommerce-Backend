<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\VisitorController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\SiteInfoController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductListController;
use App\Http\Controllers\Admin\SliderController;
// ProductDetailsController
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\ReviewController;

use App\Http\Controllers\Admin\NotificationController;
//  Authentication Controllers
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\ForgetController;
use App\Http\Controllers\User\RestController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\ProductCartController;

use App\Http\Controllers\FavouriteController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


/////////////////////// USER AUTH ROUTES //////////////////////////////////////////////
Route::post("/login", [AuthController::class, "Login"]);
Route::post("/register", [AuthController::class, "Register"]);

// Forget Password Routes
Route::post("/forget-password", [ForgetController::class, "ForgetPassword"]);
// Rest Password Routes
Route::post("/reset-password", [RestController::class, "ResetPassword"]);

// current-user Routers
Route::get("/user", [UserController::class, "User"])->middleware("auth:api");

// 





// Get Visitor
Route::get("/getvisitor",[VisitorController::class, "GetVisitorDetails"]);

// Contact Page Routes
Route::post("/postcontact",[ContactController::class, "PostContactDetails"]);
// siteino Routes
Route::get("/allsiteinfo",[SiteInfoController::class, "AllSiteinfo"]);

// Categories routes
Route::get("/allcategories",[CategoryController::class, "AllCategories"]);
// Product list Routers 
// get all products by thier category
Route::get("/productlistbyremark/{remark}",[ProductListController::class, "ProductListByRemark"]);
Route::get("/productlistbycategory/{category}",[ProductListController::class, "ProductListByCategory"]);
Route::get("/productlistbysubcategory/{category}/{subcategory}",[ProductListController::class, "ProductListByCategoryAndSubcateogry"]);

//  slider controller 
Route::get("/getallslider",[SliderController::class, "GetAllSlider"]);
// product details routers
Route::get("/productdetails/{id}",[ProductDetailsController::class, "ProductDetails"]);
// product Notification
Route::get("/getallnotification",[NotificationController::class, "GetAllNotification"]);
// search routers
Route::get("/search/{key}",[ProductListController::class, "ProductBySearch"]);
// get all similar product
Route::get("/similar/{subcategory}",[ProductListController::class, "SimilarProduct"]);
// Review Product Route
// get all reviews with limit of six values 

Route::get('/reviewlist/{id}',[ReviewController::class, 'ReviewList']);
// Productcart controller
Route::post('/addtocart', [ProductCartController::class, "AddToCart"]);
// cart count Routes
// Cart Count Route
// Route::get('/cartcount/{product_code}',[ProductCartController::class, 'CartCount']);
//  get all cart Item
Route::get('/cartlist/{email}',[ProductCartController::class, 'CartList']);
Route::get('/removecartlist/{id}',[ProductCartController::class, 'RemoveCartList']);
Route::get('/cartitemplus/{id}/{quantity}/{price}',[ProductCartController::class, 'CartItemPlus']);
Route::get('/cartitemminus/{id}/{quantity}/{price}',[ProductCartController::class, 'CartItemMinus']);
Route::get('/cartcount/{email}',[ProductCartController::class, 'CartCount']);
Route::post('/cartorder',[ProductCartController::class, 'CartOrder']);
// FavouriteController.
Route::get('/favourite/{product_code}/{email}', [FavouriteController::class, 'AddFavourite']); 
// get Favourite list
Route::get('/favouritelist/{email}',[FavouriteController::class, 'FavouriteList']); 
// remove item from favourite model
Route::get('/favouriteremove/{product_code}/{email}',[FavouriteController::class, 'FavouriteRemove']);




