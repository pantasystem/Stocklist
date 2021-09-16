<template>
    <v-app>
        <v-card width="600px" style="margin: 60px auto;">

            <v-card-title>
                <span class="headline">編集</span>
                <v-spacer></v-spacer>
                <v-btn icon :to="'/box'">
                <v-icon>mdi-close</v-icon>
                </v-btn>
            </v-card-title>

            <form>

                <v-card-text>
                    <v-container>
                        
                        <v-flex>
                            <v-text-field label="名前" prepend-icon="mdi-archive" v-model="name" />
                        </v-flex>

                        <v-flex>
                            <v-textarea filled label="説明" prepend-icon="mdi-card-text" v-model="description" />
                        </v-flex>

                    </v-container>
                </v-card-text>

                <v-card-actions>
                    <v-container>
                        <v-btn @click="BoxAdd" block dark>追加</v-btn>
                    </v-container>
                </v-card-actions>

            </form>

        </v-card>
    </v-app>
</template>

<script>
import axios from 'axios';

export default {
    name: 'BoxAdd',
    data:()=>{return{
        name: null,
        description: null,
    }},
    methods:{
        BoxAdd() {
            axios
            .put("/api/boxes/" + this.$route.query.id , {
                "name": this.name,
                "description": this.description
            })
            .then(() => {
                this.$store.dispatch('box/getBoxes')
                this.$store.state.box.boxAddFlag = false;
                this.$router.push('/box')
            })
            .catch(error => {
                console.log(error);
            });
        },
        add(){
            var box = this.$store.state.box.boxes.filter(box => {
                return box.id === this.$route.query.id
            })
            if(box[0] != null){
                this.name = box[0].name
                this.description = box[0].description
            }
        },
    },
    mounted(){
        this.add()
    },
    created(){
        this.$store.dispatch('box/getBoxes')
    }
}
</script>

<style scoped>
.modal-window{
    position:fixed;
}
</style>