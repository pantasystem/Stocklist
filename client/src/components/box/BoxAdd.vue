<template>
    <v-app class="modal-window">
        <v-dialog v-model="$store.state.box.boxAddFlag" max-width="600px">
            <v-card>

                <v-card-title>
                    <span class="headline">追加</span>
                    <v-spacer></v-spacer>
                    <v-btn icon @click="$store.state.box.boxAddFlag = false">
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
        </v-dialog>
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
            .post("/api/boxes", {
                "name": this.name,
                "description": this.description
            })
            .then(() => {
                this.$store.dispatch('box/getBoxes')
                this.$store.state.box.boxAddFlag = false;
            })
            .catch(error => {
                console.log(error);
            });
        },
    }
}
</script>

<style scoped>
.modal-window{
    position:fixed;
}
</style>