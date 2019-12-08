require('./bootstrap');

window.Vue = require('vue');

<<<<<<< HEAD
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

Vue.component('login', require('./components/Login.vue').default)
Vue.component('register', require('./components/Register.vue').default)

Vue.component('landing-page', require('./views/LandingPage.vue').default)
Vue.component('home-page', require('./views/Home.vue').default)
Vue.component('profile-page', require('./views/Profile.vue').default)
=======
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

Vue.component('Feed', require('./pages/Feed.vue').default)
Vue.component('Profile', require('./pages/Profile.vue').default)
Vue.component('Comments', require('./components/Comments.vue').default)
>>>>>>> 047505b218be6f202031f4e8b7667e85b3d49de5



const app = new Vue({
    el: '#app',
});
