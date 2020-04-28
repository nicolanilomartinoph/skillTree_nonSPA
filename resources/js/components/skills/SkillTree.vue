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
            },
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
            //this.tree_data.gens_data.push()

            // Find the dept
            limbs.forEach(limb => {
                limb.depth = limb.limb_data.length + 1
            })

            //  limb.widest = { "gen": 0 , "width": 0 }
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
        get_tree_generations_data2: function(skills, parent = null) 
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
        this.get_limb_generations_data(this.tree_data.limbs);
        this.get_tree_generations_data(this.tree_data.limbs);
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