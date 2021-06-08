import axios from 'axios';

export default {
    namespaced:true,
    state: {
        items:[],
    },
    mutations: {
        setItems: (state, payload) => {
            state.items = payload.data;
        },
    },
    getters:{
    },
    actions: {
        async getItems({ commit }){
            if(this.state.user.login){
                const payload = {
                    data: '',
                };
                await axios.get('/api/items')
                .then( response =>{
                    payload.data = response.data;
                    commit('setItems', payload);
                })
                .catch(error => {
                    console.log(error);
                });
            }
        }
    },
}