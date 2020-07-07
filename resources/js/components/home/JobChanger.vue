<template>
    <div class="jobChanger bg-secondary mx-auto mt-2" :class="{ zeroJobsEquiped: equipedJobs.length === 0 }">
        <div class="jobListCont">
            <div v-if="equipedJobs.length > 0" class="jobList">
                <JobEquipedCont v-for="job in equipedJobs" :key="job.id" :equipedJob="job"/>
            </div>
        </div>
        <div v-if="equipedJobs.length > 0" class="AddJobCont bg-secondary" :style="jobChanger">
            <plus-button/>
        </div> 
        <div v-if="equipedJobs.length === 0" class="addAJobCont2" >
            <div class="addAJobText" :style="jobChanger">
                {{ text }} &nbsp
            </div>
            <div>
                <plus-button />
            </div>
        </div>
    </div>
</template>

<style scoped>
.zeroJobsEquiped {
    width: 20vw;
}

.addAJobText {
    font-size: 1.5em;
}

.addAJobCont {
    position: relative;
    top: 20%;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 24%;
    margin-left: 38%;
    margin-right: 38%;
}

.addAJobCont2 {
    position: relative;
    top: 20%;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 70%;
    margin-left: 15%;
    margin-right: 15%;
}

.jobChanger {
    max-width: 30vw;
    height: 50px;
    overflow-x: auto;
    border-radius: 30px;
    transition: ease-in-out .3s top;
}

.jobListCont {
    position: absolute;
    flex-direction: row;
    left: 4%;
    top: 10%;
    width: 92%;
    max-width: 92%;
    height: 90%;
    overflow-x: auto;
    overflow-y: hidden;
}

.jobListCont .jobList {
    display: flex;
    flex-direction: row;
    background: grey;
    border-radius: 15px;
    justify-content:space-evenly;
}

.jobListCont::-webkit-scrollbar {
    height: 10px;
    border-radius: 3px;
}

.jobListCont::-webkit-scrollbar-track {
    background: transparent;
    
}

.jobListCont::-webkit-scrollbar-thumb {
    background: grey;
    border-radius: 5px;
    border: 1px solid white;
}

.AddJobCont {
    position: absolute;
    display: flex;
    align-items: center;
    top: 10%;
    left: 91.5%;
    width: 5%;
    width: 40px;
    height: 40px;
    border-radius: 50px;
    z-index: 2;
}
</style>

<script>
import JobEquipedCont from './JobEquipedCont.vue'

export default {
    /**
     * This component houses the: 
     * - current job the player has
     * - when selecting a job, this changes from (ADD / REMOVE ) job
     * - if the current selected job and equiped job are the same, ADD button is disabled, only remove is enabled
     * - if the current selected job and equiped job are not the same, REMOVE button is disabled, only REMOVE is enabled
     */
    data() {
        return {
            jobChanger: {
                top: 0
            }
        }
    },
    computed: {
        equipedJobs() {
            return this.$store.state.job.equipedJobs
        },
        view() {
            return this.$store.state.view.name
        },
        text() {
            return this.view === 'home' ? 'Add a job' : 'Select a job'
        }
    },
    methods: {
        addJob() {
            // axios call for available jobs

            /**
             * WHERE IS LEFT OFF 
             * call the DB it query for available jobs
             * 
             * 
             */

            if(this.$store.state.view.name === 'home') {
                this.$store.commit('viewState', 'jobSelector')
            }
            else if(this.$store.state.view.name === 'jobSelector') {
                this.$store.commit('viewState', 'home')
            }
        }
    },
    components: {
        JobEquipedCont
    },
    created() {
        this.$store.dispatch('getDBJobs')
    }
}
</script>