<template>
    <div @click="toggleJobData($event)" :style="expandCSS" ref="template"
        :class="{ 
            default: noOneIsExpanding, 
            expanded: IamExpanding,
            fade: someoneIsExpanding,
        }">
        <!-- collapse -->
        <div v-if="noOneIsExpanding">
            <img class="jobImage" :src="'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTlxU65H5JpSpBSUiJVyIUH0SCxRcLbt4t25w&usqp=CAU'" />
            <div>{{job.title}}</div>
        </div>

        <!-- expanded -->
        <div v-if="!noOneIsExpanding" class="jobDetailsCont">
            <div class="col1 myr">
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
            <div class="col2 myr">
                <div class="iconCol myc">
                    <!-- icon -> nTime required to finish the job -->
                    <!-- icon -> nSkills to study (clicking leads to skillTree) --> 
                    <!-- icon -> nSubjects (clicking leads to skillTree) -->
                    <!-- icon -> nBuilds (refers to number of lesson plans) -->
                    <div class="iconCont">
                        <img :src="'https://www.pngkit.com/png/detail/137-1377056_img-icon-color-sample-sample-icon.png'" />
                    </div>
                    <div class="iconCont">
                        <img :src="'https://www.pngkit.com/png/detail/137-1377056_img-icon-color-sample-sample-icon.png'" />
                    </div>
                    <div class="iconCont">
                        <img :src="'https://www.pngkit.com/png/detail/137-1377056_img-icon-color-sample-sample-icon.png'" />
                    </div>
                    <div class="iconCont">
                        <img :src="'https://www.pngkit.com/png/detail/137-1377056_img-icon-color-sample-sample-icon.png'" />
                    </div>
                </div>
                <div class="buildCol myc">
                    <!-- build selector -->
                    BUILD selector area
                </div>
                

                

                <!-- Equip Job Button -->
                <!-- Remove Job button -->
            </div>
            
        </div>
    </div>
</template>

<style scoped>
/**
 * Job Details Container
 */
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
}

.iconCol .iconCont {
    height: 15%;
    width: 100%;
    border: solid green 1px;
}

.iconCont>img {
    height: 50px;
    width: 50px;
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
    height: 50%;
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
    background: peru;
    transition: top .5s, left .5s, width .5s, height .5s, opacity 1s;
    position: relative;
    opacity: 1.0;
    left: 0px; 
    top: 0px;
    width: 100%; 
    height: 100%;
    z-index: auto;
}

.fade {
    background: peru;
    opacity: 0.0;
}

.expanded {
    background: peru;
    transition: top .5s, left .5s, width .5s, height .5s, opacity 1s;
    position: relative;
    left: 0px; 
    top: 0px;
    width: 100%; 
    height: 100%;
    z-index: auto;
}
</style>

<script>
export default {
    props: ['job'],
    data() {
        return {
            expand: false,
            expandCSS: {zIndex: 1},
            currentPos: null
        }
    },
    computed: {
        gridCSS() {
            return this.$store.state.job.jobSelectorCSS
        },
        IamExpanding() {
            return this.$store.state.job.expanded === this.job.id? true:false
        },
        someoneIsExpanding() {
            return this.$store.state.job.expanded !== this.job.id && this.$store.state.job.expanded !== null ? true:false
        },
        noOneIsExpanding() {
            return this.$store.state.job.expanded === null? true:false
        },
    },
    methods: {
        toggleJobData(e) {
            let expand = {
                position: 'relative',
                left: `${this.gridCSS.left - this.currentPos.left}px`,
                top: `${this.gridCSS.top - this.currentPos.top}px`,
                width: `1000%`,
                height: `400%`,
                zIndex: 2
            }

            let notExpand = {
                position: 'relative',
                left: '0px',
                top: '0px',
                width: '100%',
                height: '100%',
                zIndex: 1
            }
            
            if(!this.expand) {
                this.expand = !this.expand
                this.expandCSS = expand
                this.$store.commit('hasExpanded', this.job.id)
            }else{
                this.expand = !this.expand
                this.expandCSS = notExpand
                this.$store.commit('hasExpanded', null)
            }
        }
    },
    mounted() {
        this.currentPos = this.$refs["template"].getBoundingClientRect()
    }
}
</script>