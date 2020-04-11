<template>
    <div class="skill_level">
        <skill-cont v-for="value of skills" :key="value.id"  :skill="value" />
    </div>
</template>

<script>
import skillCont from "./SkillCont.vue"

export default {
    props: ['skills'],
    components: {
        'skill-cont': skillCont,
    } 
}
// skill level create skill-cont foreach object which displays the image
</script>

<style scoped>
.skill_level {
    display: grid;
    grid-template-columns: auto auto auto;
}
</style>