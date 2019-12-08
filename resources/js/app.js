require('./bootstrap');

window.Vue = require('vue');

Vue.component('passport-clients', require('./components/passport/Clients.vue').default);
Vue.component('passport-authorized-clients', require('./components/passport/AuthorizedClients.vue').default);
Vue.component('passport-personal-access-tokens', require('./components/passport/PersonalAccessTokens.vue').default);

Vue.component('login', require('./components/Login.vue').default)
Vue.component('register', require('./components/Register.vue').default)

Vue.component('Feed', require('./pages/Feed.vue').default)
Vue.component('Profile', require('./pages/Profile.vue').default)
Vue.component('Comments', require('./components/Comments.vue').default)


const app = new Vue({
    el: '#app',
});
