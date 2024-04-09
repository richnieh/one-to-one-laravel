<?php

use App\Models\Address;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/insert', function(){
    $user = User::findOrFail(3);

    $address = new Address(['name'=>'9 charles street']);
    $user->address()->save($address);
});

Route::get('insertUser', function(){
    return User::create(['name'=>'Rach','email'=>'rach@mail.com','password'=>123]);
});

Route::get('updateAddress', function(){
    $address = Address::whereUserId(1)->first();
    $address->name = '21 oswald close';
    $address->save();
});

Route::get('readAddress/{id}', function($id){
    return User::findOrFail($id)->address->name;
});

Route::get('deleteAddress', function(){
    return Address::findOrFail(3)->delete();
});
