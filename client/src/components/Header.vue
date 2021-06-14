<template>
    <div>

        <ItemHeader v-if="this.$route.path === '/item'" />

    </div>
</template>

<script>
import ItemHeader from '@/components/item/ItemHeader.vue'

export default {
    name: 'Header',
    components:{
        ItemHeader,
    }
}
</script>