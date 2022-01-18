<?php

use Illuminate\Support\Facades\Route;
use App\Events\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ChatsController;
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



// Route::get('/', function () {
//     return view('index');
// });

Auth::routes();


// Route::get('/', function () {
//     [\App\Http\Controllers\HomeController::class, 'index'];
//     $id = dd((string) Auth::user()->id);
//     return view('index');
// })->name('index');

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/', [ChatsController::class, 'index']);
Route::get('messages', [App\Http\Controllers\ChatsController::class, 'fetchMessages']);
Route::post('messages', [App\Http\Controllers\ChatsController::class, 'sendMessage']);


// Route::get(
//     '/{any}',
//     function (\App\Models\User $user) {
//         return view('index', ['userId' => $user->id]);
//     }
// )->where('any', '.*');

// Route::get('user/{id}', function ($id) {
//     $id = Auth::user()->id;
//     return view('index');
// });

// Route::prefix('{userId}')->group(static function () {

//     Route::middleware('auth')->group(static function () {
//         if ('2' === '2')
//             Route::get('/', function () {
//                 return view('index');
//             })->where('userId', '2');
//     });
// });

Route::post('/send-message', function (Request $request) {
    event(new Message(
        $request->input('username'),
        $request->input('message'),
        $request->input('id'),
    ));

    return ["success" => true];
});
