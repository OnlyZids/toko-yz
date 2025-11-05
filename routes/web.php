<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Route::get('/', function () {
//     return view('welcome');
// });

// Halaman Beranda 
Route::get('/', function () { 
    return view('beranda'); 
})->name('beranda'); 

// Halaman Login 
Route::get('/login', function () { 
    return view('login'); 
})->name('login'); 
 
// Proses Login 
Route::post('/login', function (Request $request) { 
    $username = $request->input('username'); 
    $password = $request->input('password'); 
 
    if ($username === 'Yazid' && $password === '12345') { 
        return redirect()->route('produk'); 
    } else { 
        return back()->with('error', 'Username atau Password salah!'); 
    } 
})->name('login.process'); 
 
// Halaman Produk Penjualan 
Route::get('/produk', function () { 
    $produk = [ 
        ['id' => 1, 'nama' => 'Acer Nitro ', 'harga' => 'Rp 18.500.000', 'foto' => 'images/acern.png', 'deskripsi' => 'Acer Nitro dengan prosesor Intel i9 dan RAM 16GB.'], 
        ['id' => 2, 'nama' => 'ASUS ROG ', 'harga' => 'Rp 30.500.000', 'foto' => 'images/ro.jpeg', 'deskripsi' => 'Strix G16 (2023) i9-13980HX 24-Core Gaming Laptop'], 
        ['id' => 3, 'nama' => 'Lenovo LOQ ', 'harga' => 'Rp 12.590.000', 'foto' => 'images/log.jpeg', 'deskripsi' => '15IAX9I Review_ Basic PC Gaming on the Budget'], 
        ['id' => 4, 'nama' => 'Asus Tuf ', 'harga' => 'Rp 12.590.000', 'foto' => 'images/tuf.jpg', 'deskripsi' => 'Bertenaga Intel Core i7-13620H dan RTX 3050 '], 
        ['id' => 5, 'nama' => 'Axioo Pongo 735 ', 'harga' => 'Rp 12.590.000', 'foto' => 'images/axioo.jpeg', 'deskripsi' => 'Bertenaga Intel Core i7-13620H dan RTX 3050 '], 
        ['id' => 6, 'nama' => 'MSI 735 ', 'harga' => 'Rp 12.590.000', 'foto' => 'images/msi.jpeg', 'deskripsi' => 'Bertenaga Intel Core i7-13620H dan RTX 3050 '], 
    ]; 
    return view('produk', compact('produk')); 
})->name('produk'); 
 
// Halaman Detail Pembelian 
Route::get('/produk/{id}', function ($id) { 
    $produk = [ 
                1 => ['nama' => 'PC Dein neuer MIFCOM Gaming-PC', 'harga' => 'Rp Rp 18.500.000', 'foto' => 'images/acern.png', 'deskripsi' => 'Acer Nitro dengan prosesor Intel i9 dan RAM 16GB.'], 
                2 => ['nama' => 'ASUS ROG ', 'harga' => 'Rp 30.500.000', 'foto' => 'images/ro.jpeg', 'deskripsi' => 'Strix G16 (2023) i9-13980HX 24-Core Gaming Laptop'], 
                3 => ['nama' => 'Lenovo LOQ', 'harga' => 'Rp 12.590.000', 'foto' => 'images/log.jpeg', 'deskripsi' => 'Bertenaga Intel Core i7-13620H dan RTX 3050'], 
                4 => ['nama' => 'Asus Tuf', 'harga' => 'Rp 12.590.000', 'foto' => 'images/tuf.jpg', 'deskripsi' => 'Bertenaga Intel Core i7-13620H dan RTX 3050'], 
                5 => ['nama' => 'Axioo Pongo 735', 'harga' => 'Rp 12.590.000', 'foto' => 'images/axioo.jpeg', 'deskripsi' => 'Bertenaga Intel Core i7-13620H dan RTX 3050'], 
                6 => ['nama' => 'MSI 735', 'harga' => 'Rp 12.590.000', 'foto' => 'images/msi.jpeg', 'deskripsi' => 'Bertenaga Intel Core i7-13620H dan RTX 3050'], 
            ]; 
 
    // Pastikan ID valid 
    if (!array_key_exists($id, $produk)) { 
        abort(404, 'Produk tidak ditemukan'); 
    } 
 
    $detail = $produk[$id]; 
    return view('detail', compact('detail')); 
})->name('produk.detail'); 
 
// Logout 
Route::get('/logout', function () { 
    return redirect()->route('beranda'); 
})->name('logout');
