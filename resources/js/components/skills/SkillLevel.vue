<template>
    <div class="skillLevel">
        <!-- Render individual skills -->
        <skill-cont 
            v-for="skill in skills" 
            :key="skill.id" 
            :skill="skill" 
        />
        <!-- Render individual skills -->
    </div>
</template>

<style scoped>
.skillLevel {
    display: flex;
    flex-wrap: nowrap;
    flex-direction: row;
    width: inherit;
    border: 1px solid greenyellow;
}
</style>

<script>
import skillCont from "./SkillCont.vue"

export default {
    props: ['skills'],  
}

/**
 * WE WILL LIMIT OUR LEVEL INQUIRY TO THE BASE SKILL ONLY
 */
</script>