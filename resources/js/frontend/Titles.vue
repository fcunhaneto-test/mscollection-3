<template>
    <div class="container is-max-widescreen mt-5">
        <div class="columns">
            <div class="column is-narrow pb-0">
                <h1 class="title is-3">{{ header }} {{ subheader }}</h1>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Titles",
    props: {
        table: String,
    },
    computed: {
        header() { return this.$store.getters.getHeader },
        subheader() { return this.$store.getters.getSubHeader },
    }
}
</script>

<style scoped>

</style>
