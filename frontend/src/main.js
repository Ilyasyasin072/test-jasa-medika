import { createApp } from 'vue'
import App from './App.vue'
import router from '@/router/router';
// import axios from 'axios';

// Import Bootstrap and BootstrapVue CSS files (order is important)
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'


const app = createApp(App);
// app.config.globalProperties.$http = axios;
app.use(router)
// app.use(axios)
app.mount('#app')
