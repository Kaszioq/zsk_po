<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('city_old', function(){
    return 'Miasto';
});

Route::get('city', function(){
    return view('welcome');
});

Route::get('city', function(){
    return view('city');
});

Route::get('info', function(){
    return view('info', ['firstName' => 'Janusz', 'lastName' => 'Nowak', 'city' => 'Poznan']);
});

Route::get('info_age/{age}', function($age){
    return view('info', ['firstName' => 'Janusz', 'lastName' => 'Nowak', 'city' => 'Poznan', 'age' => $age]);
});

Route::get('pages/{page}', function($page){

    $pages = [
        'home' => 'Strona główna',
        'contact' => 'jakis@mail',
        'about' => 'cos tam jeszcze'
    ];
    return $pages[$page];

});

Route::redirect('miasto', 'city');

//Route::redirect('/', 'city');

// Route::get('/address', function(){
//     echo "Miasto: ";
// });

// Route::get('/address1/{city}', function(string $city){
//     echo "Miasto: $city";
// });

// Route::get('/address2/{city}/{street}', function(string $city, string $street){
//     echo <<< ADDRESS
//     Miasto: $city <br>
//     Ulica: $street
//     ADDRESS;
// });

// Route::get('/address3/{city}/{street}/{zipCode}', function(string $city, string $street, int $zipCode){

//     $zipCode = substr($zipCode, 0, 2)."-".substr($zipCode, 2, 3);

//     echo <<< ADDRESS
//     Miasto: $city <br>
//     Ulica: $street <br>
//     Kod pocztowy: $zipCode
//     ADDRESS;
// });


Route::get('/address4/{city?}/{street?}/{zipCode?}', function(string $city = "-", string $street = "-", int $zipCode = null){

    if(is_null($zipCode)){
        $zipCode = "Brak danych";
    }
    else{
        $zipCode = substr($zipCode, 0, 2)."-".substr($zipCode, 2, 3);
    }

    echo <<< ADDRESS
    Miasto: $city <br>
    Ulica: $street <br>
    Kod pocztowy: $zipCode
    ADDRESS;
});

Route::get('/address5/{city?}/{street?}/{zipCode?}', function(string $city = "-", string $street = "-", int $zipCode = null){

    $zipCode = is_null($zipCode) ? "brak danych" :  $zipCode = substr($zipCode, 0, 2)."-".substr($zipCode, 2, 3);

    echo <<< ADDRESS
    Miasto: $city <br>
    Ulica: $street <br>
    Kod pocztowy: $zipCode
    ADDRESS;
})->name('address');

Route::redirect("adres/{city?}/{street?}/{zipCode?}", "/address5/{city?}/{street?}/{zipCode?}");