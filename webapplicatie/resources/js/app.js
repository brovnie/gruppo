/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Pusher = require('pusher-js');
window.Vue = require('vue').default;
require('./bootstrap');
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('select-city', require('./components/SelectCityComponent.vue').default);
Vue.component('profil-image', require('./components/ProfilImageComponent.vue').default);
Vue.component('players-range', require('./components/PlayersRangeComponent.vue').default);
Vue.component('team-list', require('./components/TeamListComponent.vue').default);
Vue.component('add-remove-player', require('./components/AddRemovePlayerComponent.vue').default);
Vue.component('participating-players', require('./components/ParticipatingPlayersComponent.vue').default);
Vue.component('best-player', require('./components/BestPlayerComponent.vue').default);
Vue.component('close-game', require('./components/CloseGameComponent.vue').default);
Vue.component('smileys', require('./components/profile/SmileysComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to 
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
 
 const app = new Vue({
    el: '#app',
  });