<template>
    <div class="pageLevelComponent Charpage">
        <transition name="avatar">
            <div v-if="view === 'home'" class="avatar mx-auto bg-danger" >
                <div class="mx-auto">
                    <img class="userImage " :src="char.image" @click="showJobData" />
                </div>
            </div>
        </transition>
        <div class="userJobsList bg-secondary mx-auto mt-2" :style="userJobsList">
            <div class="addJob mx-auto my-2">
                <div class="ml-4" v-if="char.jobs === null">Add a job</div>
                <div class="ml-4" v-else > JOB LIST </div>
                <plus-button :style="{position: 'relative', top: 5 + 'px'}" @click.native="AddJob"></plus-button>
            </div>
        </div>
        <transition name="jobSelector">
            <job-selector v-if="view === 'jobSelector'" />
        </transition>
    </div>
</template>

<style scoped>
.avatar {
    position: absolute;
    width: 300px;
    top: 10vh;
    left: 43vw;
}

.avatar-enter-active, .avatar-leave-active {
    transition: opacity .5s;
}

.avatar-enter, .avatar-leave-to {
    opacity: 0;
}

.userImage {
    width: 300px;
    height: 600px;
    margin-top: 2%;
}

.userJobsList {
    position: absolute;
    z-index: 3;
    max-width: 40vw;
    overflow-x:auto;
    text-align: center;
    border-radius: 5px;
    transition: ease-in-out .3s top;
}

/**
    JOB DATA SECTION
*/
.addJob {
    display: flex;
    flex-direction: row;
    font-size: 25px;
    width: 200px;
    border: white 1px solid;
}

.addJob > div {
    margin-left: 10px;
}

.jobData {
    position: relative;
    width: 90%;
    height: 900px;
    top: -650px;
    opacity: 0.0;
    z-index: 1;
    transition: opacity 1s;
    transition-delay: z-index 2s;
}

.userJobDataHeader {
    display: flex;
}

.userJobDataHeader > div {
    width: 100%;
    margin: 5px;
}

.userJobDataHeader > img {
    min-height: 300px;
    min-width: 300px;
    margin: 5px;
}


</style>

<script>
import jobSelector from '/var/www/html/skillTree_nonSPA/resources/js/components/job/JobSelector.vue';

export default {
    props: ['user'],
    data() {
        return {
            css: {
                jobData: {
                    zIndex: 1
                }
            },
            char: {
                name: this.user.name,
                image: this.user.image,
                jobs: this.user.jobs
            }
        }
    },
    computed: {
        view: function() {
            return this.$store.state.view.name
        },
        userJobsList: function() {
            let SAMPLEUSERJOB = [] // REPLACE this later with the data from the props
            let top = this.view === "home" ? '65vh' : '91vh'

            if(SAMPLEUSERJOB.length === 0) {
                return {
                    top: top,
                    width: '20vw',
                    left: '40vw',
                }
            }else{
                return {
                    top: top,
                    width: '40vw',
                    left: '30vw',
                }
            }
        }
    },
    methods: {
        AddJob() {
            if(this.view === 'home') {
                this.$store.commit('hasExpanded', null)
                this.$store.commit('viewState', 'jobSelector')
            } else {
                this.$store.commit('viewState', 'home')
            }
        },
    },
    components: {
        'job-selector': jobSelector
    }
}
</script>
