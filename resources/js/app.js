import Vue from 'vue';

require('./bootstrap');

window.Vue = require('vue').default

import App from './layouts/App.vue';
import router from './router';
import ElementUI from 'element-ui'
import locale from 'element-ui/lib/locale/lang/pt-br'
import VueMask from 'v-mask'
import 'element-ui/lib/theme-chalk/index.css'

Vue.use(ElementUI, { locale })
Vue.use(VueMask)

const app = new Vue({
    router,
    el: '#app',
    render: h => h(App)
});
