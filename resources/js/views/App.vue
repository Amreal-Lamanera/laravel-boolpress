<template>
    <div>
        <section class="relative">
            <div class="container flex items-center" :class="home? 'h-screen justify-center' : ''">
                <h1 class="" :class="home ? 'text-7xl' : 'text-xl p-3'">
                    {{ title }}
                </h1>
                <div class="absolute top-0 right-0 p-3 cursor-pointer" @click="home = false">
                    Articoli
                </div>
            </div>
        </section>

        
        <section class="my-12" v-if="!home">
            <div class="container">
                <div class="grid grid-cols-3 gap-8">
                    <PostCard v-for="post in posts" :key="post.id" :post="post" />
                </div>
            </div>

            <IndexWrapper />
        </section>
    </div>
</template>

<script>
    import state from '../store';
    import PostCard from '../components/PostCard.vue';
    import IndexWrapper from '../components/IndexWrapper.vue';

    export default {
        components: {
            PostCard,
            IndexWrapper
        },
        data() {
            return {
                title: 'Boolpress',
                home: 'true',
            }
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