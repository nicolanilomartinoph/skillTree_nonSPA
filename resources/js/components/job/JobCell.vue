<template>
    <div @click="toggleJobSelected($event)" :style="expandCSS" ref="template"
        :class="{ 
            default: noOneIsExpanding, 
            expanded: IamExpanding,
            fade: someoneIsExpanding,
        }">
        
        <!-- collapse -->
        <div v-if="noOneIsExpanding">
            <img class="jobImage" :src="'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTlxU65H5JpSpBSUiJVyIUH0SCxRcLbt4t25w&usqp=CAU'" />
            <div class="collapsedCellTitle">{{job.title}}</div>
        </div>

        <!-- expanded -->
        <transition name="fadein">
            <div v-if="IamExpanding" :class="{jobDetailsCont: true}">
                <div class="col1">
                    <img class="ExpandedjobImage" :src="'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTlxU65H5JpSpBSUiJVyIUH0SCxRcLbt4t25w&usqp=CAU'" />
                    <div class="jobDescCont">
                        <div class="jobTitle">
                            {{job.title}}
                        </div>
                        <div class="jobDesc">
                            job description goes here - Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio in modi repellat nulla veritatis minima accusantium ad soluta aliquid id rem vel eius, dolorem ut laboriosam, ratione quae eum omnis!
                        </div>
                    </div>
                </div>
                <div class="col2">
                    <div class="iconCol ">
                        <!-- build selector -->
                        <div class="iconCont" @click.stop="">
                            <select name="" id="" class="selectCont" v-model="selectedBuild">
                                <option v-for="build in builds" :key="job.id + '-' + build.id" :value="build">
                                    {{ build.title }} - {{ build.author}}
                                </option>
                            </select>
                        </div>

                        <!-- icon -> nTime required to finish the job -->
                        <!-- icon -> nSkills to study (clicking leads to skillTree) --> 
                        <!-- icon -> nSubjects (clicking leads to skillTree) -->
                        <!-- icon -> nBuilds (refers to number of lesson plans) -->
                        <div class="iconCont">
                            <img :src="'https://www.pngkit.com/png/detail/137-1377056_img-icon-color-sample-sample-icon.png'" />
                            <div class="iconStats">NUMBER</div>
                        </div>
                        <div class="iconCont">
                            <img :src="'https://www.pngkit.com/png/detail/137-1377056_img-icon-color-sample-sample-icon.png'" />
                            <div class="iconStats">NUMBER</div>
                        </div>
                        <div class="iconCont">
                            <img :src="'https://www.pngkit.com/png/detail/137-1377056_img-icon-color-sample-sample-icon.png'" />
                            <div class="iconStats">NUMBER</div>
                        </div>
                        <div class="iconCont">
                            <img :src="'https://www.pngkit.com/png/detail/137-1377056_img-icon-color-sample-sample-icon.png'" />
                            <div class="iconStats">NUMBER</div>
                        </div>
                    </div>
                    <div class="buildCol ">
                        <!-- build details -->
                        <div class="buildDetails">
                            <div class="buildHeader">
                                <div>rate</div>
                                <div>{{ selectedBuild.title }}</div>
                                <div>{{ selectedBuild.author }}</div>
                                <div>{{ selectedBuild.desc }}</div>
                            </div>
                            <div class="buildHeader">
                                <div>nTakers</div>
                                <div>nFinishers</div>
                            </div>
                            <div class="buildHeader">
                                <div>comments</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>

<style scoped>
/**
 * Job Details Container
 */
 .collapsedCellTitle {
     text-align:center;
 }

.buildCol {
    width: 55%;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.iconCol {
    width: 45%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.iconCol .iconCont {
    height: 15%;
    display: flex;
    margin-left: 10%;
}

.iconCont>img {
    height: 100%;
    width: 35%;
}

.iconCont .iconStats {
    font-size: 3em;
    justify-content: center;
    align-self: center;
    margin-left: 5%;
}

.iconCont .selectCont {
    height: 80%;
    width: 80%;
}

.selectCont {
    font-size: 35px;
}

.selectCont option {
    font-size: 35px;
}

.jobTitle {
    font-size: 4em;
    padding: 5%;
}

.jobDesc {
    font-size: 1.5em;
    padding: 5%;
    overflow-y: auto;
}

.ExpandedjobImage {
    object-fit: contain;
    /* height - fix the snapping image */
}

.jobDescriptionCont {
    height: 100%;
    max-height: auto;
}

.col1 {
    width: 30%;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.col2 {
    width: 70%;
    height: 100%;
    display: flex;
    flex-direction: row;
}

.jobDetailsCont {
    display: flex;
    flex-direction: row;
    width: 100%;
    height: 100%;
}

.jobImage {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.default {
    background: rgba(0, 5, 4, 0.8);
    transition: top .5s, left .5s, width .5s, height .5s, opacity 1s, border .5s;
    position: relative;
    opacity: 1.0;
    left: 0px; 
    top: 0px;
    width: 100%; 
    height: 100%;
    z-index: auto;
    border: darkslategray 2px solid;
}

.fade {
    background: rgba(0, 5, 4, 0.8);
    opacity: 0.0;
}

.expanded {
    background: rgba(0, 5, 4, 0.8);
    transition: top .5s, left .5s, width .5s, height .5s, opacity 1s, border .5s;
    position: relative;
    left: 0px; 
    top: 0px;
    width: 100%; 
    height: 100%;
    z-index: auto;
    border: darkslategray 4px solid;
}

.fadein-enter-active {
    transition: opacity 0.2s;
    transition-delay: .5s;
}

.fadein-enter { 
    opacity: 0;
}
</style>

<script>
export default {
    props: ['job'],
    data() {
        return {
            expand: false,
            expandCSS: {zIndex: 1},
            currentPos: null,
            builds: [
                /**
                 * Replace this with object containing the build details 
                 * - Author
                 * - Title
                 * - Description
                 */ 
                {
                    id: 1,
                    author: 'author 1',
                    title: 'title 1',
                    desc: 'Duis ullamco laboris irure amet cillum sunt proident magna duis tempor cillum commodo cupidatat commodo.',
                    star: 0,
                    rate: 0.0,
                    nTakers: 0,
                    nFinishers: 0,
                    nComments: []
                },
                {
                    id: 2,
                    author: 'author 2',
                    title: 'title 2',
                    desc: 'Duis ullamco laboris irure amet cillum sunt proident magna duis tempor cillum commodo cupidatat commodo.',
                    star: 0,
                    rate: 0.0,
                    nTakers: 0,
                    nFinishers: 0,
                    nComments: []
                },
                {
                    id: 3,
                    author: 'author 3',
                    title: 'title 3',
                    desc: 'Duis ullamco laboris irure amet cillum sunt proident magna duis tempor cillum commodo cupidatat commodo.',
                    star: 0,
                    rate: 0.0,
                    nTakers: 0,
                    nFinishers: 0,
                    nComments: []
                }
            ],
            selectedBuild: {
                title: 'Build name',
                desc: 'Build Desc',
                author: 'author',
                star: 0,
                rate: 0.0,
                nTakers: 0,
                nFinishers: 0,
                nComments: []
            }
        }
    },
    computed: {
        gridCSS() {
            return this.$store.state.job.jobSelectorCSS
        },
        IamExpanding() {
            let selectedJob = this.$store.state.job.selectedJob

            if(selectedJob !== null){
                return selectedJob.id === this.job.id? true:false
            }else{
                return false
            }
        },
        someoneIsExpanding() {
            let selectedJob = this.$store.state.job.selectedJob

            if(selectedJob !== null){
                return selectedJob.id !== this.job.id && this.$store.state.job.selectedJob.id !== null ? true:false 
            }else{
                return false
            }
        },
        noOneIsExpanding() {
            return this.$store.state.job.selectedJob === null? true : false
        },
    },
    methods: {
        toggleJobSelected(e) {
            let expand = {
                position: 'relative',
                left: `${this.gridCSS.left - this.currentPos.left}px`,
                top: `${this.gridCSS.top - this.currentPos.top}px`,
                width: `1000%`,
                height: `400%`,
                zIndex: 2,
            }

            let notExpand = {
                position: 'relative',
                left: '0px',
                top: '0px',
                width: '100%',
                height: '100%',
                zIndex: 1,
            }
            
            if(!this.expand) {
                this.expand = !this.expand
                this.expandCSS = expand
                this.$store.commit('jobSelected', this.job)
            }else{
                this.expand = !this.expand
                this.expandCSS = notExpand
                this.$store.commit('jobSelected', null)
            }
        },
        setJobSelected() {
            /**
             * This will set the selected Job and then run fn getJobBuilds()
             */
            return null
        },
        getJobBuilds() {
            /**
             * This will get the available builds for the selected job
             */
            return null
        },
        setBuildSelected() {
            /**
             * This will set the currently selected Job build
             */
        }
    },
    mounted() {
        this.currentPos = this.$refs["template"].getBoundingClientRect()
    }
}
</script>