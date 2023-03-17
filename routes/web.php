<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('qrcode', function () {
    return QrCode::size(300)->generate('A basic example of QR code!');
});

Route::get('qrcode-with-color', function () {
    return \QrCode::size(300)
                    ->backgroundColor(255,55,0)
                    ->generate('A simple example of QR code');
});

Route::get('qrcode-with-image', function () {
    $image = \QrCode::format('png')
                    ->merge('public\eye.png', 0.5, true)
                    ->size(500)->errorCorrection('H')
                    ->generate('A simple example of QR code!');
 return response($image)->header('Content-type','public\eye.png');
});

Route::get('qrcode-with-special-data', function() {
    return \QrCode::size(500)
                ->email('kkinyua020@gmail.com', 'Welcome to kelvin The Tech-Guy!', 'Kindly reach me via +254768693035.. on WhatsApp.');
});

Route::get('qrcode-with-phonenumber', function () {
    return QrCode::phoneNumber('+2547-686-930-35');
});

Route::get('qrcode-with-textmessage', function () {
    return QrCode::SMS('+2547-686-930-35', 'Hello, its Kelvin(Vin Main) QR-Code Generator App 😁😁');
});