/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('skill-page', require('./components/skills/SkillPage.vue').default);
Vue.component('skill-level', require('./components/skills/SkillLevel.vue').default);
Vue.component('skill-cont', require('./components/skills/SkillCont.vue').default);
Vue.component('skill-path', require('./components/skills/SkillPath.vue').default);

Vue.component('subject-page', require('./components/skills/SubjectPage.vue').default);
Vue.component('subject-list', require('./components/skills/SubjectList.vue').default);
Vue.component('subject-cont', require('./components/skills/SubjectCont.vue').default);

Vue.component('character-page', require('./components/skills/CharacterPage.vue').default);
Vue.component('job-selector', require('./components/job/JobGrid.vue').default);

/**
 * MINOR COMPONENTS
 */
Vue.component('plus-button', require('./components/minorComponents/PlusButton.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
export const bus = new Vue();
import {store} from './store'

const app = new Vue({
    el: '#app',
    store,
});


