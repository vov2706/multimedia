require('../../../../bootstrap');
require('../../common/message');

import Vue from 'vue';
import Video from "./Video";
import { ModalPlugin, ButtonPlugin } from 'bootstrap-vue'

Vue.use(ModalPlugin);
Vue.use(ButtonPlugin);

const app = new Vue({
    el: '#video',
    render: h => h(Video)
});
