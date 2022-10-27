// include axios e vue:
window.Vue = require('vue');
window.axios = require('axios');

// imposta header di default e includiamo il componente app che conterrà tutto il front-office
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
import App from './views/App.vue';

// crea istanza di vue
const app = new Vue({
    el: '#app',
    render: (h) => h(App)
});