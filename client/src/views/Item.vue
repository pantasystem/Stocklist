<template>
    <v-app>

        <Items />
        <ItemAdd />

    </v-app>
</template>

<script>
import Items from '@/components/Items.vue';
import ItemAdd from '@/components/ItemAdd.vue';

export default {
    name: 'Item',
    components:{
        Items,
        ItemAdd,
    }
}
</script>