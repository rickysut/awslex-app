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

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.prototype.$userId = document.querySelector("meta[name='user_id']").getAttribute('content');

import Messages from './components/Messages.vue'
import Form from './components/Form.vue'
import Lex from './components/Lex.vue'

Vue.component('chat-messages', Messages);
Vue.component('chat-form', Form);
Vue.component('lex-response', Lex);

const app = new Vue({
    el: '#app',

    data: {
        messages: [],
        newMessage: '',
        lexData: {
            dialogState: "",
            intentName: "",
            sessionId: "",
            slots: {}
        }
    },

    created() {
        this.fetchMessages(); //get user messages
    },

    updated: function () {
        this.$refs.scrollParent.scrollTop = this.$refs.scrollParent.scrollHeight 
    },

    methods: {
        fetchMessages() {
            axios.get('/messages').then(response => {
                this.messages = response.data;
            });
        },

        clearMessages() { //Clear messages table 
            axios.get('/messages/clear').then(response => {
                this.messages = response.data;
            });
        },

        addMessage(message) { //post new message into messages table 
            //console.log(message);
            this.messages.push({
                message: message.message,
                user: message.user
            });
            axios.post('/messages', message).then(response => {
                // console.log(response.data);
                // console.log(response.data.aws);
                // 
                this.messages.push({
                    message: response.data.message,
                    user: response.data.user
                });

                this.lexData = response.data.aws;
                if (this.lexData.message.indexOf('Thank you')==0){
                    //console.log("Ending");  
                    this.addHistory(this.lexData);  
                }
                
            });
            this.newMessage = '';
        },

        addHistory(message) { //post new history into history table 
            axios.post('/history', message).then(response => {
                console.log(response.data);
            });
        },



    }
});
