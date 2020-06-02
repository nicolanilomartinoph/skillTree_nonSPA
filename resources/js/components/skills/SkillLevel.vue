<template>
    <div class="skillLevel">
        <skill-cont
            v-for="child in skills" 
            :key="child.id" 
            :skill="child" 
            :siblings="skills.length"
        />
        <skill-path v-if="skills.children" />
    </div>
</template>

<style scoped>
.skillLevel {
    display: flex;
    flex-direction: row;
    flex-basis: 100px;
}
</style>

<script>
import skillCont from "./SkillCont.vue"

export default {
    props: ['skills']
}
</script>