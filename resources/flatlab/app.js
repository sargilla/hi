import Vue from 'vue';

require('./js/bootstrap');
require('./js/components');
require('./js/flatlab');
require('./js/datatables');

/* Event Manager */
window.Event = new Vue();

const app = new Vue({
    el: '#app',
});
