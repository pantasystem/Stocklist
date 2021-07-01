import axios from 'axios';

export default {
    namespaced:true,
    state: {
        //物用
        boxes:[],
        boxAddFlag: false,
    },
    mutations: {
        setBoxes: (state, response) => {
            state.boxes = response.data;
        },
    },
    getters:{
    },
    actions: {
        async getBoxes({ commit }){
            if(this.state.user.login){
                await axios
                .get('/api/boxes')
                .then( response =>{
                    commit('setBoxes', response);
                })
                .catch(error => {
                    console.log(error);
                });
            }
        }
    },
}