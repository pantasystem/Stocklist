import axios from 'axios';

export default {
    namespaced:true,
    state: {
        //物用
        stocks:[],
    },
    mutations: {
        setStocks: (state, response) => {
            state.stocks = response.data;
        },
    },
    getters:{
    },
    actions: {
        async getStocks({ commit }){
            if(this.state.user.login){
                await axios
                .get('/api/stocks')
                .then( response =>{
                    commit('setStocks', response);
                })
                .catch(error => {
                    console.log(error);
                });
            }
        }
    },
}