<template>
    <!-- THIS IS A PAGE LEVEL COMPONENT -->
    <div class="pageLevelComponent">
        <transition name="avatar">
            <div class="absoluteCont">
                <div v-if="view === 'home'" class="avatar" >
                    <div class="mx-auto">
                        <img class="userImage " :src="char.image" />
                    </div>
                </div>
            </div>
        </transition>
        <div class="absoluteCont jobChangerCont" :style="jobChangerCont">
            <job-changer @click.native="addJob"/> <!-- is the button that shows EquipedJobs and AddJob button -->
        </div>
        <transition name="jobSelector">
            <job-selector v-if="view === 'jobSelector'" />
        </transition>
    </div>
</template>

<style scoped>
.absoluteCont {
    position: absolute;
    width: 100%;
}

.jobChangerCont {
    top: 70%;
    transition: top .5s;
    z-index: 3;
}

.avatar {   
    position: relative;
    width: 300px;
    margin: auto;
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
import jobChanger from '/var/www/html/skillTree_nonSPA/resources/js/components/home/JobChanger.vue';

export default {
    props: ['user'],
    data() {
        return {
            char: {
                name: this.user.name,
                image: this.user.image,
                jobs: this.user.jobs
            },
            
        }
    },
    computed: {
        view: function() {
            return this.$store.state.view.name
        },
        jobChangerCont() {
            return {top: this.view === 'home' ? '70%' : '90%'}
        }
    },
    methods: {
        addJob() {
            if(this.view === 'home') {
                this.$store.commit('viewState', 'jobSelector')
            } else {
                this.$store.commit('viewState', 'home')
            }
        },
    },
    components: {
        'job-selector' : jobSelector,
        'job-changer' : jobChanger
    },
    created() {
        this.$store.state.job.equipedJobs.push = this.user.userJobs
        if(this.view === 'home') {
            this.$store.commit('viewState', 'home')
        }   
    }
}
</script>
