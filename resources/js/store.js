import Vue from 'vue'
import Vuex from 'vuex'
import createPersistedState from 'vuex-persistedstate';

Vue.use(Vuex)

export const store = new Vuex.Store({
    state: {
        skillView: true,
        skill: null,
        view: {
            name: 'home',
            payload: null
        },
        job: {
            jobSelectorCSS: null,
            expanded: {
                id: null
            },
            // For testing only
            jobs: [
                {
                    title: "job1",
                    id: 1
                },
                {
                    title: "job2",
                    id: 2
                },
                {
                    title: "job3",
                    id: 3
                },
                {
                    title: "job4",
                    id: 4
                },
                {
                    title: "job5",
                    id: 5
                },
                {
                    title: "job6",
                    id: 6
                },
                {
                    title: "job7",
                    id: 7
                },
                {
                    title: "job8",
                    id: 8
                }
            ]
        }
    },
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
        hasExpanded(state, n) {
            state.job.expanded = n
        }
    }
})