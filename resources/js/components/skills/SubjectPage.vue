<template>
    <div class="container pageLevelComponent">
        <div>
            <button @click="skillSubjectToggler()">Back to Skill Tree</button>
        </div>
        <div class="subjectHeader my-2 contentDetails">
            <img class="skillImage align-items-center rounded" :src="skill.image" />
            <p class="skillDescription contentDesc">
                {{skill.description}}
            </p>
            <div class="skillSubjectInfo">
                skillSubjectInfo
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
}

.skillSubjectInfo {
    flex: 2;
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
    computed: mapState({
        skill: 'skill',
    }),
    methods: {
        skillSubjectToggler() {
            this.$store.commit('skillSubjectToggler')
        }
    }
}
</script>