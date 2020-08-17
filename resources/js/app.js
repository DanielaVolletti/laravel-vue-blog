require('./bootstrap');
window.Vue = require('vue');


function init() {
  const files = require.context('./', true, /\.vue$/i)
  files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

  token = $('meta[name = "csrf-token"]').attr('content');

  const app = new Vue({
    el: '#app',
  });
}

$(document).ready(init);
