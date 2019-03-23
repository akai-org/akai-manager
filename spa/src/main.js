// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
/*eslint-disable*/
import Vue from 'vue'
import App from './App'
import router from './router'
import axios from 'axios'
import cookieHelper from './libs/cookieHelper'
import 'bootstrap'
import './sass/vendors/sbadmin/sb-admin-2.scss'
import './sass/custom/style.scss'
import '../node_modules/@fortawesome/fontawesome-free/css/all.css'
import DashboardLayout from './components/layouts/DashboardLayout';
import LoginLayout from './components/layouts/LoginLayout';
import moment from 'moment';
import chart from 'tui-chart';

window.chart = chart;
window.moment = moment;
window.axios = axios;
Vue.config.productionTip = false;
window.mainApiInstance = axios.create({
    baseURL: 'http://vuespa.test/api/public',
    timeout: 1000,
    // headers: {'X-Custom-Header': 'foobar'}
});

Vue.component("dashboard-layout", DashboardLayout);
Vue.component("login-layout", LoginLayout);

window.vm = new Vue({
    el: '#app',
    router,
    components: {
        App
    },
    template: '<App ref="app"/>',
});

window.onSignIn = function (googleUser) {
    window.googleUser = googleUser;
    cookieHelper.setCookie("loggedIn", true, 1);
    vm.$refs.app.setGoogleUser(googleUser);
    if(vm.$router.currentRoute.meta.layout !== "dashboard"){
        vm.$router.push("/");
    }
};
