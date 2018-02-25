<?php

/**
 * Nyitóoldal, a termékek listájával
 * url: / (nyitólap, GET metódus)
 */
Route::get('/', function () {
    return view('products');
});

/**
 * Termékek visszadása ajax-on
 * url: /api/products (GET metódus)
 */
Route::get('/api/products', function(){

    // összes termék, összes mezőjének listázása
	$products = App\Product::select('*');

	// szűrés: termék neve szerint
    if (request()->has('keywords') and (request()->get('keywords')) !== '') {
        $products = $products->where('name', 'like', '%'.request()->get('keywords').'%');
    }

	// szűrés: képernyő méretére
	$filter_display_size = [];
	foreach (request()->all() as $key => $req) {
		if (starts_with($key, 'col')) {
			if ($req == 'true') {
				$filter_display_size[] = (int)substr($key, 3);
			}
		}
	}
    $products = $products->whereIn('col', $filter_display_size);

	// szűrés: ár intervallumra
	if (request()->has('ranges') and (request()->get('ranges')) !== 'all') {
        $price_period = explode('-', request()->get('ranges'));
	    $products = $products->whereBetween('price', $price_period);
	}

	return $products->orderBy('col')->get();
});

/**
 * Migrációs szkript a termékek létrehozásához
 * url: /create (GET metódus)
 */
Route::get('create', function(){
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
