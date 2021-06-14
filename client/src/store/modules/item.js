import axios from 'axios';

export default {
    namespaced:true,
    state: {
        //物用
        items:[],
        //追加画面用
        dialog: false,
        //一覧用
        keyword: '',
        sort: 0,
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
                await axios
                .get('/api/items')
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