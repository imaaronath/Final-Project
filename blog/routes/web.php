<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/login',function(){
  return view('login');
});
Route::get('/index',function(){
  return view('index');
});

Route::get('/edit',function(){
  return view('edit');
});

Route::get('/create',function(){
  return view('create');
});

Route::get('/homesignin',function(){
  return view('homesignin');
});
