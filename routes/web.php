<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SalesReportController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\CategoryController;
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