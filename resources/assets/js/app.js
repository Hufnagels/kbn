
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.owlcarousel = require('owl.carousel');

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
  //console.log('Start');
  window.wow.init();

  var owl = $('.owl-carousel'),
  owlConfig = {
                  loop:true,
                  margin:0,
                  nav:false,
                  autoplay:true,
                  autoplayTimeout:2500,
                  autoplayHoverPause:false,
                  responsive:{
                      0:{ items:1 },
                      300:{ items:2  },
                      650:{ items:3  },
                      1300:{ items:4 }
                  }
              };
  owl.owlCarousel(owlConfig);

  $(window).scroll(function () {
	    	if ($(this).scrollTop() > 100) {
	    		$('#top').slideDown();
	    	} else {
	    		$('#top').fadeOut();
	    	}
	    });

	    $('#top').click(function (e) {
	    	e.preventDefault();
	    	$("html, body").animate({
	    		scrollTop: 0
	    	}, 800);

	    });
});
