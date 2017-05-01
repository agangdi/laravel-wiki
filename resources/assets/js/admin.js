/**
 * Created by johnShaw on 17/5/1.
 */


require('./bootstrap');

window.Vue = require('vue');
window.Vuetify = require('vuetify');
Vue.use(Vuetify);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


const admin = new Vue({
    el: '#admin',
    data: function() {
        return {
            visible: false,
            msg: 'messg'
        }
    }
});
