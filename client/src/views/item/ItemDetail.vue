<template>
    <v-app>
        <Details />
    </v-app>
</template>

<script>
import Details from '@/components/item/ItemDetails.vue';

export default {
    name: 'ItemDetail',
    components:{
        Details,
    },
}
</script>