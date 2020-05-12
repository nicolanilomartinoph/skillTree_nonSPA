<template>
    <div class="skillCont" :style="this.style">
        <img class="skill_image" :src="skill.skill_image" />
    </div>
</template>

<script>
import skillLevel from './SkillLevel.vue'

export default {
    props: ['skill'],
    computed: {
        style: function() {
            let styleObject = {
                display: 'flex',
                flexDirection: "column",
                flex: `${this.skill.flex}`,
                border: "1px dashed violet",
                alignItems: "center",
                minHeight: "max-content",
                minWidth: "150px",
            }
            return styleObject
        }
    }
}
</script>

<style scoped>
.skill_image {
    height: 100px;
    width:  100px;
    object-fit: contain;
}
</style>