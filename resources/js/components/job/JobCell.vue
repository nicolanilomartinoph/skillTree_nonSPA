<template>
    <div @click="toggleJobSelected()" :style="expandCSS" ref="template"
        :class="{ 
            default: noOneIsExpanding, 
            expanded: IamExpanding,
            fade: someoneIsExpanding,
        }">
        
        <!-- collapse -->
        <div v-if="noOneIsExpanding" class="collapse">
            <img class="jobImage" :src="css" />
            <scale-font-size :text="job.title" class="jobTitle" />
        </div>

        <!-- expanded -->
        <transition name="fadein">
            <div v-if="IamExpanding" :class="{jobDetailsCont: true}">
                <div class="col1">
                    <img class="expandedJobImage" :src="'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTlxU65H5JpSpBSUiJVyIUH0SCxRcLbt4t25w&usqp=CAU'" />
                    <div class="jobTitleDescCont">
                        <div class="jobTitle centerText">
                            <scale-font-size :text="job.title" />
                        </div>
                        <div class="jobDesc centerText">
                            {{job.description}}
                        </div>
                    </div>
                </div>
                <div class="col2">
                    <div class="statsCol">
                        <!-- build selector -->
                        <div class="StatsIconCont" @click.stop="">
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
                        <div class="statsIconCont myr">
                            <img class="statsIcon"      :src="'https://www.pngkit.com/png/detail/137-1377056_img-icon-color-sample-sample-icon.png'" />
                            <div class="statsNumber"    >NUMBER</div>
                        </div>
                        <div class="statsIconCont">
                            <img class="statsIcon"      :src="'https://www.pngkit.com/png/detail/137-1377056_img-icon-color-sample-sample-icon.png'" />
                            <div class="statsNumber"    >NUMBER</div>
                        </div>
                        <div class="statsIconCont">
                            <img class="statsIcon"      :src="'https://www.pngkit.com/png/detail/137-1377056_img-icon-color-sample-sample-icon.png'" />
                            <div class="statsNumber"    >NUMBER</div>
                        </div>
                        <div class="statsIconCont">
                            <img class="statsIcon"      :src="'https://www.pngkit.com/png/detail/137-1377056_img-icon-color-sample-sample-icon.png'" />
                            <div class="statsNumber"    >NUMBER</div>
                        </div>
                    </div>
                    <div class="buildCol">
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
 *  Collapse mode
 */

 .collapse {
    display: flex;
    height: 100%;
    flex-flow: column;
 }

 .jobImage {
    max-width: 100%;
    max-height: 80%;
    object-fit: fill;
}

/**
 *  Expanded Mode
 *  Job Details Container
 */

/* Inside Col1 */

.col1 {
    display: flex;
    height: auto;
    flex-flow: column nowrap;
    width: 30%;
    /* border: solid orangered 5px; */
}

.col1 .expandedJobImage {
    object-fit: contain;
}

.col1 .jobTitleDescCont {
    display: flex;
    flex-flow: column wrap;
    height: 560px;
    /* border: yellowgreen solid 5px; */
}

.jobTitleDescCont .jobTitle {
    font-size: 3em;
    flex: 3;

    padding: 5%;
    /* border: blue 5px solid; */
}

.jobTitleDescCont .jobDesc {
    font-size: 1.5em;
    flex: 7;

    padding: 5%;
    word-break: break-all;
    overflow-y: auto;
    /* border: green 5px solid; */
}

.centerText {
    text-align: justify;
    text-justify: inter-word;
}
/**
 * inside col2
 */
.col2 {
    width: 70%;
    height: 100%;
    display: flex;
    flex-direction: row;
}



.statsIconCont {
    width: 100px;
    height: 100px;
 }

 .statsIcon {
    object-fit: contain;
    width: 100%;
    height: 100%;
 }

.jobDetailsCont {
    display: flex;
    flex-direction: row;
    width: 100%;
    height: 100%;
}

 
 .text {
    height: 100%;
 }

.buildCol {
    width: 55%;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.statsCol {
    width: 45%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.statsCol .StatsIconCont {
    height: 15%;
    display: flex;
    margin-left: 10%;
}

.StatsIconCont>img {
    height: 100%;
    width: 35%;
}

.StatsIconCont .iconStats {
    font-size: 3em;
    justify-content: center;
    align-self: center;
    margin-left: 5%;
}

.StatsIconCont .selectCont {
    height: 80%;
    width: 80%;
}

.selectCont {
    font-size: 35px;
}

.selectCont option {
    font-size: 35px;
}

/**
 * default is the initial status of all grid cells 
 */

.default {
    background: rgba(0, 5, 4, 0.8);
    transition: top .5s, left .5s, width .5s, height .5s, opacity 1s, border .5s;
    position: relative;
    opacity: 1.0;
    left: 0px; 
    top: 0px;
    width: 100%; 
    height: 100%;
    z-index: auto; /* don't remove, this prevents faded grid cells from getting clicked at the back of the expanded cell */
    border: darkslategray 2px solid;
    box-sizing: border-box;
}

/* Fade is applied to other grid cells when one of the cells is 'expanded' */
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
    z-index: auto; /* don't remove, this prevents faded grid cells from getting clicked at the back of the expanded cell */
    border: darkslategray 4px solid;
    box-sizing: border-box;
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
    props: ['job','index'],
    data() {
        return {
            currentPos: null,
            /**
             * THIS BUILD IS A FUTURE FEATURE
             */
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
            /**
             * END BUILD
             */
        }
    },
    computed: {
        // This globalAssets is just for testing, DELETE THIS LATER
        css() {
            return 'data:image/jpeg;base64,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'
            //return this.$store.state.globalAssets
        },
        gridCSS() {
            return this.$store.state.job.jobSelectorCSS
        },
        safeToExpand() {
            return this.$store.state.job.safeToExpand
        },
        IamExpanding() {
            if(this.$store.state.job.selectedJob !== null)  
                return this.$store.state.job.selectedJob.id === this.job.id? true:false
            else
                return false
        },
        someoneIsExpanding() {
            if(this.$store.state.job.selectedJob !== null)
                return this.$store.state.job.selectedJob.id !== this.job.id && this.$store.state.job.selectedJob.id !== null ? true:false 
            else
                return false
        },
        noOneIsExpanding() {
            return this.$store.state.job.selectedJob === null? true : false
        },
        expand() {
            /**
             * Since computed properties are calculate before mounted() is called, we need to return something
             * to avoid "(error during evaluation)" error
             */
            if(this.currentPos === null) {
                /**
                 * If getBoundingClientRect() is not yet ran, there will be no position info
                 */
                return {}
            }else{
                /**
                 * When getBoundingClientRect() is ran, this.currentPos will be available to calculate
                 * now we know how to expand
                 */
                return {
                    position: 'relative',
                    left: `${this.gridCSS.left - this.currentPos.left}px`,
                    top: `${this.gridCSS.top - this.currentPos.top}px`,
                    width: `1000%`,
                    height: `400%`,
                    zIndex: 2, //don't remove, this prevents faded grid cells from getting clicked at the back of the expanded cell
                }
            }
        },
        notExpand() {
            return {
                position: 'relative',
                left: '0px',
                top: '0px',
                width: '100%',
                height: '100%',
                zIndex: 1, //don't remove, this prevents faded grid cells from getting clicked at the back of the expanded cell
            }
        },
        expandCSS() {
            if(this.IamExpanding && this.safeToExpand ) return this.expand
            else                                        return this.notExpand
        },
        
        /**
         * after mounting, it will be calculated
         * set safeToExpand to true
         * 
         */
    },
    methods: {
        toggleJobSelected() {
            if(!this.IamExpanding) {
                this.$store.commit('jobSelected', this.job)
            }else{
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
        /**
         * This will get the position on the screen of each job Cell
         * These values are used to calculate the how and where should each job Cell expands when selected
         */
        this.currentPos = this.$refs["template"].getBoundingClientRect()

        this.$store.commit('safeToExpand', false)
        if(this.index +1 === this.$store.state.job.availableJobs.length) {
            // all cells are displayed and getBoundingClientRect are known
            this.$store.commit('safeToExpand', true)
        }
    },
}
</script>