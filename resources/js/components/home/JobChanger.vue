<template>
    <!--
        This component changes if : 
        1.  no job equiped && view === 'home'           THEN small width, text = 'add a job', plus button
        1.1 no job equiped && view === 'jobSelector'    THEN small width, text = 'select a job, plus button 
        1.2 no job equiped && view === 'jobSelected'    THEN small width, add or equip button

        2   a job is equiped && view === 'home'         THEN max width, no text, plus button, with jobCont
        2.2 a job is equiped && view === 'jobSelector'  THEN max width, no text, back-arrow button, with jobCont
        2.3 a job is equiped && view === 'jobSelected'  THEN add or equip button
    -->
    <div class="jobChanger" :class="{ zeroJobsEquiped: equipedJobs.length === 0, nonZeroJobsEquiped: equipedJobs.length > 0 }">
        <div v-if="selectedJob !== null" class="AddOrRemoveJobCont">
            <div :class="{ addRemoveJobButton: true , remove: isJobEquiped, equip: !isJobEquiped }" @click.stop="addOrRemoveJob">
                {{ isJobEquiped ? 'Unequip' : 'Equip'}}
            </div>
        </div>
        <div v-else class="jobListCont" >
            <div  v-if="equipedJobs > 0" class="jobCont bg-danger">
                <JobEquipedCont v-for="job in equipedJob" :key="job.id" />
            </div>
            <div class="textAndButtonCont" :class="{ textAndButtonContNoJob: equipedJobs.length === 0, textAndButtonContWithJob: equipedJobs.length > 0}" >
                <div class="text">
                    {{ text }} &nbsp 
                </div>
                <back-arrow-button @click.native="addJob" v-if="view === 'jobSelector'" class="backArrowButton" />
                <plus-button @click.native="addJob" v-else-if="view === 'home'" />
            </div>
        </div>
    </div>
</template>

<style scoped>
.jobChanger {
    height: 50px;
    background: grey;
    border-radius: 30px;
    margin: 0px auto 0px auto;
    padding: 5px;
}

.jobChanger .AddOrRemoveJobCont {
    height: 40px;
}

.addRemoveJobButton {
    width: 100%;
    height: 100%;
    border-radius: 30px;
    border: solid black 1px;
    font-size: 25px;
    text-align: center;
}

.remove {
    background: red;
    color: white;
}

.equip {
    background: green;
    color: white;
}

.addRemoveJobButton:active {
    border: none;
    outline: none;
}

.addRemoveJobButton:hover {
    filter: grayscale(50%);
}

.jobChanger .jobListCont {
    position: relative;
    display: flex;
    height: 40px;
    text-align: center;
    border-radius: 30px;
    margin: auto;
}

.jobCont {
    width: 50px;
}

.textAndButtonCont {
    display:flex;
    width: max-content;
}

.textAndButtonContNoJob {
    margin: auto;
}

.textAndButtonContWithJob {
    position: absolute;
    right: 5px;
}

.textAndButtonCont .text {
    margin: auto 5px auto 5px;
    font-size: 20px;
}

.backArrowButton {
    font-size: 32px;
}

.jobListCont .jobList {
    display: flex;
    flex-direction: row;
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

@media only screen and (min-width: 500px) {
    .zeroJobsEquiped {
        /* background: yellow; */
        min-width: 50vw;
        width: 50vw;
    }    

    .nonZeroJobsEquiped {
        max-width: 70vw;
    }
}

@media only screen and (min-width: 800px) {
    .zeroJobsEquiped {
        /* background: green; */
        min-width: 40vw;
        width: 40vw;
    }  

    .nonZeroJobsEquiped {
        max-width: 60vw;
    }  
}

@media only screen and (min-width: 1080px) {
    .zeroJobsEquiped {
        /* background: purple; */
        min-width: 30vw;
        width: 30vw;
    }  

    .nonZeroJobsEquiped {
        max-width: 50vw;
    } 
}

@media only screen and (min-width: 1500px) {
    .zeroJobsEquiped {
        /* background: black; */
        min-width: 20vw;
        width: 20vw;
    }   
    
    .nonZeroJobsEquiped {
        width: max-content;
        min-width: 10vw;
        max-width: 40vw;
    }
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
            return this.$store.state.user.userJobs
        },
        selectedJob() {
            return this.$store.state.job.selectedJob
        },
        view() {
            return this.$store.state.view.name
        },
        text() {
            return this.view === 'home' ? 'Add a job' : 'Select a job'
        },
        /**
         * Asks if the current selected Job is already equiped by the user
         */
        isJobEquiped() {
            let selectedJob = this.$store.state.job.selectedJob
            let shouldEquipJob = null
            let nEquipedJobs = this.equipedJobs.length 
            
            if(selectedJob !== null) {
                for(let i = 0; i < nEquipedJobs; i++) {
                    if(this.selectedJob.id === this.equipedJobs[i].job_id) {
                        return true
                    }
                }
            }
            return false
        }
    },
    methods: {
        addJob() {
            if(this.$store.state.view.name === 'home') {
                this.$store.commit('viewState', 'jobSelector')
            }
            else if(this.$store.state.view.name === 'jobSelector') {
                this.$store.commit('viewState', 'home')
            }
        },
        addOrRemoveJob() {
            /**
             * This will add or remove the selectedJob from the userJobs in DB 
             * and return a new array of user_jobs on the client
             */
            
            if(!this.isJobEquiped) {
                axios.post('/addUserJob', { job: this.selectedJob.id })
                .then(res => this.$store.dispatch('setUserDataEquipedJobs', res.data ))
                .catch(err => console.log(err))
            }else{
                axios.post('/removeUserJob', { job: this.selectedJob.id })
                .then(res => this.$store.dispatch('setUserDataEquipedJobs', res.data ))
                .catch(err => console.log(err))
            }
            
            /**
             * COMPLETE ROUTE
             * 1 add/remove selectedJob in userJobs
             * 2 change UI that DB is being updated
             * 3 change UI that DB is updated
             * 4 return the updated userEquipedJobs to the client
             */

             /**
                can add job in DB
              */

        },
        test() {
            console.log("testing method")
        }
    },
    components: { JobEquipedCont },
    created() {
        this.$store.dispatch('getDBJobs')
    }
}
</script>