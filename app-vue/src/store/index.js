import { createStore } from 'vuex'
import user from '@/store/modules/user';
import bug from '@/store/modules/bug';


export default createStore({
    state: {},
    mutations: {},
    actions: {},
    modules: {
        user,
        bug,
    },
    plugins: [
    ]
})
