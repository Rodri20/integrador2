<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SalesReportController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Models\Product;

Route::get('/', function () {
    return view('welcome');
});

// Rutas de autenticación
Auth::routes();

// Ruta de inicio
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/nosotros', function() {
    return view('pages.nosotros');
})->name('nosotros');


Route::get('/nuestro_equipo', function() {
    return view('pages.equipo');
})->name('nuestro_equipo');


Route::get('/contacto', function() {
    return view('pages.contacto');
})->name('contacto');

Route::get('/testimonios', function() {
    return view('pages.testimonial');
})->name('testimonios');

Route::get('/servicios', function() {
    return view('pages.servicios');
})->name('servicios');

Route::get('/reservas', function() {
    return view('pages.booking');
})->name('reservas');

Route::get('/menu', function() {
    return view('pages.menu');
})->name('menu');

Route::get('/menu', [ProductController::class, 'menu'])->name('menu');



Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::post('/cart/checkout', [CartController::class, 'processCheckout'])->name('cart.processCheckout');



Route::get('/products/{product}', [ProductController::class, 'showCliente'])->name('products.show');
Route::get('/menu', [ProductController::class, 'menu'])->name('pages.menu');

Route::post('/payment/process', [PaymentController::class, 'process'])->name('payment.process');


Route::post('/payment', [PaymentController::class, 'process'])->name('payment.process');
Route::get('/order/confirmation/{order}', [OrderController::class, 'confirmation'])->name('order.confirmation');

Route::get('order/{order}', [OrderController::class, 'show'])->name('order.show');
Route::get('order/{order}', [OrderController::class, 'show'])->name('order.show');


// Rutas para administradores
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Rutas para la gestión de productos
    Route::resource('products', ProductController::class)->names([
        'index' => 'admin.products.index',
        'create' => 'admin.products.create',
        'store' => 'admin.products.store',
        'edit' => 'admin.products.edit',
        'update' => 'admin.products.update',
        'destroy' => 'admin.products.destroy',
        'show' =>'admin.products.show',
    ]);

    Route::resource('categories', CategoryController::class)->names([
        'index' => 'admin.categories.index',
        'create' => 'admin.categories.create',
        'store' => 'admin.categories.store',
        'edit' => 'admin.categories.edit',
        'update' => 'admin.categories.update',
        'destroy' => 'admin.categories.destroy',
    ]);
    
        // Rutas para la gestión de pedidos
        Route::resource('orders', OrderController::class)->only(['index', 'show', 'destroy'])->names([
            'index' => 'admin.orders.index',
            'show' => 'admin.orders.show',
            'destroy' => 'admin.orders.destroy',
        ]);

        Route::post('orders/{order}/update-status', [OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
    
           // Rutas para la gestión de clientes
    Route::resource('customers', CustomerController::class)->only(['index', 'show', 'destroy'])->names([
        'index' => 'admin.customers.index',
        'show' => 'admin.customers.show',
        'destroy' => 'admin.customers.destroy',
    ]);

    Route::get('reports/sales', [SalesReportController::class, 'index'])->name('admin.reports.sales');

        // Rutas para la gestión de promociones
        Route::resource('promotions', PromotionController::class)->names([
            'index' => 'admin.promotions.index',
            'create' => 'admin.promotions.create',
            'store' => 'admin.promotions.store',
            'edit' => 'admin.promotions.edit',
            'update' => 'admin.promotions.update',
            'destroy' => 'admin.promotions.destroy',
        ]);

});


// Rutas para clientes
Route::middleware(['auth', 'cliente'])->prefix('cliente')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\ClienteController::class, 'dashboard'])->name('cliente.dashboard');
    // Otras rutas de cliente...
});