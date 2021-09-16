<template>
    <v-app>
        
        <BoxEdit />
    
    </v-app>
</template>

<script>
import BoxEdit from '@/components/box/BoxEdit.vue';

export default {
    name: 'Item',
    components:{
        BoxEdit,
    }
}
</script>