<template>
    <div>
        <div v-if="post">
            <section class="">
                <div class="container pb-20 d-flex flex-column items-center">
                    <img v-if="post.cover_path" class="d-block" :src="post.cover_path" alt="">
                    <h1 class="text-2xl text-amber-400 mb-6">{{ post.title }}</h1>
                </div>
            </section>
            <section class="py-10">
                <div class="container">
                    <h4>{{ post.category?.name }}</h4>
                    <Tags :tags="post.tags" />
                </div>
            </section>
            <section>
                <div class="container" v-html="post.content">
                </div>
            </section>
        </div>
        <div v-else class="loading flex items-center justify-center gap-4">
            <div class="text-[64px] bg-black text-white">
                Caricamento
            </div>
            <div class="lds-dual-ring bg-black"></div>
        </div>
    </div>
</template>

<script>
import Tags from '../components/Tags.vue';

export default {
    components: {
      Tags,
    },
    // alternativa
    props: ['slug'],
    data() {
        return {
            post: null
        }
    },
    methods: {
        fetchPost() {
            // const slug = this.$route.params.slug;
            axios.get(`/api/posts/${this.slug}`).then(res => {
                // console.log(res.data);
                const { post } = res.data;
                // salva post in this.post
                this.post = post;
            }).catch(err =>{
                // console.log(err);
                //redirect to 404
                this.$router.push({ name: '404' });
            })
        }
    },
    beforeMount() {
        console.log(this.$route)
        this.fetchPost();
    }
}
</script>

<style scoped>

    .loading {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: black;
    }
    .lds-dual-ring {
    display: inline-block;
    width: 80px;
    height: 80px;
    }
    .lds-dual-ring:after {
        content: " ";
        display: block;
        width: 64px;
        height: 64px;
        margin: 8px;
        border-radius: 50%;
        border: 6px solid #fff;
        border-color: #fff transparent #fff transparent;
        animation: lds-dual-ring 1.2s linear infinite;
    }
    @keyframes lds-dual-ring {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }


</style>