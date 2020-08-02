<template>
    <div class="jobGrid" id="jobGrid" >
        <job-cell v-for="(job, index) in jobs" :key="job.id" :job="job" :index="index"/>
    </div>
</template>

<style scoped>
.jobGrid {
    display: grid;
    grid-template-columns: 10% 10% 10% 10% 10% 10% 10% ;
    grid-template-rows: 25% 25% 25% 25% ;
    grid-column-gap: 5%;
    grid-row-gap: 3%;
    overflow: hidden;
    
    margin: auto;
    margin-top: 2%;
    width: 90%;
    height: 90%;
    max-width: 90%;
    max-height: 90%;
}
</style>

<script>
import JobCell from './JobCell'

export default {
    data() {
        return {
            jobs: this.$store.state.job.availableJobs   
        }
    },
    components: {
        'job-cell': JobCell
    },
    created() {
        //this.$store.commit('jobSelected', null)
    },
    mounted() {
        let parent = document.getElementById('jobGrid')
        this.$store.commit('getGridCSS', parent.getBoundingClientRect())
        
        //this.$store.commit('jobSelected', null)
    }
}
</script>

