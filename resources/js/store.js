import Vue from 'vue'
import Vuex from 'vuex'
import createPersistedState from 'vuex-persistedstate';

Vue.use(Vuex)

export const store = new Vuex.Store({
    state: {
        skillView: true,
        skill: null
    },
    plugins: [createPersistedState()],
    mutations: {
        skillSubjectToggler(state, n) {
            if(n) state.skill = n
            state.skillView = !state.skillView 
        }
    }
})