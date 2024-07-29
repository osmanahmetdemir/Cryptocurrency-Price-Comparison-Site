<?php

use App\Http\Controllers\CryptoPriceController;

Route::get('/scrape/crypto-data', [CryptoPriceController::class, 'scrapeCryptoData']);
