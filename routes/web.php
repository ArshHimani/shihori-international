<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\AuthController;
use App\Models\Product;

// use App\Models\Certificate;
// use App\Models\GalleryImage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', [ProductTypeController::class, 'index']);


Route::get('/gallery-display',[GalleryController::class,'gallery_display'])->name('gallery.display');

Route::get('/contactUs-display',[ContactUsController::class,'contactUs_display'])->name('contactUs.display');
Route::get('/about',[AboutUsController::class,'aboutUs_display'])->name('aboutUs.display');
Route::get('/certificate-display',[CertificateController::class,'certificate_display'])->name('certificate.display');

Route::get('/products',[ProductController::class,'products'])->name('all.products');

Route::get('/product-details/{productTypeName}',[ProductController::class,'product_details'])->name('product.details');




Route::group(['middleware' => ['checklogin', 'clearcache']], function () {
    Route::get('/productType-add', [ProductTypeController::class, 'productType_add_show'])->name('productType.show');
    Route::post('/productType-add', [ProductTypeController::class, 'productType_add'])->name('productType.add');

    Route::get('/gallery',[GalleryController::class,'gallery'])->name('gallery');

    Route::get('/productType-delete{productTypeId}', [ProductTypeController::class, 'productType_delete'])->name('productType.delete');

    Route::get('/productType-list', [ProductTypeController::class, 'productType_list'])->name('productType.list');
    Route::post('/productType-list/{productTypeId}', [ProductTypeController::class, 'productType_update'])->name('productType.update');

    Route::get('/new-product',[ProductController::class,'new_product'])->name('new.product');

    Route::post('/new-product', [ProductController::class, 'store'])->name('product.store');

    Route::get('/admin-index', [ProductController::class, 'show'])->name('admin.index');
    Route::get('/products/filter', [ProductController::class, 'filterProducts'])->name('admin.products.filter');

    Route::get('/update-product/{productId}',[ProductController::class,'product_update_show'])->name('product.show');

    Route::put('/update-product/{productId}',[ProductController::class,'product_update'])->name('product.update');

    Route::get('/delete-product/{productId}',[ProductController::class,'delete_product'])->name('product.delete');

    Route::get('/certificate-list',[CertificateController::class,'certificate_list'])->name('certificate.list');

    Route::get('/certificate-add',[CertificateController::class,'certificate_add_show'])->name('certificate.show');
    Route::post('/certificate-add',[CertificateController::class,'certificate_add'])->name('certificate.add');

    Route::get('/certificate-delete/{certificateId}',[CertificateController::class,'certificate_delete'])->name('certificate.delete');

    Route::post('/certificate-update/{certificateId}',[CertificateController::class,'certificate_update'])->name('certificate.update');

    Route::post('/gallery-image-add',[GalleryController::class,'gallery_add'])->name('gallery.image.add');

    Route::post('/gallery-image-update/{imageId}',[GalleryController::class,'gallery_image_update'])->name('gallery.image.update');

    Route::get('/gallery-image-delete/{imageId}',[GalleryController::class,'gallery_image_delete'])->name('gallery.image.delete');


    Route::get('/aboutUs-update',[AboutUsController::class,'aboutUs'])->name('aboutUs');
    Route::put('/aboutUs-update',[AboutUsController::class,'aboutUs_update'])->name('aboutUs.update');

    Route::get('/contactUs-update',[ContactUsController::class,'contactUs'])->name('contactUs');
    Route::put('/contactUs-update',[ContactUsController::class,'contactUs_update'])->name('contactUs.update');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

        
    Route::get('/change-password',[AuthController::class,'show_change_password'])->name('show.change.password');
    Route::put('/change-password',[AuthController::class,'change_password'])->name('change.password');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login/check', [AuthController::class, 'checkLogin'])->name('login.check');



