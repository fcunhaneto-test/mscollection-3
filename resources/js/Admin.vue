<template>
    <router-view></router-view>
</template>

<script>
export default {
    name: "Admin",
    props: {
        header: String,
        subheader: String,
    },
    created() {
        this.$store.commit('SET_HEADER', this.header)
        this.$store.commit('SET_SUB_HEADER', this.subheader)
        this.$store.commit('SET_CHANNEL', this.$route.params.channel)
    }
}
</script>

<style scoped>

</style>
