<template>
    <div class="pageLevelComponent">
        <div class="avatar mx-auto  bg-danger" :style="css.avatar">
            <div class="mx-auto">
                <img class=" charImage " :src="char" @click="showJobData" />
            </div>
        </div>
        <div class="userJobsList bg-secondary mx-auto mt-2" :style="css.userJobsList">
            JOBS    
        </div>
        <div class="jobData mx-auto bg-success" :style="css.jobData">
            <div class="jobDataHeader">
                <img class="jobImage" :src="char" />
                <p> job description </p>
            </div>
            <div>
                user's job progress
            </div>

        </div>
    </div>
</template>

<style scoped>
.avatar {
    position: relative;
    width: 300px;
    z-index: 2;
    opacity: 1.0;
    transition: opacity 1s;
    transition-delay: z-index 2s;
}

.charImage {
    width: 300px;
    height: 600px;
    margin-top: 2%;
}

.userJobsList {
    width: 500px;
    position: relative;
    z-index: 3;
    top: 10px;
    transition: top 0.5s;
}

/**
    JOB DATA SECTION
*/
.jobData {
    position: relative;
    display: flex;
    width: 90%;
    height: 900px;
    top: -650px;
    opacity: 0.0;
    z-index: 1;
    transition: opacity 1s;
    transition-delay: z-index 2s;
}

.jobImage {
    height: 300px;
    width: 300px;
}


</style>

<script>
export default {
    props: ['char'],
    data() {
        return {
            css: {
                userJobsList: {
                    top: '10px'
                },
                avatar: {
                    zIndex: 3
                },
                jobData: {
                    zIndex: 1
                }
            },
            user: {
                test: "test",
            },
            view: {
                jobDataView: false
            }
        }
    },
    methods: {
        showJobData() {
            /**
             * This transitions the view from userProfile to jobData
             * 
             */
            this.css.userJobsList.top = '250px'
            this.css.avatar.opacity = 0
            this.css.avatar.zIndex = 0
            this.css.jobData.opacity = 1.0
            this.css.jobData.zIndex = 2
            this.view.jobDataView = true;
        }
    }
}
</script>
