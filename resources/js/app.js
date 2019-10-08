require('./bootstrap');

window.Vue = require('vue');

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);

Vue.component('feed-component', require('./components/Feed.vue').default);
Vue.component('home-component', require('./components/Home.vue').default);
Vue.component('profile-component', require('./components/Profile.vue').default);



const app = new Vue({
    el: '#app',
});
