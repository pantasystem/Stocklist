<template>
    <div>

        <ItemHeader v-if="this.$route.path === '/item'" />
        <ItemDetailsHeader v-if="this.$route.path === '/item/item-details'" />
        <BoxHeader v-if="this.$route.path === '/box'" />

    </div>
</template>

<script>
import ItemHeader from '@/components/item/ItemHeader.vue'
import ItemDetailsHeader from '@/components/item/ItemDetailsHeader.vue'
import BoxHeader from '@/components/box/BoxHeader.vue'

export default {
    name: 'Header',
    components:{
        ItemHeader,
        ItemDetailsHeader,
        BoxHeader,
    }
}
</script>