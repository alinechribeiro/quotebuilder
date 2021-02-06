<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/',

function () {
		return view('welcome');
	});

Route::resource('products', ProductController::class );
Route::post('send', function (Request $request) {
		$products = Product::latest()->paginate(5);
		$total = 0;
		foreach ($products as $product) {
			$qty = $product['qty'];
			$price = floatval($product['price']);
			$total = ($qty*$price)+$total;
		}
		$request = $request->all();
		$info = [
			'name'      => $request['name'],
			'address'   => $request['address'],
			'email'     => $request['email'],
			'products'  => $products,
			'quotation' => $total
		];

		\Mail::to('testing555@testing12345.com')->send(new \App\Mail\NewMail($info));

		dd("success");

	});