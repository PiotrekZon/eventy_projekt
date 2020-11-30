

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

$(document).ready(function() {
	var rent = (function(){
        var inputBoxes = $('.rent-dates');
        
        var rentChoose = function(){

	    	var dates = [];
	    	inputBoxesChecked = $('.rent-dates:checked');

		count = $('.rent-dates:checked').length;

	    	if(count > 0)
	    	{
	    		inputBoxesChecked.each(function(){
	    		     dates.push($(this).val());	
			});	

	    		if(count == 1)
	    		{
	    			$('.rent-button').html("Rezerwuj "+ count + " dzień");
	    		}
	    		else
	    		{
	    			$('.rent-button').html("Rezerwuj "+ count + " dni");
	    		}	    		
	    		$('.rent-button').show();
	    	}
	    	else
	    	{
	    		$('.rent-button').hide();
	    	}

	    	$('.rent-list').html(dates.toString());
	    	$('.dates_input').val(dates.toString());
	};


	var bindFunctions = function() {
			
		inputBoxes.on("change", rentChoose);
	};	

	var init = function() {
		rentChoose();
    		bindFunctions();

	  };

	 return {
		init:init
	};
 })();

   rent.init();
 
});

