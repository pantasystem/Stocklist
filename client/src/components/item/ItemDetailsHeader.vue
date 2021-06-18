<template>
    <div style="text-align: right;">
        <v-btn @click="$router.push({ path: '/item' })" icon>
            <v-icon>mdi-arrow-left-bold</v-icon>
        </v-btn>
        <v-btn @click="edit" icon>
            <v-icon>mdi-briefcase-edit</v-icon>
        </v-btn>
    </div>
</template>

<script>
export default {
    name: 'ItemAdd',
    methods:{
        edit(){
            if(this.$store.state.item.itemEdit != null){
                this.$store.state.item.itemEdit = true
            }
        }
    }
}
</script>