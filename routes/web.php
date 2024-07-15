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

// Página de bienvenida
Route::get('/', function () {
    $products = App\Models\Product::all();
    $categories = App\Models\Category::all();
    return view('welcome', compact('products', 'categories'));
})->name('home');

// Rutas de autenticación
Auth::routes();

// Páginas estáticas
Route::view('/nosotros', 'pages.nosotros')->name('nosotros');
Route::view('/nuestro_equipo', 'pages.equipo')->name('nuestro_equipo');
Route::view('/contacto', 'pages.contacto')->name('contacto');
Route::view('/testimonios', 'pages.testimonial')->name('testimonios');
Route::view('/servicios', 'pages.servicios')->name('servicios');
Route::view('/reservas', 'pages.booking')->name('reservas');

// Menú
Route::get('/menu', [ProductController::class, 'menu'])->name('menu');

// Rutas para el carrito
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::post('/cart/checkout', [CartController::class, 'processCheckout'])->name('cart.processCheckout');

// Productos
Route::get('/products/{product}', [ProductController::class, 'showCliente'])->name('products.show');

// Pago
Route::post('/payment/process', [PaymentController::class, 'process'])->name('payment.process');

// Rutas para administradores
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Gestión de productos
    Route::resource('products', ProductController::class)->names([
        'index' => 'admin.products.index',
        'create' => 'admin.products.create',
        'store' => 'admin.products.store',
        'edit' => 'admin.products.edit',
        'update' => 'admin.products.update',
        'destroy' => 'admin.products.destroy',
        'show' => 'admin.products.show',
    ]);

    // Gestión de categorías
    Route::resource('categories', CategoryController::class)->names([
        'index' => 'admin.categories.index',
        'create' => 'admin.categories.create',
        'store' => 'admin.categories.store',
        'edit' => 'admin.categories.edit',
        'update' => 'admin.categories.update',
        'destroy' => 'admin.categories.destroy',
    ]);
    
    // Gestión de pedidos
    Route::resource('orders', OrderController::class)->only(['index', 'show', 'destroy'])->names([
        'index' => 'admin.orders.index',
        'show' => 'admin.orders.show',
        'destroy' => 'admin.orders.destroy',
    ]);
    Route::post('orders/{order}/update-status', [OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
    
    // Gestión de clientes
    Route::resource('customers', CustomerController::class)->only(['index', 'show', 'destroy'])->names([
        'index' => 'admin.customers.index',
        'show' => 'admin.customers.show',
        'destroy' => 'admin.customers.destroy',
    ]);

    // Reportes de ventas
    Route::get('reports/sales', [SalesReportController::class, 'index'])->name('admin.reports.sales');

    // Gestión de promociones
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
