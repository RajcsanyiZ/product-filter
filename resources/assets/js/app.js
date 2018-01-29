
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
    	products: [],
    	filters: {
    		col11: true,
    		col12: true,
    		col13: true,
    		col15: true,
    		col21: true,
    		col27: true,
    		ranges: 4
    	}
    },
    methods: {
      submitFilters: function() {
      	console.log(this.filters);
      	window.axios.get('/api/products', {
		    params: this.filters
		  })
		  .then(function (response) {
		  	this.products = response.data;
		    console.log(response.data);
		  }.bind(this))
		  .catch(function (error) {
		    console.log(error);
		  });
      }
    },
    created: function() {
    	this.submitFilters();
    }
});
