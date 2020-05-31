<template>
    <div class="skillCont">
        <!-- The skill image and lines -->
        <svg class="svg" v-if="skill.parent_skills != 'base'">
            <line 
                :x1="50 + '%'" :y1="0 + '%'"
                :x2="50 + '%'" :y2="100 + '%'"
            />
        </svg>
        <img :src="skill.skill_image" @mouseover="SkillDetailsModalUp()" />
        <svg class="svg" v-if="skill.child_skills.length">
            <line 
                :x1="50 + '%'" :y1="0 + '%'"
                :x2="50 + '%'" :y2="100 + '%'"
            />
        </svg>
        <svg class="branchLine" v-if="skill.child_skills.length > 1">
            <line 
                :x1="branch[0] + '%'" :y1="1"
                :x2="branch[1] + '%'" :y2="1"
            />
        </svg>
        <skill-level 
            v-if="skill.child_skills.length"
            :skills="skill.child_skills"
        />

        <!-- MODAL -->
        <div v-if="showSkillDetails" class="modalSkillDetailsBackdrop" @click.self.stop="SkillDetailsModalDown()">
            <div class="skillDetailsModal p-2 rounded">	
                <!-- LEFT COLUMN -->	
                <div>
                    <img :src="skill.skill_image" class="modalImage" 
                        data-toggle="tooltip" data-placement="bottom" title="Show full topics tree"
                        @click="showTopicTree()"
                    />
                    <div :style="{fontSize: '50px', textAlign: 'center'}">{{ skill.skill_name }}</div>
                    <div :style="{overflowY: 'auto', padding: '10px'}">{{ skill.skill_description }}</div>
                </div>
                <!-- RIGHT COLUMN -->
                <div class="pl-2 ml-2 d-flex flex-column">
                    <!-- TOPIC COLUMN -->
                    <div class="topicColCont">
                        <div class="modalHeader" :style="{display: 'flex', flexDirection: 'row'}">
                            <div>Topics</div>
                            <div class="ml-3">
                                <span v-show="skill.subjects.length > 0">{{skill.subjects.length}}</span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 18 18" @click="SkillDetailsModalDown()">
                                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"/>
                            </svg>
                        </div>
                        <div class="topicsCont">
                            <div class="topic m-1 p-2" v-for="subject in skill.subjects" :key="subject.skill_id + ' - ' + subject.id">
                                {{subject.subject_title}}
                            </div>
                        </div>
                    </div>
                    <!-- SUB-SKILL COLUMN -->
                    <div class="subSkillColCont">
                        <div class="modalHeader">Sub-skills</div>
                        <div class="d-flex flex-row" :style="{border: '1px solid green', overflowY: 'auto'}">  
                            <img class="m-1" v-for="child in skill.child_skills" :key="child.id" :src="child.skill_image" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
 
<style scoped>
.topic:hover {
    border: solid whitesmoke 2px;
}

.modalImage:hover {
    border: solid whitesmoke 2px;
}

.topicColCont {
    display: flex;
    flex-direction: column;
    background: #00ac95;
}

.topicsCont {
    display: flex;
    flex-direction: row;
    max-height: 330px;
    min-height: 330px;
    border: 1px solid green;
    overflow-y: auto;
}

.topic {
    border: 1px gray solid;
    max-height: 50px;
    min-height: 50px;   
    line-height: 30px; 
    box-sizing: border-box;
    color: black;    
}

.subSkillColCont {
    display: flex;
    flex-direction: column;
    background: #00ac95;
}

.modalHeader {
    flex-basis: 5%;
    padding-left: 3%;
    font-size: 20px;
    background:#002722;
    color: white;
}

.modalSkillDetailsBackdrop {
    display: flex;
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    justify-content: center;
    align-items: center;
    height: 100vh;
    width: 100vw;
    background: rgba(0,0,0,0.3);
}

.modalImage {
    height: 250px;
    width: 250px;
}

.skillDetailsModal {
    display: flex;
    flex-direction: row;
    opacity: 1;
    background: #007a6a;
    height: 50vh;
    width: 50vw;
}

.skillDetailsModal div:nth-child(2) {
    display: flex;
    flex-direction: column;
    flex: 1;
}
.skillDetailsModal div:nth-child(3) {
    display: flex;
    flex-direction: column;
    flex: 3;
}


.skillCont {
    display: flex;
    flex-direction: column;
    align-items: center;
    min-height: 110px;
    min-width: 110px;
}

img {
    height: 70px;
    width:  70px;
    object-fit: contain;
    border: 3px solid gray;
    border-radius: 4px;
    background: white;
}

.svg {
    height:     25px;
    display:    flex;
    max-width:  100%;
    width:      100%;
}

.branchLine {
    height: 2px;
    max-width:  100%;
    width:      100%;
}

line {
    stroke:rgb(171, 192, 192);
    stroke-width:2;
    stroke-linecap: round;
}

.hover {
    border: black solid 3px;
}
</style>

<script>
export default {
    props: ['skill','siblings'],
    data() {
        return {
            showSkillDetails: false,
            click: false,
            hover: false,
        }
    },
    computed: {
        branch: function() {
            if(this.skill.child_skills.length > 0) {
                let fractions = 100 / this.skill.child_skills.length
                let offsetFraction = fractions / 2
                let branchStart = offsetFraction
                let branchEnd = branchStart + (fractions * (this.skill.child_skills.length - 1))
                let x = [branchStart,branchEnd]
                return x
            }else{
                return [0,0]
            }
        }
    },
    methods: {
        SkillDetailsModalUp: function() {
            this.showSkillDetails = true
            console.log("UP")
        },
        SkillDetailsModalDown: function() {
            this.showSkillDetails = false
            console.log("DOWN")
        },
        showTopicTree: function() {
            this.click = true
        },
        hoverToggle: function(x) {
            this.hover = !this.hover;
        }
    }
}
</script>
