// window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');

} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}


/**
 *     Vue
 */
// window.Vue = require('vue');

/**
 *     js-cookie
 */
window.$.cookie = require('js-cookie');

/**
 *     jquery.scrollto
 */
window.scrollTo = require('jquery.scrollto');

/**
 *     Jquery.nicescroll
 */
window.niceScroll = require('jquery.nicescroll');

/**
 *     dcjqaccordion
 */
window.dcAccordion = require('dcjqaccordion');


/**
 *     Toastr
 */
window.toastr = require('toastr');
window.toastr.options.timeOut = 5000;
window.toastr.options.positionClass = "toast-bottom-right";
window.toastr.options.progressBar = true;

/**
 *     Datatables
 */

window.dataTable = require('datatables.net-bs');
require('datatables.net-rowreorder');


/**
 *     moment
 */
window.moment = require('moment');

/**
 *     slidebars
 */
require('./slidebars.min');

/**
 *     form helpers
 */
import Form from './utilities/Form'
window.Form = Form;

/**
 *     makeid y routes
 */
window.makeid = require('./makeid');
window.route = require('./route');

