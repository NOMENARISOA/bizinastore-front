<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
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


Route::get('/', [App\Http\Controllers\OtherController::class, 'welcome'])->name('home');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// VISITEUR
Route::get('/users/create', [App\Http\Controllers\UsersController::class, 'create'])->name('users.create');
Route::post('/users/store', [App\Http\Controllers\UsersController::class, 'store'])->name('users.store');
Route::get('/users/home', [App\Http\Controllers\UsersController::class, 'home'])->name('users.home')->middleware('auth');
Route::get('/users/favoris', [App\Http\Controllers\UsersController::class, 'favoris'])->name('users.favoris')->middleware('auth');
Route::get('/users/historique', [App\Http\Controllers\UsersController::class, 'historique'])->name('users.historique')->middleware('auth');
Route::get('/users/parametre', [App\Http\Controllers\UsersController::class, 'parametre'])->name('users.parametre')->middleware('auth');
Route::get('/users/message', [App\Http\Controllers\UsersController::class, 'message'])->name('users.message')->middleware('auth');
Route::post('/users/parametre/user/update', [App\Http\Controllers\UsersController::class, 'update'])->name('users.update')->middleware('auth');
Route::post('/users/parametre/user/password', [App\Http\Controllers\UsersController::class, 'password'])->name('users.password')->middleware('auth');
Route::post('/users/send/message', [App\Http\Controllers\UsersController::class, 'send_message'])->name('users.send.message')->middleware('auth');
Route::get('/users/{id}}/markfavoris', [App\Http\Controllers\UsersController::class, 'mark_favorie'])->name('users.mark.favorie')->middleware('auth');

// ANNONCEUR

Route::get('/users/backoffice/annonce/home', [App\Http\Controllers\UsersController::class, 'backoffice_annonce'])->name('user.backoffice.annonce')->middleware('auth');
Route::get('/users/backoffice/annonce/changer_etat/{id}/type/{type}', [App\Http\Controllers\UsersController::class, 'changer_etat'])->name('annonce.changetat')->middleware('auth');
Route::get('/users/backoffice/annonce/supprimer/{id}/annonce', [App\Http\Controllers\UsersController::class, 'destroy_annonce'])->name('annonce.destroy')->middleware('auth');
Route::post('/users/backoffice/annonce/update', [App\Http\Controllers\UsersController::class, 'update'])->name('annonce.update')->middleware('auth');

//ANNONCE
Route::get('/annonce/create', [App\Http\Controllers\AnnonceController::class, 'create'])->name('annonce.create')->middleware('auth');
Route::post('/annonce/store', [App\Http\Controllers\AnnonceController::class, 'store'])->name('annonce.store')->middleware('auth');
Route::get('/annonce/search', [App\Http\Controllers\AnnonceController::class, 'search'])->name('annonce.search');
Route::post('/annonce/search', [App\Http\Controllers\AnnonceController::class, 'search_post'])->name('annonce.search.post');
Route::get('/annonce/{id}/show', [App\Http\Controllers\AnnonceController::class, 'show'])->name('annonce.show');
Route::post('/annonce/signaler', [App\Http\Controllers\AnnonceController::class, 'signaler'])->name('annonce.signaler');
Route::post('/annonce/payante', [App\Http\Controllers\AnnonceController::class, 'payante'])->name('annonce.payant');
Route::get('/annonce/payante/process/{id}', [App\Http\Controllers\AnnonceController::class, 'payante_process'])->name('annonce.payant.process');
Route::post('/annonce/payante/process/vanillapay', [App\Http\Controllers\AnnonceController::class, 'vanillapay'])->name('annonce.payant.vanillapay');
//PAGE PRINCIPALES
Route::get('/apropos', [App\Http\Controllers\OtherController::class, 'about'])->name('about');
Route::get('/aide', [App\Http\Controllers\OtherController::class, 'aide'])->name('aide');
Route::get('/mention_legales', [App\Http\Controllers\OtherController::class, 'mention'])->name('mention');
Route::get('/cgv', [App\Http\Controllers\OtherController::class, 'cgv'])->name('cgv');
Route::get('/cgu', [App\Http\Controllers\OtherController::class, 'cgu'])->name('cgu');
Route::get('/vie_privee_et_cookies', [App\Http\Controllers\OtherController::class, 'vie'])->name('vie');
Route::get('/localisation', [App\Http\Controllers\OtherController::class, 'localisation'])->name('localisation');
Route::get('/contact', [App\Http\Controllers\OtherController::class, 'contact'])->name('contact');
Route::post('/contact/store', [App\Http\Controllers\OtherController::class, 'contact_store'])->name('contact.store');
//FORUM
Route::get('/forum/index', [App\Http\Controllers\ForumController::class, 'index'])->name('forum.index');
Route::get('/forum/show/{id}', [App\Http\Controllers\ForumController::class, 'show'])->name('forum.show');
Route::get('/forum/create', [App\Http\Controllers\ForumController::class, 'create'])->name('forum.create');
Route::post('/forum/store', [App\Http\Controllers\ForumController::class, 'store'])->name('forum.store')->middleware('authtwoUser');
Route::post('/forum/commentaire', [App\Http\Controllers\ForumController::class, 'commentaire'])->name('forum.commentaire')->middleware('authtwoUser');


Route::get("redirect/{provider}",[App\Http\Controllers\SocialiteController::class, 'redirect'] )->name('socialite.redirect');

// Le callback du provider
Route::get("callback/{provider}", [App\Http\Controllers\SocialiteController::class, 'callback'])->name('socialite.callback');
// Voir file
Route::get('/{directory}/{filename}', function ($directory,$filename)
{
    $path = public_path('storage/' .$directory.'/'. $filename);
    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    dd($response);
    return $response->download;
})->name('file.open');

//API
Route::get("api/subcategory/{category}", [App\Http\Controllers\APIController::class, 'getSubCategory'])->name('api.subcategory');
Route::get("api/autocomplete/search", [App\Http\Controllers\APIController::class, 'autocompleteSearch'])->name('api.autocompleteSearch');
