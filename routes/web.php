<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\ArticlesTutorialController;
use App\Http\Controllers\Admin\VideoTutorialsController;
use App\Http\Controllers\Admin\SoftwareController;
use App\Http\Controllers\Admin\DesignsController;
use App\Http\Controllers\TutorialController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Admin\User\AboutController;
use App\Http\Controllers\Admin\User\TeamController;
use App\Http\Controllers\Admin\User\FeedbackController;


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
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/tutorials/article', [TutorialController::class, 'article_index'])->name('tutorials.article');
Route::get('/tutorials/article/{id}', [TutorialController::class, 'article_view', 'id'])->name('tutorials.view');

Route::get('/tutorials/video', [TutorialController::class, 'video_index'])->name('tutorials.video');


Route::group(['middleware' => 'auth', 'middleware' => 'verified'], function () {

    Route::get('/services/softwares', [ServiceController::class, 'softwares'])->name('services.softwares');
    Route::get('/services/designs', [ServiceController::class, 'designs'])->name('services.designs');

    Route::post('/tutorials/article/comment/store', [TutorialController::class, 'comment_store'])->name('article.comment.store');

    Route::post('/feedback/create', [FeedbackController::class, 'store'])->name('feedback.store');
});



/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', [AuthenticatedSessionController::class, 'create'])->name('admin.login')->middleware('guest:admin');
Route::post('/admin/login/store', [AuthenticatedSessionController::class, 'store'])->name('admin.login.store');

Route::group(['middleware' => 'admin'], function () {

    Route::get('/admin', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');

    Route::get('/admin/password/change', [HomeController::class, 'password_change'])->name('admin.password.change');
    Route::post('/admin/password/update', [HomeController::class, 'password_update'])->name('admin.password.update');

    Route::resource('admin/category', CategoryController::class);
    Route::resource('admin/subcategory', SubcategoryController::class);

    Route::resource('admin/tutorials/articles', ArticlesTutorialController::class);
    Route::resource('admin/tutorials/videos', VideoTutorialsController::class);

    Route::resource('admin/softwares', SoftwareController::class);
    Route::resource('admin/designs', DesignsController::class);

    Route::resource('admin/about', AboutController::class);
    Route::resource('admin/team', TeamController::class);

    Route::get('admin/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
    Route::delete('admin/destroy/{id}', [FeedbackController::class, 'destroy'])->name('feedback.destroy');
});
