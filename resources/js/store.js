import Vue from 'vue';

const state = Vue.observable({
    posts: [],
    currentPage: 1,
    lastPage: 0,
    total: 0,
});

export default state;