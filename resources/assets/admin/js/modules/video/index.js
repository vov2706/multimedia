require('../../../../bootstrap');

import Vue from 'vue';
import Video from "./Video";

const app = new Vue({
    el: '#video',
    render: h => h(Video)
});