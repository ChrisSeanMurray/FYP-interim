import Vue from 'vue';

import VueResource from 'vue-resource';
import VueLazyload from 'vue-lazyload';
// import VueLoader from 'vue-loader';

Vue.use(VueResource);
Vue.use(VueLazyload);

import questions from './vue/components/Questions.vue';

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

new Vue({
    el: '#app',

    data : {
    },

    computed : {

    },

    methods : {
        confirmDeletion(){

            let _self = this;

            bootbox.confirm({
                message: "Confirm Deletion?",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger'
                    }
                },
                callback: function (result) {

                    if(result){
                        _self.$els.deleteconfirm.submit();
                    }
                }
            });
        },

        changeSubmitButton () {
            this.disableOnSubmit = true;
            let _self = this;
            setTimeout(function () {
                _self.disableOnSubmit = false;
            }, 1000);
        },


    },

    components: {
        questions,
    },

    ready () {
    }
});
