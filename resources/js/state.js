let state = {
        user: null,
        skillView: true,
        skill: null,
        view: {
            name: 'HOME',
            payload: null
        },
        job: {
            availableJobs: [],
            jobSelectorCSS: null,
            selectedJob: null,
            safeToExpand: false,
        },
        /**
         * These are the names of the available view states 
         * - send as a payload whenever using mutation this.$store.commit('viewState',<viewNames>)
         */
        viewNames: {
            HOME :          'HOME',
            JOB_SELECTOR :  'JOB_SELECTOR',
            JOB_SELECTED :  'JOB_SELECTED'
        }
}

export default state