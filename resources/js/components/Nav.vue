<template>
    <header>
        <nav class="container">
            <div class="flex justify-between items-center">
                <div>
                    Logo
                </div>
                <ul class="flex items-center">
                    <li v-for="link, i in navLinks" :key="i" class="px-2 py-1 hover:bg-amber-200">
                        <router-link :to="{ name: link.name }">
                            {{ link.text }}
                        </router-link>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
</template>

<script>
export default {
    data() {
        return {
            navLinks: [
                {
                    text: 'Home',
                    path: '/',
                    name: 'home',
                },
                {
                    text: 'Chi siamo',
                    path: '/chi-siamo',
                    name: 'about-us'
                },
                {
                    text: 'Blog',
                    path: '/blog',
                    name: 'posts.index'
                },
                {
                    text: 'Contatti',
                    path: '/contatti',
                    name: 'contact-us'
                }
            ]
        }
    },
}
</script>

<style>

    header {
        height: 5vh;
    }

</style>