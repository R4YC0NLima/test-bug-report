import Cookie from '@/services/cookie';
import axios from 'axios';
import store from '@/store';

export default {
    async redirectIfNotAuthenticated(to, from, next) {
        const token = Cookie.getToken();

        if (!token) {
            next({ name: 'login' });
        }

        // Checar se o token está válido
        await axios.get('me').then((response) => {
            if (!store?.state?.user?.id) {
                store.commit('user/SET_USER', response.data.data);
            }
        }).catch(() => {
            Cookie.deleteToken();
            Cookie.removeCookie();
            next({ name: 'login' });
        });

        next();
    },
    redirectIfAuthenticated(to, from, next) {
        const token = Cookie.getToken();
        let n;

        if (token) {
            n = { name: 'index' };
        }

        next(n);
    },
};
