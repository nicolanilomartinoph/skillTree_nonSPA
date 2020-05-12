import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export const store = new Vuex.store({
    state: {
        skills: {
            0: "HTML", 1: "CSS", 2: "Javascript"
        }
    }
})