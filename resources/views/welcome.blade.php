<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <style>
            [v-cloak] > * { display:none; }
            [v-cloak]::before { content: "loading..."; }
        </style>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    </head>
    <body>
    
    <div id="app" v-cloak>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ul class="list-unstyled" v-if="products.length">
                        <li v-for="(product,index) in products">
                            <div class="row">
                            <div class="col-md-6">
                                <img :src="product.image" alt="" width="50%" height="50%">    
                            </div>
                            <div class="col-md-6">
                                <h4 style="margin-top: 30px">@{{ product.name }}</h4>
                                <p>Price: $@{{ product.price }}</p>
                            </div>
                            <hr>
                            </div>
                        </li>
                    </ul>
                    <div v-else>Nincs a szűrésnek megfelelő termék</div>
                </div>
                <div class="col-md-6">
                    <h4>Képernyő méretek</h4>
                        <ul class="list-unstyled">
                            <li><input type="checkbox" @change="submitFilters" name="col11" v-model="filters.col11" value="11">&nbsp;11"</li>
                            <li><input type="checkbox" @change="submitFilters" name="col12" v-model="filters.col12" value="12">&nbsp;12"</li>
                            <li><input type="checkbox" @change="submitFilters" name="col13" v-model="filters.col13" value="13">&nbsp;13"</li>
                            <li><input type="checkbox" @change="submitFilters" name="col15" v-model="filters.col15" value="15">&nbsp;15"</li>
                            <li><input type="checkbox" @change="submitFilters" name="col21" v-model="filters.col21" value="21">&nbsp;21"</li>
                            <li><input type="checkbox" @change="submitFilters" name="col27" v-model="filters.col27" value="27">&nbsp;27"</li>
                        </ul>
                    <h4>Árszintek</h4>
                    <ul class="list-unstyled">
                        <li><input type="radio" @change="submitFilters" name="price_ranges" v-model="filters.ranges" value="1">&nbsp;$500 - $1000</li>
                        <li><input type="radio" @change="submitFilters" name="price_ranges" v-model="filters.ranges" value="2">&nbsp;$1000 - $1500</li>
                        <li><input type="radio" @change="submitFilters" name="price_ranges" v-model="filters.ranges" value="3">&nbsp;$1500 - $2000</li>
                        <li><input type="radio" @change="submitFilters" name="price_ranges" v-model="filters.ranges" value="4">&nbsp;Összes</li>
                    </ul>                    
                </div>
            </div>
        </div>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
