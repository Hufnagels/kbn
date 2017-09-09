
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
require('../../../node_modules/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js');
// require('../../../node_modules/moment/moment.js');
window.moment = require('moment');
window.owlcarousel = require('owl.carousel');
const WOW = require('wowjs');
window.wow = new WOW.WOW({ live: false });

window.Vue = require('vue/dist/vue.min.js');
//import Vue from 'vue/dist/vue.min.js'
import Buefy from 'buefy'


//window.Buefy = require('buefy');
Vue.use(Buefy);


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
    return text.replace(/&/g, '-and-').replace(/[^A-Za-z0-9-]+/g, '-').replace(/\-\-+/g, '-').replace(/^-+|-+$/g, '');
  }


$(document).ready(function(){
  $('.navbar-burger').click(function (e) {
    $('#navMenu').toggleClass('is-active');
  })
  window.wow.init();


});
