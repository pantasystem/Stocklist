<template>
    <div>
        
        <BoxAdd />
        
        <v-data-table
            :headers="headers"
            :items="this.$store.state.box.boxes"
            :items-per-page="10"
        >
            <template v-slot:[`item.actions`]="{ item }">
                <v-btn
                    icon
                    :to="{ name: 'BoxEdit', query: {id: item.id} }"
                >
                    <v-icon dark>
                        mdi-pencil
                    </v-icon>
                </v-btn>
            </template>
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
                value: 'id',
                align: 'start',
                sortable:false,
            },
            { text: 'Name', value: 'name' },
            { text: 'Count', value: 'stocks_count' },
            { text: 'Created', value: 'created_at' },
            { text: 'Description', value: 'description' },
            { text: 'Home_id', value: 'home_id' },
            { text: 'Edit', value: 'actions' },
        ],
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