<template>
    <div>
        <div class="row">
            <h1 class="col-12 myr">Skill Tree</h1>
        </div>
        <div class="row">
            <div class="col-6 bg-primary mb-2">Base Skills</div>
            <div class="col-6 bg-secondary mb-2">Auxiliary Skills</div>
        </div>
        <div class="skills_box">
            <div class="pairContainer">
                <div class="skillpathPair" v-for="(gens, index) in gensPerLevel" :key="index">
                    <!-- Render horizontal level -->
                    <skill-level :skills="gens" />
                    <skill-path :parent="gens" :child="gensPerLevel[index + 1]"/>
                    <!-- Render horizontal level -->
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.skills_box {
    display: flex;
    flex-wrap: nowrap;
    flex-direction: column;
    overflow: auto;
    border: 2px solid orangered;
    min-width: auto;
    max-width: auto;
}

.skillpathPair {
    display: flex;
    flex-direction: column;
    align-items: stretch;
}

.pairContainer {
    width: max-content;
}
</style>

<script>
import skillLevel from './SkillLevel.vue'

export default {
    props: ['skills_details'],
    data() {
        return {
            gensPerLevel: [],
            /*
            tree_data: { // This data sorts skills per parent
                limbs: this.skills_details,
            },
            */
        }    
    },
    // Here we will use the concept of a family tree for the variables
    methods: {
        get_limb_generations_data: function(skills, parent = null, ancestor = null)
        {
            // BASE OR NOT ???
            skills.forEach(skill => {
                if(skill.parent_skills[0] === "base") {
                    skill.limb_data = [],
                    skill.gen_nth = 1;
                    //console.log("Setting base_data of " + skill.skill_name)
                }else{
                    //console.log("ATTACHING branch_data to " + skill.skill_name)
                    skill.branch_data = {
                        gen_nth: parent.gen_nth + 1,
                        siblings: [skill.skill_name]
                    }
                    skill.gen_nth = parent.gen_nth + 1;

                    let our_gens_data_object = null

                    //console.log("let's check our ancestor's limb_data for our generations data ")
                    for(let i = 0; i < ancestor.limb_data.length; i++){
                        if(ancestor.limb_data[i].gen_nth === skill.branch_data.gen_nth){
                            our_gens_data_object = ancestor.limb_data[i]
                            //console.log("FOUND OUR DATA")
                            break;
                        }else{
                            //console.log("DID NOT FIND IT")
                        }
                    }
                    if(!our_gens_data_object) {
                        //console.log("I didn't find our data so I'm pushing my data as our gens data")
                        ancestor.limb_data.push(skill.branch_data)
                    }else{
                        //console.log("I found our data, adding my name to it")
                        our_gens_data_object.siblings.push(skill.skill_name)
                    }
                }
            })

            // Recurse
            skills.forEach(skill => {
                //console.log("CHECK IF RECURSION IS NEEDED FOR " + skill.skill_name + "'s child")
                if(skill.gen_nth === 1){
                    if(skill.child_skills.length) {
                        skill.child_skills.forEach(element => {
                            //console.log(element.skill_name + " OF " + skill.skill_name)
                            this.get_limb_generations_data(new Array(element), skill, skill)
                        })
                    }//else console.log(skill.skill_name + " has no child")
                }else{
                    if(skill.child_skills.length) {
                        //console.log("There is child of " + skill.skill_name)
                        skill.child_skills.forEach(element => {
                            //console.log("recursing " + element.skill_name + " OF " + skill.skill_name)
                            this.get_limb_generations_data(new Array(element), skill, ancestor)
                        })
                    }//else console.log(skill.skill_name + " has no child")
                }
            })
        },
        get_tree_generations_data: function(limbs) {
            // Find the depth
            limbs.forEach(limb => {
                limb.depth = limb.limb_data.length + 1
            })

            limbs.forEach(limb => {
                limb.widest = { "gen": 1 , "width": 1 }
                limb.limb_data.forEach(limb_datum => {
                    if(limb.widest.gen < limb_datum.siblings.length){
                        limb.widest = { 
                            "gen": limb_datum.gen_nth,
                            "width": limb_datum.siblings.length 
                        }
                    }
                })
            })
        },
        skills: function() {
            const x = _.cloneDeep(this.skills_details)
            tagSkillGensInfo(x, null, this.gensPerLevel, this.gens)
            
            /**
             * This fn sorts skills in per level manner
             * - watch out for self-calling functions
             */
            function tagSkillGensInfo(skills = x, parent = null, levels, gens) {
                for(let i = 0; i < skills.length; i++){
                    // Tagging a gen_nth to skills
                    skills[i].gen_nth = skills[i].parent_skills[0] === "base" ? 1 : (function() {
                        skills[i].parent_skills = parent
                        return parent.gen_nth + 1
                    })()
                    
                    // Add yourself to your own level gen
                    levels[skills[i].gen_nth - 1] ? levels[skills[i].gen_nth - 1].push(skills[i]) : levels.push(Array.of(skills[i]))  

                    // Tagging the skill's with its siblings by obj reference (CAUTION: still refers to self as sibling)
                    skills[i].siblings = parent? parent.child_skills : skills
                    
                    // Determine "flex : Number" for css width of each skill
                    skills[i].flex = skills[i].child_skills.length <= 1 ? 1 : skills[i].child_skills.length + 1

                    // Time to recurse
                    tagSkillGensInfo(skills[i].child_skills, skills[i], levels, gens)
                }
            }   
        }
    }, 
    created: function()
    {
        this.skills()
    },
    components: {
        'skill-level': skillLevel,
    }
}
</script>

