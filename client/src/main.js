import {createApp} from 'vue'
import App from './App.vue'

const Vue = createApp({})

Vue.config.productionTip = false


createApp(App).mount('#app')
// new Vue({
//   render: h => h(App),
// }).$mount('#app')
