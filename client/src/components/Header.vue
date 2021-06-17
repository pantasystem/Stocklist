<template>
    <div>

        <ItemHeader v-if="this.$route.path === '/item'" />
        <ItemDetailsHeader v-if="this.$route.path === '/item/item-details'" />

    </div>
</template>

<script>
import ItemHeader from '@/components/item/ItemHeader.vue'
import ItemDetailsHeader from '@/components/item/ItemDetailsHeader.vue'

export default {
    name: 'Header',
    components:{
        ItemHeader,
        ItemDetailsHeader,
    }
}
</script>