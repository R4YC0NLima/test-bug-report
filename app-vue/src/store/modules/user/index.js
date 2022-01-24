import axios from 'axios'
import { SET_USER, LOADING } from './mutation-types';
const namespaced = true;

const state = {
    data: {},
    loading : false
};

const getters = {
    getUsers: state => {
        return state.data;
    },
    getLoading: state => {
        return state.loading
    }
};

const mutations = {
    [SET_USER]: (state, bugs) => {
        state.data = bugs;
    },
    [LOADING]: (state, payload) => {
        state.loading   = payload.newValue
    }
};

const actions = {

    SET_USER ({ commit }) {
        axios.get('users')
            .then(resp => {
                commit('SET_USER', resp.data)
            });
    },
};

export default {
    namespaced,
    state,
    getters,
    mutations,
    actions,
};
