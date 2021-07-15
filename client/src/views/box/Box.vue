<template>
    <v-app>
        
        <Boxes />
    
    </v-app>
</template>

<script>
import Boxes from '@/components/box/Boxes.vue';

export default {
    name: 'Item',
    components:{
        Boxes,
    }
}
</script>