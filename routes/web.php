<?php

use App\Http\Controllers\Auth\RegisterController;
// use App\Http\Controllers\RegisterController;

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DataekskulController;
use App\Http\Controllers\DataeventController;
use App\Http\Controllers\DatalatihanController;
use App\Http\Controllers\DatapembinaController;
use App\Http\Controllers\DatasiswaController;
use App\Http\Controllers\DataprestasiController;
use App\Http\Controllers\MyekskulController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DaftarekskulController;
use App\Http\Controllers\ManageuserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Auth;
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
    return view('frontend');
});
// Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::get('/registering', [RegisterController::class, 'showRegistrationForm'])->name('registering');

Route::post('/register/store', [RegisterController::class, 'store'])->name('register.store');



// // Rute untuk menampilkan halaman registrasi
// Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');

// // Rute untuk mengelola proses registrasi
// Route::post('register', [RegisterController::class, 'register']);

   // Route::resource('/frontend', FrontendController::class);
Route::get('/', [FrontendController::class, 'index']);
Route::get('/show/{id}', [FrontendController::class, 'show']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::middleware(['auth', 'ceklevel:Administrator,Siswa,Pembina'])->group(function () {
    Route::resource('/dataevent', DataeventController::class);
    // Route::get('/print/{id}',[DataeventController::class],'print')->name('print');
    Route::get('/print/{id}', [DataeventController::class, 'print'])->name('dataevent.print');

    Route::resource('/dataprestasi', DataprestasiController::class);
    Route::resource('/datalatihan', DatalatihanController::class);

    // ---------------Route Export Import Excel Data Event-------------------//
    Route::get('/exportevent', [DataeventController::class, 'EventExport'])->name('exportevent');

    // ---------------Manage Profil-------------------//
    Route::get('/user/profile/{id}', [HomeController::class, 'userProfile'])->name('user.profile');
    Route::get('/user/profile/edit/{id}',[HomeController::class, 'editUserProfile'])->name('user.profile.edit');
    Route::put('/user/profile/update/{id}',[HomeController::class, 'updateUserProfile'])->name('user.profile.update');

    // ---------------Route Laporan-------------------//
    Route::get('laporan/index', [LaporanController::class, 'index'])->name('laporan.index');
    Route::post('laporan/select', [LaporanController::class, 'getData'])->name('laporan.select');
});

Route::middleware(['auth', 'ceklevel:Administrator,Pembina'])->group(function () {
    Route::resource('/dataekskul', DataekskulController::class);
    Route::post('/dataekskul/store', [DataekskulController::class,'store'])->name('ekskul-simpan');
    Route::resource('/datapembina', DatapembinaController::class);
    Route::post('/datapembina/store', [DatapembinaController::class, 'store'])->name('datapembina-simpan');
    Route::get('/absensi', [AbsensiController::class, 'showAbsensi']);
    Route::resource('absensi', AbsensiController::class);
    Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi');
    // Route::get('/absensi/create', [AbsensiController::class, 'create'])->name('absensi.create');
    // Route::post('/absensi/store', [AbsensiController::class, 'store'])->name('absensi.store');
    // Route::get('/absensi/{id}/edit', [AbsensiController::class, 'edit'])->name('absensi.edit');
    // Route::put('/absensi/{id}/update', [AbsensiController::class, 'update'])->name('absensi.update');
    // Route::delete('/absensi/{id}/destroy', [AbsensiController::class, 'destroy'])->name('absensi.destroy');
    Route::get('absensi/{id}', [AbsensiController::class, 'show'])->name('absensi.show');
    Route::get('absensi/create/{id}', [AbsensiController::class, 'create'])->name('absensi.create');
    Route::post('/submit-absensi', [AbsensiController::class, 'store'])->name('submit-absensi');
    Route::resource('/datasiswa', DatasiswaController::class);
    Route::post('/datasiswa/store', [DatasiswaController::class, 'store'])->name('datasiswa-simpan');

});
//--------------Route Siswa dan Admin Ekskul--------------//
Route::middleware(['auth', 'ceklevel:Siswa,Administrator'])->group(function () {
    Route::resource('/myekskul', MyekskulController::class);

    //----------Route Siswa
    Route::middleware(['auth', 'ceklevel:Siswa'])->group(function () {
    Route::resource('/daftarekskul', DaftarekskulController::class);
    Route::post('/daftarekskul/store', [DaftarekskulController::class, 'store'])->name('daftarekskul-simpan');
    Route::get('/daftarekskul/create', [DaftarekskulController::class, 'create'])->name('daftarekskul.create');
Route::post('/daftarekskul', [DaftarekskulController::class, 'store'])->name('daftarekskul.store');

    });
    // ---------------Manage User-------------------//
    Route::get('/manageuser', [ManageuserController::class, 'index'])->name('usermanage.index');
    Route::get('/manageuser/create', [ManageuserController::class, 'create'])->name('usermanage.create');
    Route::post('/manageuser/store', [ManageuserController::class, 'store'])->name('usermanage.store');
    Route::get('/manageuser/edit/{id}', [ManageuserController::class, 'edit'])->name('usermanageEdit');
    Route::put('/manageuser/update/{id}', [ManageuserController::class, 'update'])->name('usermanage.update');
    Route::get('/manageuser/delete/{id}', [ManageuserController::class, 'destroy'])->name('usermanage.destroy');


    Route::put('/datasiswa/update-validasi/{id}', 'DaftarEkskulController@updateValidasi')->name('datasiswa.update.validasi');

    // Rute untuk halaman index absensi




// });

//  Route::middleware(['auth', 'CekLevel:Siswa'])->group(function () {
//     Route::get('/exportevent', [DataeventController::class, 'EventExport'])->name('exportevent');


// Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::post('register', [RegisterController::class, 'register']);

});
