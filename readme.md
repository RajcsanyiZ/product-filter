## Vue.js Termék szűrő példa 

A repository a [https://vuejs.hu/cikk/egyszeru-termek-szuro/31](https://vuejs.hu/cikk/egyszeru-termek-szuro/31) cikk dizájnolt példakódja.

![Bélyegkép](https://github.com/RajcsanyiZ/product-filter/blob/master/doc/preview.png)

### Installálás

- `git clone https://github.com/RajcsanyiZ/product-filter.git`

- `composer install`

- készíts másolatot az az .env.example fájlról

- `php artisan key:generate`

- kommenteld ki az adatbázis beállításokat és ezt tedd csak bele:
`DB_CONNECTION=sqlite`

- `npm install`

- `npm run dev`

- adj írási jogot a `/bootstrap/cache` és `/storage` mappáknak és fájljaiknak (ha esetleg hibaként jelenne meg ez)

### Indítás

- `php artisan serve`

- böngészőbe írd be: `http://localhost:8000`
