<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    $todos = session('todos', []);
    return view('todos', ['todos' => $todos]);
})->name('todos.index');

Route::post('/add', function (Request $request) {
    $request->validate(['title' => 'required']);

    $todos = session('todos', []);
    $todos[] = ['title' => $request->title];
    session(['todos' => $todos]);

    return redirect()->route('todos.index');
})->name('todos.add');

Route::post('/edit/{id}', function (Request $request, $id) {
    $request->validate(['title' => 'required']);

    $todos = session('todos', []);
    if (isset($todos[$id])) {
        $todos[$id]['title'] = $request->title;
        session(['todos' => $todos]);
    }
    return redirect()->route('todos.index');
})->name('todos.edit');

Route::get('/delete/{id}', function ($id) {
    $todos = session('todos', []);
    if (isset($todos[$id])) {
        unset($todos[$id]);
        session(['todos' => array_values($todos)]);
    }
    return redirect()->route('todos.index');
})->name('todos.delete');
