<?php

use Libs\Router;

/******************************Note***********************************/

Router::get("/new", "Controllers\Notita::form")->middleware('Middlewares\User::check');

//nueva nota
Router::post("/new", "Controllers\Notita::add")
     ->middleware('Middlewares\User::check');
     
// ver nota
Router::get("/note/{id}", "Controllers\Notita::view")
    ->middleware('Middlewares\User::verifyOwner')
    ->middleware('Middlewares\User::check');
    
// ver todas las notas
Router::get("/all", "Controllers\Notita::all")
    ->middleware('Middlewares\User::check');

// eliminar nota
Router::get("/note/{id}/remove", "Controllers\Notita::delete")
    ->middleware('Middlewares\User::verifyOwner')
    ->middleware('Middlewares\User::check');

// editar nota
Router::get("/note/{id}/edit", "Controllers\Notita::editing")
    ->middleware('Middlewares\User::verifyOwner')
    ->middleware('Middlewares\User::check');

// guardar nota editada
Router::post("/note/{id}/update", "Controllers\Notita::update")
    ->middleware('Middlewares\User::verifyOwner')
    ->middleware('Middlewares\User::check');

/******************************User***********************************/
// nuevo user
Router::get("/register", "Controllers\User::UserRegister");
Router::post("/register", "Controllers\User::AddUser");

// login
Router::get("/login", "Controllers\User::UserLogin");
Router::post("/login", "Controllers\User::Login");//confirmar logueo

// cargar el panel
Router::get("/panel", "Controllers\User::panelAdmin")
    ->middleware('Middlewares\User::check');
    
// eliminar un usuario
Router::get("/user/{id}/remove", "Controllers\User::deleteUser")
    ->middleware('Middlewares\User::check');

// ver todas los usuarios
Router::get("/panel-users", "Controllers\User::allUsers")
    ->middleware('Middlewares\User::check');
    
// ver todas las notas
Router::get("/panel-notes", "Controllers\User::allNotes")
    ->middleware('Middlewares\User::check');

// editar usuario
Router::get("/user/{id}/edit", "Controllers\User::editUsers")
    ->middleware('Middlewares\User::check');

// enlace del search
Router::post("/search-for", "Controllers\Notita::searching")
    ->middleware('Middlewares\User::check');


// Adtualizar usuario

Router::post("/user/{id}/update", "Controllers\User::updateUser")
    ->middleware('Middlewares\User::check');


