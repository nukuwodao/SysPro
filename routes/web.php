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

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('dashboard');
})->name('home');

Route::get('/contest', function(){
    return view('contest-all');
});

Route::get('/practice/top', function(){
   return view('practice');
});
Route::get('/practice/submit', function(){
    return view('practice.practice-submit');
});
Route::get('/practice/code-test', function(){
    return view('practice.practice-codetest');
});
Route::get('/practice/submit', function(){
   return view('practice.practice-submit');
});
Route::get('/practice/result', function() {
    return view('practice.practice-result');
});
Route::get('/practice/top',function() {
   return view('practice.practice-top');
});
Route::get('/practice/problem',function (){
    return view('practice.practice-problem');
});
Route::get('/practice/problem-A',function (){
    return view('practice.practice-problem-A');
});

Route::get('/notice', function(){
    return view('notice');
});


Route::get('/spc001/problem','spc001Controller@problem');
Route::get('/spc001/problem-A', 'spc001Controller@problemA');
Route::get('/spc001/problem-B', 'spc001Controller@problemB');
Route::get('/spc001/problem-C', 'spc001Controller@problemC');
Route::get('/spc001/problem-D', 'spc001Controller@problemD');
Route::get('/spc001/problem-E', 'spc001Controller@problemE');
Route::get('/spc001/submit', 'spc001Controller@submit');
Route::get('/spc001/code-test','spc001_codetestController@submit');
ROute::get('/spc001/top', 'spc001_topController@run');
Route::get('/spc001/ranking', 'spc001_rankingController@run');
Route::get('/spc001/result', 'spc001ResultController@run');

Route::get('/test', 'CodetestController@run');
Route::get('/submit-send', 'PracticeSubmitController@run');
Route::get('/database-access', 'databaseController@run');
