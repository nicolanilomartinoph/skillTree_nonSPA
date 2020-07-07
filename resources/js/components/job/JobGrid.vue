<template>
    <div class="jobGrid" id="jobGrid" :style="jobGridCSS">
        <job-cell v-for="job in jobs" :key="job.id" :job="job" />
    </div>
</template>

<style scoped>
.jobGrid {
    display: grid;
    grid-template-columns: 10% 10% 10% 10% 10% 10% 10% ;
    grid-template-rows: 25% 25% 25% 25% ;
    grid-column-gap: 5%;
    grid-row-gap: 3%;
    
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
    computed: {
        /**
         * This only prevents scroll bar from showing briefly during expansion/minimizing, no intented feature
         */
        jobGridCSS() {
            let aChildIsExpanded = this.$store.state.job.selectedJob === null? false : true

            return {
                overflow: aChildIsExpanded? 'hidden' : 'auto'
            }
        }
    },
    components: {
        'job-cell': JobCell
    },
    mounted() {
        let parent = document.getElementById('jobGrid')
        this.$store.commit('getGridCSS', parent.getBoundingClientRect())
    }
}
</script>

