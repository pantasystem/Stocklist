<template>
    <v-app>

        <v-container class="con">
            <form>
                    
                <v-flex>
                    <v-text-field label="名前" prepend-icon="mdi-archive" v-model="name"/>
                </v-flex>

                <v-flex>
                    <v-textarea filled label="説明" prepend-icon="mdi-card-text" v-model="description" />
                </v-flex>

                <v-btn @click="BoxEdit" block dark>編集</v-btn>

            </form>
        </v-container>
    </v-app>
</template>

<script>
import axios from 'axios'

export default {
    name: 'BoxEdit',
    data:()=>{
        return{
            id: null,
            name: null,
            description: null,
        }
    },
    methods:{
        BoxEdit() {
            if(this.name != this.box[0].name || this.description != this.box[0].description){
                axios
                .put("/api/boxes/" + this.id, {
                    "name": this.name,
                    "description": this.description
                })
                .then(() => {
                    this.$router.push('/box/' + this.id);            
                    this.$store.dispatch('box/getBoxes')
                    alert('変更しました')
                })
                .catch(error => {
                    console.log(error);
                });
            }
        },
    },
    computed:{
        box(){
            return this.$store.state.box.boxes.filter(boxa => boxa.id == this.id)
        },
    },
    created(){
        this.id = this.$route.params.id
        if(this.box.length === 0){
            this.$router.push('/box');
        }
        this.name = this.box[0].name
        this.description = this.box[0].description
    },
}
</script>

<style scoped>

.con {
    margin-top: 10%;
    max-width: 1000px;
    text-align: center;
}

</style>