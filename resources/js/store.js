import Vue from 'vue'
import Vuex from 'vuex'
import state from './state'
import createPersistedState from 'vuex-persistedstate';

Vue.use(Vuex)

export const store = new Vuex.Store({
    state,
    plugins: [createPersistedState()],
    mutations: {
        /**
         *  Skill tree
         */
        skillSubjectToggler(state, n) {
            if(n) state.skill = n
            state.skillView = !state.skillView
        },
        viewState(state, n) {
            state.view.name = n
        },
        /**
         *  JobSelector
         */
        getGridCSS(state, n) {
            state.job.jobSelectorCSS = n
        },
        jobSelected(state, n) {
            state.job.selectedJob = n
        },
        addAvailableJobs(state, n) {
            state.job.availableJobs = n
        }
    },
    actions: {
        getDBJobs({commit}){
            axios.get('/api/selectJobs')
            .then(res => {
                commit('addAvailableJobs', res.data)
            })
            .catch(err => {
                console.log(err)
            })
        }
    }
})