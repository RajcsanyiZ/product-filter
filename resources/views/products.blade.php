<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>VueJs: Products Filter</title>

        <style>
            [v-cloak] > * { display:none; }
            [v-cloak]::before { content: "loading..."; }
            .product-title {  margin-top: 30px }
            .jumbotron {
                background-image: url('/img/vuejs-logo.png');
                background-repeat: no-repeat;
                background-position: center;
            }
        </style>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    </head>
    <body>
    
    <div id="app" v-cloak>
        <div class="container">
            <div class="jumbotron">
                <h1>products-filter</h1>
                <p>Webshop termékek listája VueJs-el</p>
                <p><a class="btn btn-primary btn-lg" href="https://vuejs.hu/cikk/egyszeru-termek-szuro/31" role="button">Ugrás a cikkre</a></p>
            </div>

            <div class="row">
                <div class="col-md-9">

                    {{-- Termékek listája --}}
                    <ul class="list-group" v-if="products.length">
                        <li class="list-group-item" v-for="product in products">
                            <div class="row">
                            <div class="col-md-3">
                                <img :src="product.image" alt="" class="img-responsive">
                            </div>
                            <div class="col-md-9">
                                <h4 class="product-title">@{{ product.name }}</h4>
                                <p>Price: $@{{ product.price }}</p>
                            </div>
                            <hr>
                            </div>
                        </li>
                    </ul>
                    <div v-else class="alert alert-danger">Nincs a szűrésnek megfelelő termék</div>
                </div>
                <div class="col-md-3">

                    {{-- szűrő: szabadszavas--}}
                    <ul class="list-group">
                        <li class="list-group-item active">Keresés a termék nevében</li>
                        <li class="list-group-item"><input type="text" class="form-control" @change="submitFilters" @keyUp="submitFilters" name="keywords" v-model="filters.keywords" value=""></li>
                    </ul>

                    {{-- szűrő: képernyő méretek --}}
                    <ul class="list-group">
                        <li class="list-group-item active">Képernyő méretek</li>
                        <li class="list-group-item"><input type="checkbox" @change="submitFilters" name="col11" v-model="filters.col11" value="11">&nbsp;11"</li>
                        <li class="list-group-item"><input type="checkbox" @change="submitFilters" name="col12" v-model="filters.col12" value="12">&nbsp;12"</li>
                        <li class="list-group-item"><input type="checkbox" @change="submitFilters" name="col13" v-model="filters.col13" value="13">&nbsp;13"</li>
                        <li class="list-group-item"><input type="checkbox" @change="submitFilters" name="col15" v-model="filters.col15" value="15">&nbsp;15"</li>
                        <li class="list-group-item"><input type="checkbox" @change="submitFilters" name="col21" v-model="filters.col21" value="21">&nbsp;21"</li>
                        <li class="list-group-item"><input type="checkbox" @change="submitFilters" name="col27" v-model="filters.col27" value="27">&nbsp;27"</li>
                    </ul>

                    {{-- szűrő: árszintek --}}
                    <ul class="list-unstyled">
                        <li class="list-group-item active">Árszintek</li>
                        <li class="list-group-item"><input type="radio" @change="submitFilters" name="price_ranges" v-model="filters.ranges" value="500-1000">&nbsp;$500 - $1000</li>
                        <li class="list-group-item"><input type="radio" @change="submitFilters" name="price_ranges" v-model="filters.ranges" value="1000-1500">&nbsp;$1000 - $1500</li>
                        <li class="list-group-item"><input type="radio" @change="submitFilters" name="price_ranges" v-model="filters.ranges" value="1500-2000">&nbsp;$1500 - $2000</li>
                        <li class="list-group-item"><input type="radio" @change="submitFilters" name="price_ranges" v-model="filters.ranges" value="all">&nbsp;Összes</li>
                    </ul>

                    <div class="alert alert-info">
                        Találatok száma: @{{products.length}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
