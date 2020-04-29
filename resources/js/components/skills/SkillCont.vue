<template>
    <div v-bind:style="{ display: flex, flexDirection: column, flex: skill.widest.width}">
        <div>
            I'm a skill Cont
        </div>
    </div>
</template>

<script>
import skillLevel from './SkillLevel.vue'

export default {
    props: ['skill','max_width'],
    computed: {
        STYLE: function() {
            return {
                display: flex,
                flexDirection: column,
                flex: this.skill.widest.width
            }
        },
        base_width: function() {
            return this.skill.widest.width * 100/this.max_width;
        }
    },
    components: {
        'skill-level': skillLevel,
    }
}
</script>

<style scoped>

</style>