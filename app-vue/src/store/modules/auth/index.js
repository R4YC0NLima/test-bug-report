import { SET_USER } from './mutation-types';
import axios from "axios";
import Cookie from "@/services/cookie";
import router from "@/router";

const namespaced = true;

const state = {
    data: [],
};

const getters = {
    getUser: state => {
        return state.data;
    },
};

const mutations = {
    [SET_USER]: (state, data) => {
        state.data = data;
    },
};

const actions = {
    // [SET_USER]: ({ commit }, payload) => {
    //     commit(SET_USER, payload);
    // },
    [SET_USER]: ({ commit }, payload) => {
        axios.get('users')
            .then(resp => {
                commit('SET_USER', resp.data, payload)
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
