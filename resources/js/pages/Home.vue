<template>
    <div>
        <section class="relative">
            <div class="container flex items-center" :class="'h-screen justify-center'">
                <h1 class="" :class="'text-7xl'">
                    {{ title }}
                </h1>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    data() {
        return {
            title: 'Boolpress',
        }
    },
}
</script>

<style>

</style>