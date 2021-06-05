<template>
    <v-app>
        <p>dateils</p>
        <p> {{ this.$route.params.id }} </p>
    </v-app>
</template>

<script>
export default {
    name: 'Item',
}
</script>