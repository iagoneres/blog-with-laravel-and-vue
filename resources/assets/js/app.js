
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('navbar-component',       require('./components/NavBar/NavBarComponent'));
Vue.component('panel-component',        require('./components/Panel/PanelComponent'));
Vue.component('box-component',          require('./components/Box/BoxComponent'));
Vue.component('page-component',         require('./components/Page/PageComponent'));
Vue.component('tb-hover-component',     require('./components/Table/TableHoverComponent'));
Vue.component('breadcrumb-component',   require('./components/Breadcrumb/BreadcrumbComponent'));
Vue.component('modal-component',        require('./components/Modal/ModalComponent'));
Vue.component('modal-btn-component',    require('./components/Modal/ModalButtonComponent'));


const app = new Vue({
    el: '#app'
});
