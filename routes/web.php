<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

Route::prefix('produto') -> group(function () {
  Route::get('/', [ProdutoController::class, 'index']) -> name('produto.index');
  Route::get('/create', [ProdutoController::class, 'create']) -> name('produto.create');
  Route::post('/store', [ProdutoController::class, 'store']) -> name('produto.store');
  Route::get('/show/{produto}', [ProdutoController::class, 'show']) -> name('produto.show');
  Route::get('/edit/{produto}', [ProdutoController::class,'edit']) -> name('produto.edit');
  Route::put('/update/{produto}', [ProdutoController::class,'update']) -> name('produto.update');
  Route::delete('/destroy/{produto}', [ProdutoController::class,'destroy']) -> name('produto.destroy');
});
