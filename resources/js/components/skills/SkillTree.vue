<template>
    <div>
        <div class="row">
            <h1 class="col-12 myr">Skill Tree</h1>
        </div>
        <div class="row">
            <div class="col-6 bg-primary">Base Skills</div>
            <div class="col-6 bg-secondary">Auxiliary Skills</div>
        </div>
        <div class="row">
            <div class="skills_box bg-success">
                <skill-level :skills="skills_details" />
            </div>
        </div>
    </div>
</template>

<script>
import skillLevel from './SkillLevel.vue'

export default {
    props: ['skills_details'],
    components: {
        'skill-level': skillLevel,
    }
}
/*

If [skill_details] > 0, create a <skill-level>
pass the [skill_details] to <skill-level>


tree structure
- skill-level can be recursed inside skill-cont provided that parent skill-level width can be adjusted depending on the lower skill-level's # of skill-cont
solution: 
1. each level down will adjust the parent's width, $emit an event upon mounting of the lower skill-level to trigger widening
2. get the depth of the children and then apply early 
- skill-level cannot be recursed inside skill-cont


THINGS TO STUDY:
- CSS VARIABLES
-  attr() CSS function together with a data-* attribute:
 */
</script>

<style scoped>
.skills_box {
    width: 1500px;
    height: 1000px;
}
</style>