<template>

    <article class="relative rounded-lg overflow-hidden">
        <img v-if="post.cover" :src="post.cover_path" alt="">

        <div class="p-4 mt-2">
            <h3 class="text-xl">
                {{ post.title }}
            </h3>
            <p class="text-sm">{{ post.date }}</p>
            <p v-if="post.category" class="text-amber-600 text-sm my-1">
                {{ post.category.name }}
            </p>
            <ul class="flex gap-4 py-3">
                <li class="text-black rounded-full hover:bg-cyan-400 bg-gray-600 px-2 py-1 text-xs cursor-pointer" v-for="tag in post.tags" :key="tag.id">
                    {{ tag.name }}
                </li>
            </ul>
        </div>
    </article>

</template>

<script>
export default {
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