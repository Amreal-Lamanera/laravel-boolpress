<template>
    <div>
        <section class="my-12">
            <div class="container">
                <div class="grid grid-cols-3 gap-8">
                    <router-link v-for="post in posts" :key="post.id"
                        :to="{ name: 'posts.show', params: { slug: post.slug } }">
                        <PostCard :post="post" />
                    </router-link>
                </div>
            </div>

            <IndexWrapper />
        </section>
    </div>
</template>

<script>
import state from '../store';
import PostCard from '../components/PostCard.vue';
import IndexWrapper from '../components/IndexWrapper.vue'

export default {
    components: {
        PostCard,
        IndexWrapper
    },
    computed: {
        posts() {
            return state.posts;
        },
        currentPage() {
            return state.currentPage;
        },
        lastPage() {
            return state.lastPage;
        },
        total() {
            return state.total;
        }
    }
}
</script>

<style lang="scss" scoped>
h1 {
    text-align: center;
}
</style>