<template>
    <div class="container pageLevelComponent">
        <div>
            <button @click="skillSubjectToggler()">Back to Skill Tree</button>
        </div>
        <div class="subjectHeader my-2 contentDetails">
            <img class="skillImage align-items-center rounded" :src="skill.image" />
            <p class="skillDescription contentDesc myr">
                {{skill.description}}
            </p>
            <div class="skillSubjectInfo myr">
                <div class="myc">Subjects: {{skill.subjects.length}}</div>
                <div class="myc">Unlock: {{unlocks}}</div>
                <div class="myc">TEST</div>
                <div class="myc">TEST</div>
            </div>
        </div>
        <div class="subjectTree">
            <subject-list :subjects="skill.subjects" />
        </div>
    </div>
</template>

<style scoped>
.subjectHeader {
    margin-top: 10px;
    display: flex;
    flex-direction: row;
}

.skillDescription {
    flex: 2;
    padding: 10px;
}

.skillSubjectInfo {
    flex: 2;
    padding: 10px;
}

.skillImage {
    width: 200px;
    height: 200px;
    
}

</style>


<script>
import {bus} from '/var/www/html/skillTree_nonSPA/resources/js/app.js'
import {mapState} from 'vuex'

export default {
    computed: {
        skill() {
            return this.$store.state.skill
        },
        unlocks() {
            let children = []
            for(let i = 0; i < this.skill.children.length; i++) {
                children.push(this.skill.children[i].title)
            }

            if(children.length) {
                let string = ""
                
                for(let i = 0; i < this.skill.children.length; i++){
                    string = string + `${this.skill.children[i].title}`
                    if(i < (this.skill.children.length - 1)){
                        string += ", "
                    }else{
                        string += "."
                    }
                }
                
                return string
            }else{
                return "none"
            }
        }
    },
    methods: {
        skillSubjectToggler() {
            this.$store.commit('skillSubjectToggler')
        }
    }
}
</script>