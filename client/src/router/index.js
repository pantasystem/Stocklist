import Vue from 'vue'
import VueRouter from 'vue-router'

import Home from '../views/Home.vue'
import Login from '../views/Login.vue'
import Item from '../views/Item.vue'

// import store from '../store/index'

Vue.use(VueRouter)


const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home,
        meta: {
            requiresAuth: true,
        }
    },
    {
        path: '/login',
        name: 'Login',
        component: Login
    },
    {
        path: '/item',
        name: 'Item',
        component: Item,
        meta: {
            requiresAuth: true
        }
    }
]

const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes
})

router.beforeEach((to, from, next) => {
    // if(to.matched.some(record => record.meta.requiresAuth) && !store.state.user.login) {
    //     next('/login');
    // }else{
    //     next();
    // }
    next(); //いちいちログイン面倒
})

export default router
