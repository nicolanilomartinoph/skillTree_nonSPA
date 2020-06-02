<template>
    <div>
        <div v-if="view === 'skill'" class="skillTreeCont" >
            <div class="row">
                <h1 class="col-12 header">Skill Tree</h1>
            </div>
            <div class="row">
                <div class="col-6 mb-2 skillTreeHoverEffect" @click="skillView = 'base'" @mouseover="hoverBase()" @mouseleave="hoverBase()"
                    :class="[
                        {'stHover' : stHoverBase},
                        skillView === 'base' ? 'selected' : 'default'
                    ]">
                    Base Skills
                </div>
                <div class="col-6 mb-2 skillTreeHoverEffect" @click="skillView =  'aux'" @mouseover="hoverAux()" @mouseleave="hoverAux()"
                    :class="[
                        {'stHover' : stHoverAux},
                        skillView === 'aux' ? 'selected' : 'default'
                    ]">
                    Auxiliary Skills
                </div>
            </div>
            <div class="skillTree" v-show="skillView === 'base'" >
                <skill-level :skills="skillsDetails"/>
            </div>
            <div class="skillTree" v-show="skillView === 'aux'" >
                <skill-level :skills="aux"/>
            </div>
        </div>
        <div v-if="view === 'subject'">
            SUBJECFT View
        </div>
    </div>
</template>

<style scoped>
.skillTree {
    display: flex;
    padding-top: 10px;
    flex-direction: row;
    overflow-x: auto;
    max-width: inherit;
}

.selected {
    background: #00ac95;
}

.default {
    background: #212529;
    color: white;
}


</style>

<script>
import {bus} from '/var/www/html/skillTree_nonSPA/resources/js/app.js'
export default {
    props: ['skillsDetails','aux'],
    data() {
        return {
            skillView: "base",
            stHoverBase: false,
            stHoverAux: false,
            view: 'skill'
        }
    },
    methods: {
        hoverBase: function() {
            this.stHoverBase = !this.stHoverBase
        },
        hoverAux: function() {
            this.stHoverAux = !this.stHoverAux
        },
        viewToggler: function() {
            this.view === 'subject' ? 'skill' : 'subject'
        }
    },
    created() {
        bus.$on('subject-view', (data) => {
            console.log(data)
            this.view = 'subject'
        })
    }
}
</script>

