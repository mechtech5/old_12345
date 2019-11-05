require('./bootstrap');

window.Vue = require('vue');

// Vue.component(
//     'passport-clients',
//     require('./components/passport/Clients.vue').default
// );

// Vue.component(
//     'passport-authorized-clients',
//     require('./components/passport/AuthorizedClients.vue').default
// );

// Vue.component(
//     'passport-personal-access-tokens',
//     require('./components/passport/PersonalAccessTokens.vue').default
// );

Vue.component('feed-component', require('./components/feed-component.vue').default)
Vue.component('home-component', require('./components/home-component.vue').default)
Vue.component('profile-component', require('./components/profile-component.vue').default)
Vue.component('comments-component', require('./components/comments-component.vue').default)



const app = new Vue({
    el: '#app',
});
