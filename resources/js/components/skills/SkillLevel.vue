<template>
    <div class="skillLevel">
        <skill-cont 
            v-for="skill in skills" 
            :key="skill.id" 
            :skill="skill" 
            :max_width="fractions" 
        />
    </div>
</template>

<script>
import skillCont from "./SkillCont.vue"

export default {
    props: ['skills'],
    computed: {
        fractions: function() {
            let x = []

            for(let i = 0; i < this.skills.length;i++){
                x.push(this.skills[i].widest.width)
            }

            return x.reduce((acc,cur) => {
                return acc + cur
            })
            
        }
    },
    components: {
        'skill-cont': skillCont,
    },
    mounted() {
        console.log("SKILL LEVEL")
    }
}
// skill level create skill-cont foreach object which displays the image
</script>

<style scoped>
.skillLevel {
    display: flex;
    flex-direction: row;
    flex: 1;
}
</style>