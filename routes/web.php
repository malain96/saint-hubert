 <?php

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

//Home route
Route::get('/home', 'HomeController@index')->name('home');

//Hunters routes
Route::get('/hunters','HuntersController@index')->name('hunters');
Route::get('/hunters/create','HuntersController@create')->name('addHunter');
Route::post('/hunters', 'HuntersController@store')->name('storeHunter');;
Route::get('/hunters/{hunter}/edit','HuntersController@edit')->name('editHunter');
Route::patch('/hunters/{hunter}', 'HuntersController@patch')->name('patchHunter');
Route::get('/hunters/{hunter}/delete', ['uses' => 'HuntersController@deleteConfirm','middleware' => 'admin'])->name('deleteConfirmHunter');
Route::delete('/hunters/{hunter}', ['uses' => 'HuntersController@delete','middleware' => 'admin'])->name('deleteHunter');
Route::get('/hunters/{hunter}','HuntersController@show')->name('showHunter');

//lessors routes
Route::get('/lessors','LessorsController@index')->name('lessors');
Route::get('/lessors/create','LessorsController@create')->name('addLessor');
Route::post('/lessors', 'LessorsController@store')->name('storeLessor');
Route::get('/lessors/{lessor}/edit','LessorsController@edit')->name('editLessor');
Route::patch('/lessors/{lessor}', 'LessorsController@patch')->name('patchLessor');
Route::get('/lessors/{lessor}/delete', ['uses' => 'LessorsController@deleteConfirm','middleware' => 'admin'])->name('deleteConfirmLessor');
Route::delete('/lessors/{lessor}', ['uses' => 'LessorsController@delete','middleware' => 'admin'])->name('deleteLessor');
Route::get('/lessors/{lessor}','LessorsController@show')->name('showLessor');

//Documents routes
Route::get('/documents','DocumentsController@index')->name('documents');
Route::get('/documents/huntersEtiquettesSelection','DocumentsController@huntersEtiquettesSelection')->name('huntersEtiquettesSelection');
Route::get('/documents/huntersEtiquettes','DocumentsController@huntersEtiquettes')->name('huntersEtiquettes');
Route::get('/documents/huntersSelectedEtiquettes','DocumentsController@huntersSelectedEtiquettes')->name('huntersSelectedEtiquettes');
Route::get('/documents/huntersList','DocumentsController@huntersList')->name('huntersList');
Route::get('/documents/huntersAttendanceList','DocumentsController@huntersAttendanceList')->name('huntersAttendanceList');
Route::get('/documents/wineBoxesList','DocumentsController@wineBoxesList')->name('wineBoxesList');
Route::get('/documents/lessorsList','DocumentsController@lessorsList')->name('lessorsList');
Route::get('/documents/lessorsEtiquettesSelection','DocumentsController@lessorsEtiquettesSelection')->name('lessorsEtiquettesSelection');
Route::get('/documents/lessorsEtiquettes','DocumentsController@lessorsEtiquettes')->name('lessorsEtiquettes');
Route::get('/documents/lessorsSelectedEtiquettes','DocumentsController@lessorsSelectedEtiquettes')->name('lessorsSelectedEtiquettes');

//login routes
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');

//Logout route
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

//Register routes
Route::get('register', ['uses' => 'Auth\RegisterController@index','middleware' => 'admin'])->name('register');
Route::post('register',['uses' => 'Auth\RegisterController@create','middleware' => 'admin']);

//Pasword routes
Route::get('password','Auth\PasswordController@index')->name('password');
Route::patch('password','Auth\PasswordController@patch');

//Errors routes
Route::get('/error404','ErrorsController@error404')->name('error404');
Route::get('/errors','ErrorsController@errors')->name('errors');
