<template>
    <div>
        
        <BoxAdd />
        
        <v-data-table
            :headers="headers"
            :items="this.$store.state.box.boxes"
            :items-per-page="10"
            @click:row="this.edit"
        >
        </v-data-table>
    </div>
</template>

<script>
import BoxAdd from '@/components/box/BoxAdd.vue'

export default {
    name: 'Box',
    components:{
        BoxAdd,
    },
    data () {
        return {
            headers: [
            {
                text: 'ID',
                align: 'start',
                value: 'id',
            },
            { text: 'Name', value: 'name' },
            { text: 'Count', value: 'stocks_count' },
            { text: 'Created', value: 'created_at' },
            { text: 'Description', value: 'description' },
            { text: 'Home_id', value: 'home_id' },
        ],
        }
    },
    methods:{
        edit(data){
            this.$router.push({ path: `/box/${data.id}` })
        }
    },
    created(){
        this.$store.dispatch('box/getBoxes')
    }
}
</script>
<style scoped>
    .data{
        height: 100px;
    }
</style>