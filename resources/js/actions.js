let actions = {
    getDBJobs({commit}){
        axios.get('/api/selectJobs')
        .then(res => {
            commit('addAvailableJobs', res.data)
        })
        .catch(err => {
            console.log(err)
        })
    },
    setUserDataEquipedJobs({commit}, n) {
        commit('setUserDataEquipedJobs', n)
    }
}

export default actions