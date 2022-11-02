<template>
    <div>
        <section>
            <div class="container">
                <h1>
                    Pagina di dettaglio del post
                </h1>
                <p>
                    {{ slug }}
                </p>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    // alternativa
    props: ['slug'],
    data() {
        return {
            post: null
        }
    },
    methods: {
        fetchPost() {
            const slug = this.$route.params.slug;
            axios.get(`/api/posts/${this.slug}`).then(res => {
                console.log(res.data);
                // salva post in this.post
            }).catch(err =>{
                console.log(err);

                //redirect to 404
            })
        }
    },
    beforeMount() {
        console.log(this.$route)
        this.fetchPost();
    }
}
</script>

<style>

</style>