const { default: axios } = require('axios');

// import Vue from 'vue'
// window.Vue = Vue;
require('./bootstrap');

// import {createApp} from 'vue'

// // import App from './App.vue'



// Vue.config.productionTip = false



// window.Vue = require('vue');
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

    const messages_el = document.getElementById("messages");
    const username_input = document.getElementById("username");
    const message_input = document.getElementById("message_input");
    const message_form = document.getElementById("message_form");
    const id = document.getElementById("id");

    message_form.addEventListener('submit', function (e) {
        e.preventDefault();

        let has_errors = false;

        if (!username_input) {
            alert("Sing in or authorized");
            has_errors = true;
        }
    
        if (message_input.value == '') {
            alert("Please enter a message");
            has_errors = true;
        }

        if (has_errors) {
            return;
        }

        const options = {
            method: 'post',
            url: '/send-message',
            data: {
                username: username_input.innerText,
                message: message_input.value,
                id: id.value
            },
            
            transformResponse: [(data) => {
                return data;
            }]
        }

        axios(options);
    });


    Echo.channel('chat')
        .listen('.message', (e) => {
            messages_el.innerHTML += '<div class="message" ><strong>' + e.username + ':</strong> ' + e.message + '</div>';
        });

//         Echo.channel('chat')
//   .listen('Message', (e) => {
//     this.messages.push({
//       message: e.message.message,
//       user: e.user
//     });
//   });

// import { createApp } from 'vue';
// import ChatMessages from './components/ChatMessages.vue'

// // createApp(App).mount("#app")
// import ChatForm from './components/ChatForm.vue'
// // createApp(App2).mount("#app")
// const app = createApp({
//     el: '#app',
//     components: {
//         ChatMessages,
//         ChatForm
//     },

//     data: {
//         messages: []
//     },

//     created() {
//         this.fetchMessages();
//     },

//     methods: {
//         fetchMessages() {
//             axios.get('/messages').then(response => {
//                 this.messages = response.data;
//             });
//         },

//         addMessage(message) {
//             this.messages.push(message);

//             axios.post('/messages', message).then(response => {
//                 console.log(response.data);
//             });
//         }
//     }
// });
// app.mount('#app');
// Vue.component('chat-messages', require('./components/ChatMessages.vue').default);
// const app = new Vue({
    

// app.component('chat-form', require('./components/ChatForm.vue').default);
// app.component('exam-comp',  {data() {
//     return {
//       count: 0
//     }
//   },
//   template: `
//     <button v-on:click="count++">
//       You clicked me {{ count }} times.
//     </button>`});
// app.mount('#cont');
// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('app-vue', require('./components/client/src/App.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });
