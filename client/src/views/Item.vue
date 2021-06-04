<template>
    <v-app>

        <Items />

    </v-app>
</template>

<script>
import Items from '@/components/Items.vue';

export default {
    name: 'Item',
    components:{
        Items,
    }
}
</script>