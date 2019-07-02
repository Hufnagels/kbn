
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

//require('node_modules/material-design-lite/material.min.js');
//require('../../../node_modules/material-components-web/dist/material-components-web');
//require('node_modules/material-design-lite/material.min.js');
// require('../../../node_modules/trumbowyg/dist/trumbowyg.min.js');

// require('../../../node_modules/trumbowyg/dist/trumbowyg.min.js');
// require('../../../node_modules/trumbowyg/dist/plugins/base64/trumbowyg.base64.min.js');


//require('../../../node_modules/trumbowyg/dist/plugins/upload/trumbowyg.upload.min.js');

require('../../../node_modules/bootstrap/dist/js/bootstrap.min.js');
// require('../../../node_modules/eonasdan-bootstrap-datetimepicker/src/js/bootstrap-datetimepicker.js');
require('../../../public/vendor/datetimepicker/bootstrap-datetimepicker.min.js');
// require('../../../node_modules/moment/moment.js');
window.moment = require('moment');
window.owlcarousel = require('owl.carousel');
const WOW = require('wowjs');
window.wow = new WOW.WOW({ live: false });

// window.Vue = require('vue/dist/vue.min.js');
// //import Vue from 'vue/dist/vue.min.js'
// import Buefy from 'buefy'
//
//
// //window.Buefy = require('buefy');
// Vue.use(Buefy);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example', require('./components/Example.vue'));

/*
new Vue({
    el: '#app',
    components: {
      //nothing nessessary here
    }
})
*/
window.slugize = function slugize(text){
    text = text.replace(/[ÀÁÂÃÄÅàáâãä]/g,"a");
    text = text.replace(/[ÈÉÊËé]/g,"e");
    text = text.replace(/[Íí]/g,"i");
    text = text.replace(/[ÓóÖöŐő]/g,"o");
    text = text.replace(/[ÚúŰűÜü]/g,"u");
 // text = text.replace(/[áàâãªä]/g,'a');
 // text = text.replace(/[ÁÀÂÃÄ]/g,'A');
 // text = text.replace(/[ÍÌÎÏ]/g,'I');
 // text = text.replace(/[íìîï]/g,'i');
 // text = text.replace(/[éèêë]/g,'e');
 // text = text.replace(/[ÉÈÊË]/g,'E');
 // text = text.replace(/[óòôõºö]/g,'o');
 // text = text.replace(/[ÓÒÔÕÖ]/g,'O');
 // text = text.replace(/[úùûü]/g,'u');
 // text = text.replace(/[ÚÙÛÜ]/g,'U');
 // text = text.replace(/ç/,'c');
 // text = text.replace(/Ç/,'C');
 // text = text.replace(/ñ/,'n');
 // text = text.replace(/Ñ/,'N');
 // text = text.replace(/–/,'-'); // UTF-8 hyphen to "normal" hyphen
 // text = text.replace(/[’‘‹›‚]/g,' '); // Literally a single quote
 // text = text.replace(/[“”«»„]/g,' '); // Double quote
 // text = text.replace(/ /,' ');
    return text.replace(/&/g, '-and-').replace(/[^A-Za-z0-9-]+/g, '-').replace(/\-\-+/g, '-').replace(/^-+|-+$/g, '');
  }

  window.sorting = function sorting(ascending, columnClassName, tableId)
  		{
  			var tbody = document.getElementById(tableId).getElementsByTagName("tbody")[0];
  			var rows = tbody.getElementsByTagName("tr");

  			var unsorted = true;

  			while(unsorted)
  			{
  				unsorted = false

  				for (var r = 0; r < rows.length - 1; r++)
  				{
  					var row = rows[r];
  					var nextRow = rows[r+1];

  					var value = row.getElementsByClassName(columnClassName)[0].innerHTML;
  					var nextValue = nextRow.getElementsByClassName(columnClassName)[0].innerHTML;

  					value = value.replace(',', ''); // in case a comma is used in float number
  					nextValue = nextValue.replace(',', '');

  					if(!isNaN(value))
  					{
  						value = parseFloat(value);
  						nextValue = parseFloat(nextValue);
  					}

  					//console.log(value);

  					if (ascending ? value > nextValue : value < nextValue)
  					{
  						tbody.insertBefore(nextRow, row);
  						unsorted = true;
  					}
  				}
  			}
  		};

$(document).ready(function(){
  $('.navbar-burger').click(function (e) {
    $('#navMenu').toggleClass('is-active');
  })
  window.wow.init();


});
