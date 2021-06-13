<template>
    <v-app>
        
        <Items />
        <ItemAdd />
    
    </v-app>
</template>

<script>
import Items from '@/components/item/Items.vue';
import ItemAdd from '@/components/item/ItemAdd.vue';

export default {
    name: 'Item',
    components:{
        Items,
        ItemAdd,
    }
}
</script>