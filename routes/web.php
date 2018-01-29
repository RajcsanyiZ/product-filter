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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/products', function(){

	$products = App\Product::select('*');

	$cols = [];
	foreach (request()->all() as $key => $req) {
		if (starts_with($key, 'col')) {
			if ($req == 'true') {
				$number = substr($key, 3);
				$cols[] = intval($number);
			}
		}
	}

	if (request()->has('ranges') && request()->get('ranges') != 4) {
		if (request()->get('ranges') == 1) {
			$products = $products->where(function($q){
				$q->where('price', '>=', 500);
				$q->where('price', '<=', 1000);
			});
			
		} elseif (request()->get('ranges') == 2) {
			$products = $products->where(function($q){
				$q->where('price', '>=', 1000);
				$q->where('price', '<=', 1500);
			});			
		} elseif (request()->get('ranges') == 3) {
			$products = $products->where(function($q){
				$q->where('price', '>=', 1500);
				$q->where('price', '<=', 2000);
			});			
		}
	}

	$products = $products->whereIn('col', $cols);

	return $products->orderBy('col')->get();
});

Route::get('create', function(){
	//dd(App\Product::get());
	App\Product::create([
		'id' => 1,
		'name' => 'Apple 13" MacBook Air',
		'image' => 'https://images-na.ssl-images-amazon.com/images/I/51GRACqhHbL._AC_US436_FMwebp_QL65_.jpg',
		'description' => '',
		'price' => 865,
		'col' => '13'
	]);
	App\Product::create([
		'id' => 2,
		'name' => 'Apple 15" Macbook Pro MJLQ2LL/A',
		'image' => 'https://images-na.ssl-images-amazon.com/images/I/41nOwxSNxpL._AC_US436_FMwebp_QL65_.jpg',
		'description' => 'a',
		'price' => 1259,
		'col' => 15
	]);
	App\Product::create([
		'id' => 3,
		'name' => 'Apple 13" MacBook Pro, Retina Display',
		'image' => 'https://images-na.ssl-images-amazon.com/images/I/41tznVhXGhL._AC_US436_FMwebp_QL65_.jpg',
		'description' => 'a',
		'price' => 1269,
		'col' => 13
	]);
	App\Product::create([
		'id' => 4,
		'name' => 'Apple 15" MacBook Pro, Retina, Touch Bar',
		'image' => 'https://images-na.ssl-images-amazon.com/images/I/41uYSa+L+NL._AC_US436_FMwebp_QL65_.jpg',
		'description' => 'a',
		'price' => 1269,
		'col' => 15
	]);
	App\Product::create([
		'id' => 5,
		'name' => 'Apple 12" MNYF2LL/A MacBook, Retina',
		'image' => 'https://images-na.ssl-images-amazon.com/images/I/41sHCrPX+-L._AC_US436_FMwebp_QL65_.jpg',
		'description' => 'a',
		'price' => 1249,
		'col' => 12
	]);
	App\Product::create([
		'id' => 6,
		'name' => 'Apple 21" iMac MMQA2LL/A',
		'image' => 'https://images-na.ssl-images-amazon.com/images/I/518MsT5t6BL._AC_US436_QL65_.jpg',
		'description' => 'a',
		'price' => 1268,
		'col' => 21
	]);
	App\Product::create([
		'id' => 7,
		'name' => '	Apple iMac 27" MNE92LL/A 27',
		'image' => 'https://images-na.ssl-images-amazon.com/images/I/51EqZ6NbtYL._AC_US436_QL65_.jpg',
		'description' => 'a',
		'price' => 1840,
		'col' => 27
	]);

	
});
