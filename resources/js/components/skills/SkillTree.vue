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
    data() {
        return {
            tree_data: {
                skills: this.skills_details,
                depth: 0,
                level_data: []
            }
        }
    },
    methods: {
        get_level_data: function(skills = this.tree_data.skills) 
        {
            this.tree_data.depth++;
            let level_data = {
                branch_count : skills.length,
                branch_leaf_width : "test"
            }
            this.tree_data.level_data.push(level_data); // is the width of the level but each node may vary in width

            this.get_base_skill_data();
        },
        get_base_skill_data: function(skills = this.tree_data.skills) 
        {
            skills.forEach(element => {
                if(element.parent_skills == "base")
                {
                    element.node_depth = 0;
                    //element.node_max_width = 0;
                    this.scan_depth(element, element.child_skills);
                }
            });    
        },
        scan_depth: function(base_skill, child_skills = null)
        {
            if(child_skills) 
            {
                base_skill.node_depth++;
                // base_skill.node_max_width = base_skill.node_max_width > base_skill.child_skills.length ? base_skill.node_max_width : base_skill.child_skills.length;

                child_skills.forEach(element => {
                    this.scan_depth(base_skill, element.child_skills);
                })
            }
        }
    }, 
    mounted: function()
    {
        this.get_level_data();
    },
    components: {
        'skill-level': skillLevel,
    }
}

</script>

<style scoped>
.skills_box {
    width: 1500px;
    height: 1000px;
}
</style>