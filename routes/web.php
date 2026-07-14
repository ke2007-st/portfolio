<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

Route::get('/', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::post('/contact', [PortfolioController::class, 'storeMessage'])->name('portfolio.contact');

Route::get('/blog', [PortfolioController::class, 'blogIndex'])->name('portfolio.blog');
Route::get('/blog/{slug}', [PortfolioController::class, 'showPost'])->name('portfolio.post');
