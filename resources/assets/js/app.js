
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.owlcarousel = require('owl.carousel');

const WOW = require('wowjs');
window.wow = new WOW.WOW({ live: false });
// require('../../../node_modules/owl.carousel/dist/owl.carousel.min.js');

window.Vue = require('vue');

import Buefy from 'buefy';

Vue.use(Buefy);


$(document).ready(function(){
  $('.navbar-burger').click(function (e) {
    $('#navMenu').toggleClass('is-active');
  })
  window.wow.init();
});
