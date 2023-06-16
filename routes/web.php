<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ApprovisionnementController;
use App\Http\Controllers\VenteController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LigneVenteController;

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
Route::get("/", [MainController::class, "home"])->name("home");
Route::get("/produits", [ProduitController::class, "index"])->name("produit.home");
Route::post("/produits", [ProduitController::class, "store"])->name("produit.store");
Route::get("/produits/{Produit}/delete", [ProduitController::class, "destroy"])->name("produit.delete");
Route::get("/produits/{Produit}", [ProduitController::class, "edit"])->name("produit.edit");
Route::put("/produits/{Produit}", [ProduitController::class, "update"])->name("produit.update");
Route::get("/approvisionnements", [ApprovisionnementController::class, "index"])->name("approvisionnement.index");
Route::post("/approvisionnements", [ApprovisionnementController::class, "store"])->name("approvisionnement.store");
Route::get("/ventes", [VenteController::class, 'index'])->name("vente.index");
Route::post("/ventes", [VenteController::class, 'store'])->name("vente.store");
Route::delete("/ventes/{Vente}", [VenteController::class, 'destroy'])->name("vente.destroy");
Route::get("/ventes/{Vente}", [VenteController::class, 'show'])->name("vente.show");
Route::get("/clients", [ClientController::class, 'index'])->name('client.index');
Route::post("/clients", [ClientController::class, 'store'])->name('client.store');
Route::delete("/clients/{Client}", [ClientController::class, 'destroy'])->name('client.destroy');
Route::delete("/ligneVente/{Ligne_vente}", [LigneVenteController::class, 'destroy'])->name('lignevente.destroy');
Route::post("/lignevente", [LigneVenteController::class, 'store'])->name('lignevente.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
