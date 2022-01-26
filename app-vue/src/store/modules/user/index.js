import axios from 'axios'
import { SET_USER, GET_USER, LOADING, GET_ISADMIN } from './mutation-types';
const namespaced = true;

const state = {
    users: [],
    user: {
        admin: false
    },
    loading : false
};

const getters = {
    getUsers: state => {
        return state.users;
    },
    getUserLogged: state => {
        return state.user;
    },
    getIsAdmin: state => {
        return state.user.admin
    },
    getLoading: state => {
        return state.loading
    }
};

const mutations = {
    [GET_USER]: (state, users) => {
        state.users = users;
    },
    [SET_USER]: (state, user) => {
        state.user = user;
    },
    [LOADING]: (state, payload) => {
        state.loading   = payload.newValue
    }
};

const actions = {
    [GET_USER]: async ({ commit }) => {
        await axios.get('users')
            .then(resp => {
                commit('GET_USER', resp.data)
            });
    },
    [SET_USER]: ({ commit }, payload) => {
        commit(SET_USER, payload);
    },
};

export default {
    namespaced,
    state,
    getters,
    mutations,
    actions,
};
