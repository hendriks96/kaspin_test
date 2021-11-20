<?php
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\AuthController;
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

// Route::get('/', function () {
//     return view('display.home-display');
// });

Route::get('/', [ItemsController::class, 'index'])->name('home');

Route::get('about-me', [ItemsController::class, 'aboutMe'])->name('about');

Route::get('login-page', [AuthController::class, 'loginPage'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('do-login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('do-register', [AuthController::class, 'doRegister'])->name('do-register');

Route::middleware(['admin'])->group(function () {
    Route::get('home-admin',  [ItemsController::class, 'indexAdmin'])->name('home-admin-display');

    Route::post('submit-items',  [ItemsController::class, 'submitItems'])->name('submit-items');
    Route::post('edit-items',  [ItemsController::class, 'editItems'])->name('edit-items');
    Route::get('delete-items/{id}',  [ItemsController::class, 'deleteItem']);
});

Route::middleware(['staff'])->group(function () {
    Route::get('home-staff',  [ItemsController::class, 'indexStaff'])->name('home-staff-display');

    Route::post('submit-items-staff',  [ItemsController::class, 'submitItems'])->name('submit-items-staff');
    Route::post('edit-items-staff',  [ItemsController::class, 'editItems'])->name('edit-items-staff');
});

Route::get('insert', function () {
    $stuRef = app('firebase.firestore')->database()->collection('User')->newDocument();
    $stuRef->set([
		'firstname' => 'Seven',
		'lastname' => 'Stac',
		'age'    => 19
    ]);
    dd($stuRef->id());
    $db = app('firebase.firestore')->database();
    // $db->collection('User')->id();

    $documents = $db->collection('User')->documents();
    foreach ($documents as $document) {
        if ($document->exists()) {
            printf('Document data for document %s:' . PHP_EOL, $document->id());
            print_r($document->data());
            printf(PHP_EOL);
        } else {
            // printf('Document %s does not exist!' . PHP_EOL, $snapshot->id());
        }
    }
    die();
    $stuRef = app('firebase.firestore')->database()->collection('User')->newDocument();
    dd($stuRef->getReference());
    $stuRef->set([
		'firstname' => 'Seven',
		'lastname' => 'Stac',
		'age'    => 19
    ]);
    dd("success");
    
});