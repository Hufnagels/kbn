
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
require('../../../node_modules/trumbowyg/dist/trumbowyg.min.js');
require('../../../node_modules/trumbowyg/dist/plugins/base64/trumbowyg.base64.min.js');
//require('../../../node_modules/trumbowyg/dist/plugins/upload/trumbowyg.upload.min.js');

require('../../../node_modules/bootstrap/dist/js/bootstrap.min.js');
require('../../../node_modules/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js');
// require('../../../node_modules/moment/moment.js');
window.moment = require('moment');

const WOW = require('wowjs');
window.wow = new WOW.WOW({ live: false });


window.Vue = require('vue');

import Buefy from 'buefy';

Vue.use(Buefy);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example', require('./components/Example.vue'));
/*
 var app = new Vue({
   el: '#app',
   data: {}
 });

var app = new Vue({
     el: '#app',
     data: {
       auto_password: false,
       password_options: 'keep',
       permissionsSelected: [],
       permissionType: 'basic',
        resource: '',
        crudSelected: ['create', 'read', 'update', 'delete']
      },
      methods: {
        crudName: function(item) {
          return item.substr(0,1).toUpperCase() + item.substr(1) + " " + app.resource.substr(0,1).toUpperCase() + app.resource.substr(1);
        },
        crudSlug: function(item) {
          return item.toLowerCase() + "-" + app.resource.toLowerCase();
        },
        crudDescription: function(item) {
          return "Allow a User to " + item.toUpperCase() + " a " + app.resource.substr(0,1).toUpperCase() + app.resource.substr(1);
        }
      }
    });
*/
$(document).ready(function(){
  $('.navbar-burger').click(function (e) {
    $('#navMenu').toggleClass('is-active');
  })
  window.wow.init();
});
