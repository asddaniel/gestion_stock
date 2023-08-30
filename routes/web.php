<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ApprovisionnementController;
use App\Http\Controllers\VenteController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LigneVenteController;
use App\Http\Controllers\PayementController;
use App\Http\Controllers\AdminController;

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

// Route::get('/', function () {
//     return view('index');
// });


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get("/", [MainController::class, "home"])->name("home");
Route::get("/produits", [ProduitController::class, "index"])->name("produit.home");



Route::get("/ventes", [VenteController::class, 'index'])->name("vente.index");
Route::post("/ventes", [VenteController::class, 'store'])->name("vente.store");
Route::delete("/ventes/{Vente}", [VenteController::class, 'destroy'])->name("vente.destroy");
Route::get("/ventes/{Vente}", [VenteController::class, 'show'])->name("vente.show");
Route::get("/ventes/{Vente}/payer", [VenteController::class, 'payer'])->name("vente.payer");
Route::get("/clients", [ClientController::class, 'index'])->name('client.index');
Route::post("/clients", [ClientController::class, 'store'])->name('client.store');
Route::delete("/clients/{Client}", [ClientController::class, 'destroy'])->name('client.destroy');
Route::get("/clients/{Client}", [ClientController::class, 'show'])->name('client.show');
Route::delete("/ligneVente/{Ligne_vente}", [LigneVenteController::class, 'destroy'])->name('lignevente.destroy');
Route::post("/lignevente", [LigneVenteController::class, 'store'])->name('lignevente.store');
Route::post("/payement", [PayementController::class, 'store'])->name("payement.store");




//admin routes
Route::middleware('admin')->group(function () {
    Route::get("/produits/{Produit}", [ProduitController::class, "edit"])->name("produit.edit");
    Route::post("/produits", [ProduitController::class, "store"])->name("produit.store");
    Route::get("/produits/{Produit}/delete", [ProduitController::class, "destroy"])->name("produit.delete");
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/admin/update_statut', [AdminController::class, 'update_statut'])->name('admin.update_statut');
    Route::put("/produits/{Produit}", [ProduitController::class, "update"])->name("produit.update");
Route::get("/approvisionnements", [ApprovisionnementController::class, "index"])->name("approvisionnement.index");
Route::post("/approvisionnements", [ApprovisionnementController::class, "store"])->name("approvisionnement.store");

});


});

require __DIR__.'/auth.php';
