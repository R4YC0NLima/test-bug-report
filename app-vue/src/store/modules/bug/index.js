import axios from 'axios'
const namespaced = true;

const state = {
    bugs: [],
    loading : false
};

const getters = {
    getBug: state => {
        return state.bugs;
    },
    getLoading: state => {
        return state.loading
    }
};

const mutations = {
    SET_BUG: (state, bugs) => {
        state.bugs = bugs;
    },
    LOADING: (state, payload) => {
        state.loading   = payload.newValue
    }
};

const actions = {

    SET_BUG ({ commit }) {
        axios.get('bugs')
            .then(resp => {
                commit('SET_BUG', resp.data)
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
