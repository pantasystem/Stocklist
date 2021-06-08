import axios from 'axios';

export default {
    namespaced:true,
    state: {
        items:[],
    },
    mutations: {
        setItems: (state, response) => {
            state.items = response.data;
        },
    },
    getters:{
    },
    actions: {
        async getItems({ commit }){
            if(this.state.user.login){
                await axios.get('/api/items')
                .then( response =>{
                    commit('setItems', response);
                })
                .catch(error => {
                    console.log(error);
                });
            }
        }
    },
}