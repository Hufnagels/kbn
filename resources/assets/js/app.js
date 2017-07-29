
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
//require('node_modules/material-design-lite/material.min.js');
//require('../../../node_modules/material-components-web/dist/material-components-web');
window.Vue = require('vue');

import Buefy from 'buefy';

Vue.use(Buefy);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example', require('./components/Example.vue'));

var app = new Vue({
     el: '#app',
     data: {}
});

$(document).ready(function(){
  $('.navbar-burger').click(function (e) {
    $('#navMenu').toggleClass('is-active');
  })
});
