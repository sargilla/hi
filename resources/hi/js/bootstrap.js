// window._ = require('lodash');



try {

    window.$ = window.jQuery = require('jquery');

    require('bootstrap');

    // window.Vue = require('vue');

	// window.axios = require('axios');

	// window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

	// let token = document.head.querySelector('meta[name="csrf-token"]');

	// if (token) {
	//     window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
	// } else {
	//     console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
	// }


    window.$.scrollTo = require('jquery.scrollto');

    window.niceScroll = require('jquery.nicescroll');

	window.toastr = require('toastr');
	window.toastr.options.timeOut = 5000;
	window.toastr.options.positionClass = "toast-bottom-right";
	window.toastr.options.progressBar = true;

	window.moment = require( 'moment' );

    window.Cookies = require('js-cookie/src/js.cookie');



} catch (e) {}


import vjs from 'video.js';
window.videojs = vjs;
