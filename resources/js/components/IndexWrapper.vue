<template>
<div class="container pt-12">
    <ul class="flex gap-6 justify-center">
        <li @click="fetchPosts(1)" class=" w-8 h-8 flex items-center justify-center rounded-full cursor-pointer bg-gray-600 text-black"
        v-if="lastPage > 5 && currentPage > 3">
            First
        </li>

        <li @click="fetchPosts(page)" :class="{
            'w-8 h-8 flex items-center justify-center rounded-full text-black' : true,
            'bg-cyan-400' : page === currentPage,
            'bg-gray-600' : page !== currentPage,
            'hidden' : (index < currentPage-3 && currentPage < lastPage-1) || currentPage >= lastPage-1 && index < lastPage-5
        }" class="cursor-pointer"
        v-for="(page, index) in lastPage <= 5 ? lastPage : currentPage < 3 ? 5 : currentPage > lastPage -2? lastPage : currentPage+2" :key="page">
            {{ page }}
        </li>

        <li @click="fetchPosts(lastPage)" class=" w-8 h-8 flex items-center justify-center rounded-full cursor-pointer bg-gray-600 text-black"
        v-if="lastPage > 5 && currentPage < lastPage-2">
            Last
        </li>
    </ul>
</div>
</template>

<script>
    import state from '../store';

    export default {
        data() {
            return {
                posts: [],
                currentPage: 1,
                lastPage: 0,
                total: 0,
            }
        },
        methods: {
            fetchPosts(page = 1) {
                axios.get('/api/posts', {
                    params: {
                        page: page
                    }
                }).then((res) => {
                    console.log(res.data);
                    // const { posts } = res.data;
                    // this.posts = posts;
                    const { data, current_page, last_page, total } = res.data.result;
                    state.posts = data;
                    this.posts = data;
                    state.lastPage = last_page;
                    this.lastPage = last_page;
                    state.currentPage = current_page;
                    this.currentPage = current_page;
                    state.total = total;
                    this.total = total;
                })
            }
        },
        beforeMount() {
            this.fetchPosts();
        }
    }
</script>

<style>

</style>