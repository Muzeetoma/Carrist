<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
        
        $user_id = Auth::id();

        $dealers = DB::table('dealer_types')->latest()->limit(4)->get();
        
        $mechanics = DB::table('mechanic_types')->latest()->limit(4)->get();
       
        $carparts = DB::table('car_parts')->latest()->limit(4)->get();

        $cart_number =  DB::table('carrist_carts')->where('user_id',$user_id)->count();

        return view('welcome', ['carparts' => $carparts,'dealers' => $dealers, 'mechanics' => $mechanics,'cart_num' => $cart_number]);
});

Auth::routes(['verify'=>true]);

Route::get('/home', function () {
        
        $user_id = Auth::id();

        $dealers = DB::table('dealer_types')->latest()->limit(4)->get();
        
        $mechanics = DB::table('mechanic_types')->latest()->limit(4)->get();
       
        $carparts = DB::table('car_parts')->latest()->limit(4)->get();

        $cart_number =  DB::table('carrist_carts')->where('user_id',$user_id)->count();

        return view('welcome', ['carparts' => $carparts,'dealers' => $dealers, 'mechanics' => $mechanics,'cart_num' => $cart_number]);
});
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');


Route::get('/verified', [App\Http\Controllers\HomeController::class, 'verified'])->name('verification.success');


Route::post('/autocomplete', [App\Http\Controllers\SearchController::class, 'autocomplete'])->name('autocomplete');
Route::post('/autocomplete/carpart', [App\Http\Controllers\SearchController::class, 'autocompleteCarpart'])->name('autocomplete.carpart');


Route::get('/carpart/{$id}/edit', [App\Http\Controllers\AdminController::class, 'showCarpartEdit'])->name('carpart.show.edit');
//Route::post('/carpart/{$id}', [App\Http\Controllers\AdminController::class, 'updateCarpart'])->name('carpart.edit');


Route::prefix('admin')->group(function(){
Route::get('/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name('admin.login.submit');
Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/users', [App\Http\Controllers\AdminController::class, 'showUsers'])->name('admin.users');
Route::get('/carparts', [App\Http\Controllers\AdminController::class, 'showCarparts'])->name('admin.carparts');

Route::get('/dealers', [App\Http\Controllers\AdminController::class, 'showDealers'])->name('admin.dealers');

Route::get('/dealer-types', [App\Http\Controllers\AdminController::class, 'showDealerTypes'])->name('admin.dealer-types');
Route::get('/mechanic-types', [App\Http\Controllers\AdminController::class, 'showMechanicTypes'])->name('admin.mechanic-types');
Route::get('/car-names', [App\Http\Controllers\AdminController::class, 'showCarnames'])->name('admin.car-names');

});




Route::post('/users/delete', [App\Http\Controllers\AdminController::class, 'destroy'])->name('users.delete');
Route::post('/users/verify', [App\Http\Controllers\AdminController::class, 'verify'])->name('users.verify');
Route::post('/users/available', [App\Http\Controllers\AdminController::class, 'available'])->name('users.available');

Route::post('/dealers/delete', [App\Http\Controllers\AdminController::class, 'destroyDealers'])->name('dealers.delete');
Route::post('/dealers/verify', [App\Http\Controllers\AdminController::class, 'verifyDealers'])->name('dealers.verify');
Route::post('/dealers/available', [App\Http\Controllers\AdminController::class, 'availableDealers'])->name('dealers.available');


Route::post('/carpart/delete', [App\Http\Controllers\AdminController::class, 'destroyCarpart'])->name('carpart.delete');
Route::post('/carpart/available', [App\Http\Controllers\AdminController::class, 'availableCarpart'])->name('carpart.available');
Route::post('/carpart/store', [App\Http\Controllers\AdminController::class, 'storeCarpart'])->name('carpart.store');
//Route::post('/carpart/store', [App\Http\Controllers\AdminController::class, 'storeCarpart'])->name('carpart.store');
Route::post('/carpart/edit/', [App\Http\Controllers\AdminController::class, 'showCarpartEdit'])->name('carpart.show.edit');
Route::post('/carpart/process-edit/', [App\Http\Controllers\AdminController::class, 'editCarpart'])->name('carpart.edit');


Route::post('/dealer-types/add', [App\Http\Controllers\AdminController::class, 'addDealerType'])->name('dealer.types.add');
Route::post('/dealer-types/delete', [App\Http\Controllers\AdminController::class, 'destroyDealerType'])->name('dealer.types.destroy');

Route::post('/mechanic-types/add', [App\Http\Controllers\AdminController::class, 'addmechanicType'])->name('mechanic.types.add');
Route::post('/mechanic-types/delete', [App\Http\Controllers\AdminController::class, 'destroymechanicType'])->name('mechanic.types.destroy');

Route::post('/car-names/add', [App\Http\Controllers\AdminController::class, 'addCarName'])->name('car.names.add');
Route::post('/car-models/add', [App\Http\Controllers\AdminController::class, 'addCarModel'])->name('car.models.add');


Route::get('/user-edit', [App\Http\Controllers\SectionController::class, 'editUser'])->name('user.edit');
Route::post('/edit-user', [App\Http\Controllers\SectionController::class, 'userEdit'])->name('edit.user');
Route::post('/edit-mechanic', [App\Http\Controllers\SectionController::class, 'mechanicEdit'])->name('edit.mechanic');
Route::post('/edit-dealer', [App\Http\Controllers\AdminController::class, 'dealerEdit'])->name('edit.dealer');
Route::get('/dealer-edit/{spec_id}', [App\Http\Controllers\AdminController::class, 'showDealerEdit'])->name('dealer.edit');


Route::post('/reg_mechanic', [App\Http\Controllers\Auth\RoleRegisterController::class, 'mechanic_register'])->name('register.mechanic');
Route::post('/reg_dealer', [App\Http\Controllers\AdminController::class, 'dealer_register'])->name('register.dealer');

Route::post('/details/carpart', [App\Http\Controllers\DetailsController::class, 'showCardetails'])->name('carpart.details');

Route::post('/details/user', [App\Http\Controllers\DetailsController::class, 'showUserdetails'])->name('user.details');

Route::get('/shopping/cart', [App\Http\Controllers\CartController::class, 'showCart'])->name('shopping.cart')->middleware('verified');



Route::post('/shopping/add-to-cart', [App\Http\Controllers\CartController::class, 'add_to_cart'])->name('shopping.add')->middleware('verified');

Route::post('/shopping/plus', [App\Http\Controllers\CartController::class, 'plus'])->name('shopping.plus');

Route::post('/shopping/minus', [App\Http\Controllers\CartController::class, 'minus'])->name('shopping.minus');

Route::post('/shopping/delete', [App\Http\Controllers\CartController::class, 'delete'])->name('shopping.delete');


Route::get('/category/carparts', [App\Http\Controllers\CategoryController::class, 'showCarparts'])->name('category.carparts');

Route::get('/category/carparts/model/{part}', [App\Http\Controllers\CategoryController::class, 'modelCarparts'])->name('model.carparts');


Route::get('/category/mechanics', [App\Http\Controllers\CategoryController::class, 'showMechanics'])->name('category.mechanics');

Route::get('/category/dealers', [App\Http\Controllers\CategoryController::class, 'showDealers'])->name('category.dealers');

Route::get('/category/mechanics/{spec}', [App\Http\Controllers\CategoryController::class, 'findMechanics'])->name('category.find.mechanics');

Route::get('/category/dealers/{spec}', [App\Http\Controllers\CategoryController::class, 'findDealers'])->name('category.find.dealers');