<template>
    <!--
        This component changes if : 
        1.  no job equiped && view === 'home'           THEN small width, text = 'add a job', plus button
        1.1 no job equiped && view === 'jobSelector'    THEN small width, text = 'select a job, plus button 
        1.2 no job equiped && view === 'jobSelected'    THEN small width, no text,'equip/remove' button

        2   a job is equiped && view === 'home'         THEN max-content width, no text, plus button, with jobCont
        2.2 a job is equiped && view === 'jobSelector'  THEN max-content width, no text, back-arrow button, with jobCont
        2.3 a job is equiped && view === 'jobSelected'  THEN 'equip/remove' button, no text/jobCont
    -->
    <div class="jobChanger myc" :class="{
            equipRemoveButtonWidth: jobChangerWidth === 0,
            zeroJobsEquiped: jobChangerWidth === 1, 
            nonZeroJobsEquiped: jobChangerWidth === 2 
    }">
        <div v-if="selectedJob !== null" class="AddOrRemoveJobCont">
            <div :class="{ addRemoveJobButton: true , remove: isJobEquiped, equip: !isJobEquiped }" @click.stop="addOrRemoveJob">
                {{ isJobEquiped ? 'Unequip' : 'Equip'}}
            </div>
        </div>
        <div v-else class="jobListCont" >
            <JobEquipedCont v-for="job in equipedJobs" :key="job.id" :equipedJob="job" />
        </div>
        <div v-if="!(selectedJob !== null)" class="textAndButtonCont" >
            <div v-if="equipedJobs.length === 0" class="text">
                {{ text }} &nbsp 
            </div>
            <back-arrow-button @click.native="addJob" v-if="view === this.$store.state.viewNames['JOB_SELECTOR']" class="backArrowButton" />
            <plus-button @click.native="addJob" v-else-if="view === this.$store.state.viewNames['HOME']" class="plusButton"/>
        </div>
    </div>
</template>

<style scoped>
.jobChanger {
    display: flex;
    justify-content: center;
    align-items: center;
    padding-left: 7px;
    padding-right: 7px;
    height: 60px;
    width: 0px;
    background: grey;
    border-radius: 40px;
    margin: 0px auto 0px auto;
    position: relative;
}

.jobChanger .jobListCont {
    background: rgb(87, 87, 87);
    overflow-x: auto;
    border-radius: 100px;
    width: 100%;
    height: 51px;
    line-height: 50px;
}

.jobChanger .AddOrRemoveJobCont {
    height: 43px;
    width: 100%;
}

.addRemoveJobButton {
    width: 100%;
    line-height: 45px;
    border-radius: 30px;
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

/** JobList scrollbar only */
.jobListCont::-webkit-scrollbar {
    height: 0px;
}
/** JobList scrollbar only */

.equipRemoveButtonWidth {
    width: 150px;
}

.textAndButtonCont {
    position: absolute;
    right: 6px;
    top: 17%;
    display:flex;
    width: max-content;
}

.textAndButtonCont .text {
    margin: auto 5px auto 5px;
    font-size: 20px;
}

.backArrowButton {
    font-size: 40px;
}

.plusButton {
    font-size: 38px;
    height: 40px;
    width: 40px;
}

@media only screen and (min-width: 500px) {
    .zeroJobsEquiped {
        /* background: yellow; */
        width: 50vw;
    }    

    .nonZeroJobsEquiped {
        max-width: 70vw;
    }
}

@media only screen and (min-width: 800px) {
    .zeroJobsEquiped {
        /* background: green; */
        width: 40vw;
    }  

    .nonZeroJobsEquiped {
        max-width: 60vw;
    }  
}

@media only screen and (min-width: 1080px) {
    .zeroJobsEquiped {
        /* background: purple; */
        width: 30vw;
        
    }  

    .nonZeroJobsEquiped {
        max-width: 50vw;
    } 
}

@media only screen and (min-width: 1500px) {
    .zeroJobsEquiped {
        background: black;
        max-width: 10vw;
    }   
    
    .nonZeroJobsEquiped {
        width: max-content;
        min-width: 15vw;
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
            return this.view === this.$store.state.viewNames['HOME'] ? 'Add a job' : 'Select a job'
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
        },
        jobChangerWidth() {
            if(this.selectedJob)                    return 0
            else if(this.equipedJobs.length === 0)  return 1
            else if(this.equipedJobs.length > 0)    return 2
        }
    },
    methods: {
        addJob() {
            if(this.$store.state.view.name === this.$store.state.viewNames['HOME']) {
                this.$store.commit('viewState', this.$store.state.viewNames['JOB_SELECTOR'])
            }
            else if(this.$store.state.view.name === this.$store.state.viewNames['JOB_SELECTOR']) {
                this.$store.commit('viewState', this.$store.state.viewNames['HOME'])
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
                confirm("Unequiping this job will delete all your progress. Are you sure you want to continue?")
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