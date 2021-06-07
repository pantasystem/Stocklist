<template>
    <v-app>
        <p>datails</p>
        <p> {{ this.$route.params.id }} </p>
        <!-- <div v-for="item in items" :key="item.id">
            {{item.name}}
        </div> -->
        <p>{{this.$store.state.item.items}}</p>
    </v-app>
</template>

<script>
    export default {
        name: 'ItemDetails',
    }
</script>