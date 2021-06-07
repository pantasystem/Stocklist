<template>
    <v-app>
        <Details />
    </v-app>
</template>

<script>
import Details from '@/components/ItemDetails.vue';

export default {
    name: 'ItemDetail',
    components:{
        Details,
    },
}
</script>