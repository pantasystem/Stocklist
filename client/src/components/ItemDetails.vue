<template>
    <v-app>
        <h1>details</h1>
        <p>
            {{item}}
        </p>
    </v-app>
</template>

<script>
    export default {
        name: 'ItemDetails',
        computed: {
            item(){
                return this.$store.state.item.items[this.$route.params.id]
            }
        },
    }
</script>