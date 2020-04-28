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
    data: function () {
        return {
            tree_data: {
                limbs: this.skills_details, // Limbs refer to the base skills
                gens_data: [],
            },
        }    
    },
    // Here we will use the concept of a family tree for the variables
    methods: {
        get_tree_generations_data2: function(skills, parent = null, ancestor = null)
        {
            const isLimb = false
            // BASE OR NOT ???
            skills.forEach(skill => {
                // IF BASE
                if(skill.parent_skills[0] === "base") {
                    skill.limb_data = [],
                    skill.gen_nth = 1;
                    console.log("BASE")
                    isLimb = true
                }
                // IF NOT BASE
                else{
                    skill.branch_data = {
                        gen_nth: parent.gen_nth + 1,
                        width: parent.child_skills.length
                    }

                    // Send data to ancestor
                    ancestor.limb_data.push(skill.branch_data)
                }
            })

            // Recurse
            skills.forEach(skill => {
                if(skill.gen_nth === 1){
                    if(skill.child_skills) {
                        skill.child_skills.forEach(element => {
                            this.get_tree_generations_data2(new Array(element), skill, skill)
                        })
                    }
                }else{
                    if(skill.child_skills) {
                        skill.child_skills.forEach(element => {
                            this.get_tree_generations_data2(new Array(element), skill, ancestor)
                        })
                    }
                }
            })

            /**
             * CORRECT THE limb_data
             * accumulate how many obj have the same gen_nth = max level width
             * reduce it, push to limb_data
             * 
             * depth = limb_data.length
             */
            if(isLimb){
                skills.forEach(skill => {
                    skill.limb_data.forEach
                })
            }
        },
        get_tree_generations_data: function(skills, parent = null) 
        {
            // Current Gen getter
            function apply_current_gen_nth() {
                if(parent === null) {
                    return 1
                }else{
                    return parent.gen_nth + 1
                }
            }

            // Tag each skill with .gen_nth in current generation
            skills.forEach(skill => {
                if(!skill.hasOwnProperty("gen_nth")) {
                    skill.gen_nth = apply_current_gen_nth()
                }
            })
            
            function get_our_gens_data_object (skill, gens_data)  {
                if(!gens_data.length){
                    return null
                }else{
                    for(let i = 0; i < gens_data.length; i++) {
                        if(gens_data[i].gens_nth === skill.gen_nth) {
                            return gens_data[i]
                        }
                    }
                    return null
                }
            }

            // Let's send a collective data of our current gen
            skills.forEach(skill => {
                const our_gens_data_object = get_our_gens_data_object(skill, this.tree_data.gens_data)

                if(our_gens_data_object === null) {
                    this.tree_data.gens_data.push({
                        gens_nth: apply_current_gen_nth(),
                        gens_siblings: [skill.skill_name]
                    });
                }else{
                    our_gens_data_object.gens_siblings.push(skill.skill_name)
                }
            })
            
            // Recurse for each child of the current generation
            skills.forEach(skill => {
                if(skill.child_skills.length > 0) {
                    skill.child_skills.forEach(element => {
                        this.get_tree_generations_data(new Array(element), skill)
                    })
                }
            })
        }, 
    }, 
    mounted: function()
    {
        this.get_tree_generations_data2(this.tree_data.limbs);
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