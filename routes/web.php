<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

// معرفی کنترلر ها
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\aboutusController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Admin\AdminPanelController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FactoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProductController as HomeProductController;
use App\Http\Controllers\Admin\UserController;

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

// ↓ روت های سایت اصلی
// ↓ صفحه ریشه و اصلی سایت
Route::get('/', [HomeController::class , "index"])-> name('Home');

Route::group(['prefix' => 'Sepehr-Electric'], function(){
    // ↓ صفحه تمامی محصولات
    Route::get('/All-Products', [HomeController::class , "All_Products"])-> name('All-Products');
    // ↓ صفحه درباره ما
    Route::get('/About-Us', [aboutusController::class , "index"])-> name('About-Us');
    // ↓ صفحه ورود ادمین
    Route::get('Admin/Login', [AuthController::class , "Admin_L"] )-> name('Admin-Login');
    // ↓ جستجو
    Route::post('Search', [SearchController::class , "Search"] )-> name('Search');

    Route::group(['prefix' => 'User'],function(){
        // ↓ صفحه ورود یوزر
        Route::get('/Login',[AuthController::class , "User_L"])-> name('LogIn');
        // ↓ صفحه ثبت نام
        Route::get('/Register', [AuthController::class , "Register"])-> name('Register');
        // ↓ صفحه ویرایش کاربر
        Route::get('/Edit_{id}', [AuthController::class , "User_Edit"])-> name('User-Edit');
        // ↓ خروج کاربر
        Route::get('/Exit', [AuthController::class , "User_Exit"])-> name('User-Exit');

    });

    Route::group(['prefix' => 'Product'], function (){
        // نمایش پست تکی
        Route::get('/Single_{id}', [HomeProductController::class , "single_Show"])->name('Single-Show');
        Route::group(['prefix' => 'same'], function(){
            // نمایش پست ها در یک دسته بندی
            Route::get('/Category_{id}', [HomeProductController::class , "Same_Category"])->name('Same-Category');
            // نمایش پست ها در یک کارخانه
            Route::get('/Factory_{id}', [HomeProductController::class , "Same_Factory"])->name('Same-Factory');
        });
    });

    // ↓ صفحه های اعتبار سنجی اطلاعات (سایت اصلی)

    // ↓ اعتبار سنجی ورود کاربر
    Route::post('/UserLoginValidation', [AuthController::class , "UserValidation"])-> name('UserValidation');
    // ↓ اعتبار سنجی ورود ادمین
    Route::post('/AdminLoginValidation', [AuthController::class , "AdminValidation"])-> name('AdminValidation');
    // ↓ اعتبار سنجی ثبت نام کاربر
    Route::post('/RegisterValidation', [AuthController::class , "RegisterValidation"])-> name('RegisterValidation');
    // ↓ اعتبار سنجی ویرایش کاربر
    Route::post('/UserEditValidation', [AuthController::class , "UserEditValidation"])-> name('UserEditValidationHome');


    // ↓ روت های پنل ادمین
    Route::group(['prefix' => 'Admin', 'middleware' => 'Admin'],function(){

        // ↓ پنل ادمین
        Route::get('/Panel', [AdminPanelController::class , "index"])-> name('Admin-Panel');

        // ↓ خروج از پنل ادمین
        Route::get('/Exit-Panel', [AdminPanelController::class , "Admin_Exit"])-> name('Admin-Exit');


        Route::group(['prefix' => 'Panel'],function(){
            // ↓ صفحه نمایش مدیران
            Route::get('/Admins/list', [AdminPanelController::class , "Admins_list"])-> name('Admins-list');
            // ↓ صفحه تایید صلاحیت برای نمایش اطلاعات ادمین
            Route::get('/AdminProfile/Gate', [AdminPanelController::class , "Admin_Profile_Gate_View"])-> name('Admin-Profile-Gate-View');
            // ↓ صفحه پروفایل مدیر وارد شده
            Route::get('/AdminProfile', [AdminPanelController::class , "Admin_Profile"])-> name('Admin-Profile');


            // ↓ صفحه نمایش محصولات
            Route::get('/Products/List/{status?}', [ProductController::class , "index"])->name('Products-List');
            Route::group(["prefix" => "Product"],function (){
                // ↓ صفحه افزودن محصول
                Route::get('/Add', [ProductController::class , "Product_Add"])->name('Product-Add');
                // ↓ صفحه ویرایش محصول
                Route::get('/Edit_{id}', [ProductController::class , "Product_Edit"])->name('Product-Edit');
                // ↓ صفحه حذف محصول
                Route::post('/Delete', [ProductController::class , "Product_Delete"])->name('Product-Delete');
            });

            // ↓ صفحه نمایش کاربران
            Route::get('/Users/List', [UserController::class , "Users_List"])-> name('Users-List');
            Route::group(['prefix' => 'user'],function(){
                // ↓ صفحه افزودن کاربر
                Route::get('/Add', [UserController::class , "User_Add"])-> name('User-Add');
                // ↓ صفحه ویرایش کاربر
                Route::get('/Edit_{id}', [UserController::class , "User_Edit"])-> name('Admin-User-Edit');
                // ↓ صفحه تغییر وضعیت کاربر
                Route::get('/Change-Status{id}', [UserController::class , "Change_Status"])-> name('Change-Status');
                // ↓ حذف کاربر
                Route::post('/User-Delete', [UserController::class , "User_Delete"])-> name('User-Delete');
            });


            // ↓ صفحه نمایش دسته بندی ها
            Route::get('/Categories/List', [CategoryController::class , "Categories_List"])-> name('Categories-List');
            Route::group(["prefix" => "Category"],function (){
                // ↓ صفحه افزودن دسته بندی
                Route::get('/Add', [CategoryController::class , "Category_Add"])-> name('Category-Add');
                // ↓ صفحه افزودن دسته بندی
                Route::get('/Edit_{id}', [CategoryController::class , "Category_Edit"])-> name('Category-Edit');
                // ↓ حذف دسته بندی
                Route::post('/Delete', [CategoryController::class , "Category_Delete"])-> name('Category-Delete');
            });

            // ↓ صفحه نمایش کارخانه ها
            Route::get('/Factories/List', [FactoryController::class , "Factories_List"])-> name('Factories-List');
            Route::group(["prefix" => "Factory"],function (){
                // ↓ صفحه افزودن کارخانه
                Route::get('/Add', [FactoryController::class , "Factory_Add"])-> name('Factory-Add');
                // ↓ صفحه ویرایش کارخانه
                Route::get('/Edit_{id}', [FactoryController::class , "Factory_Edit"])-> name('Factory-Edit');
                // ↓ حذف کارخانه
                Route::post('/Delete', [FactoryController::class , "Factory_Delete"])-> name('Factory-Delete');
            });

        });

        // ↓ صفحه های اعتبار سنجی اطلاعات (پنل ادمین)
        Route::group(['prefix' => 'Validation'],function(){
            // ↓ اعتبار سنجی ثبت کاربر
            Route::post('/User/Add', [UserController::class , "UserAddValidation"])-> name('UserAddValidation');
            // ↓ اعتبار سنجی ویرایش کاربر
            Route::post('/User/Edit', [UserController::class , "UserEditValidation"])-> name('UserEditValidation');
            // ↓ اعتبار سنجی ثبت دسته بندی
            Route::post('/Category/Add', [CategoryController::class , "CategoryAddValidation"])-> name('CategoryAddValidation');
            // ↓ اعتبار سنجی ویرایش دسته بندی
            Route::post('/Category/Edit', [CategoryController::class , "CategoryEditValidation"])-> name('CategoryEditValidation');
            // ↓ اعتبار سنجی ثبت کارخانه
            Route::post('/Factory/Add', [FactoryController::class , "FactoryAddValidation"])-> name('FactoryAddValidation');
            // ↓ اعتبار سنجی ویرایش کارخانه
            Route::post('/Factory/Edit', [FactoryController::class , "FactoryEditValidation"])-> name('FactoryEditValidation');
            // ↓ اعتبار سنجی ثبت محصول
            Route::post('/Product/Add', [ProductController::class , "ProductAddValidation"])-> name('ProductAddValidation');
            // ↓ اعتبار سنجی ویرایش محصول
            Route::post('/Product/Edit', [ProductController::class , "ProductEditValidation"])-> name('ProductEditValidation');
            // ↓ اعتبارسنجی و ثبت ویرایش پروفایل ادمین
            Route::post('/AdminProfile/Edit', [AdminPanelController::class , "Admin_Profile_Edit"])-> name('AdminProfileEditValidation');
            // ↓ اعتبارسنجی و تایید صلاحیت برای نمایش اطلاعات ادمین
            Route::post('/AdminProfile/Gate', [AdminPanelController::class , "Admin_Profile_Gate"])-> name('AdminProfileGateValidation');
        });
    });
    // ↓ در صورت اینکه خواستی امنیت عکسا خیلی بره بالا از این استفاده کن فعلا لازم نیست
    // Route::get('file/{filename}',function($filename){
    //     return response()->file(Storage::path('PrivateProducts\\'.$filename));
    // })->name('file-view');

});
