<template>
    <div>
        <img class="skill_image" :src="skill.skill_image"/>
        <div class="bg-warning">TEST</div>
    </div>
</template>

<script>
import skillLevel from './SkillLevel.vue'

export default {
    props: ['skill'],
    components: {
        'skill-level': skillLevel,
    }
}
</script>

<style scoped>
    .skill_image {
        width: 100px;
        height: 100px;
        border: 1px yellow dotted;
        margin: auto;
    }
</style>