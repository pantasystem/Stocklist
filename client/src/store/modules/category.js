import axios from 'axios';

export default {
    namespaced: true,
    state: {
        //物用
        categories: [],
    },
    mutations: {
        setCategories: (state, response) => {
            state.categories = response.data;
        },
    },
    getters: {
    },
    actions: {
        async getCategories({ commit }) {
            if (this.state.user.login) {
                await axios
                    .get('/api/categories')
                    .then(response => {
                        commit('setCategories', response);
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }
        }
    },
}