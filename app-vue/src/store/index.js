import { createStore } from 'vuex'
import auth from '@/store/modules/auth';
import user from '@/store/modules/user';
import bug from '@/store/modules/bug';


export default createStore({
    state: {},
    mutations: {},
    actions: {},
    modules: {
        bug,
        user,
    },
    plugins: [
    ]
})
