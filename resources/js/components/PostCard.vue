<template>

    <article class="relative rounded-lg overflow-hidden">
        <img v-if="post.cover" :src="post.cover_path" alt="" width="100%">

        <div class="p-4 mt-2">
            <h3 class="text-xl">
                {{ post.title }}
            </h3>
            <p class="text-sm">{{ post.date }}</p>
            <p v-if="post.category" class="text-amber-600 text-sm my-1">
                {{ post.category.name }}
            </p>
            <Tags :tags="post.tags" />
        </div>
    </article>

</template>

<script>
import Tags from './Tags.vue';

export default {
    components: {
      Tags,
    },
    props: {
        post: {
            type: Object,
            required: true
        }
    }
}
</script>

<style>

</style>