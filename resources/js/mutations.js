let mutations = {
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
    },
    setUserData(state, n) {
        state.user = n
    },
    setUserDataEquipedJobs(state, n) {
        state.user.userJobs = n
    },
    safeToExpand(state, n) {
        state.job.safeToExpand = n
    }
}

export default mutations