<template>
    <div class="JobEquipedCont" @click="viewEquipedJob">
        {{equipedJob.title}}
    </div>
</template>

<style scoped>
.JobEquipedCont {
    display: inline;
    word-wrap: nowrap;
    white-space: nowrap;
    line-height: 20px;
    padding: 8px 10px;
    border-radius: 30px;
    background: rgb(95, 0, 112);
    color: white;
    margin: 4px;
}

.JobEquipedCont:hover {
    filter: grayscale(50%);
}
</style>

<script>
export default {
    props: ['equipedJob'],
    methods: {
        /**
         * This method allows user to open a job among its equipedJobs instead of clicking a jobCell from the 
         * jobGrid at the JOB_SELECTOR view
         */
        viewEquipedJob() { 

            /**
             * If jobEquipedCont is clicked while $store.view.name = HOME
             */
            if(this.$store.state.view.name === this.$store.state.viewNames['HOME']) {
                this.$store.commit('viewState', this.$store.state.viewNames['JOB_SELECTOR'])

                /**
                 * This code is to resolve the issue where the job doesn't expand when clicked from the 
                 * jobEquipedCont component WHILE on $store.view.name = HOME
                 */
                let selectedJob = this.findEquipedJob()
                this.$store.commit('jobSelected', selectedJob)
                console.log('i ran')
                /**
                 * but if you resolve the issue where refreshing an expanded job causes faded jobCells but still clickable 
                 * it would be easier
                 */
            }

            /**
             * If jobEquipedCont is clicked while $store.view.name = JOB_SELECTOR
             */
            else{
                let selectedJob = this.findEquipedJob()
                this.$store.commit('jobSelected', selectedJob)
                console.log('i ran 2')
                
            }

            

            
        },
        /**
         * This FN finds and returns the selectedJob Obj among the available jobs
         */
        findEquipedJob() {
            let jobAvailable = this.$store.state.job.availableJobs
            let selectedJob = null

            // Find the selected job among the availableJobs
            for(let i = 0; i < jobAvailable.length; i++){
                if(jobAvailable[i].id === this.equipedJob.job_id) {
                    selectedJob = jobAvailable[i]
                    break
                }
            }

            return selectedJob
        }
    }
}
</script>