import Vue from 'vue';

const files = require.context('./componentesGlobales', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

import Multiselect from 'vue-multiselect'
Vue.component('multiselect', Multiselect);

import VModal from 'vue-js-modal'
Vue.use(VModal);

import ToggleButton from 'vue-js-toggle-button'
Vue.use(ToggleButton)


