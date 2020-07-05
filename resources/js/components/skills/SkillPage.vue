<template>
    <div class="container pageLevelComponent">
        <!-- Job details -->
        <div v-show="xskillView === true" class="row contentDetails justify-content-sm-center">
            <div class="col-lg-4 col-md-6 col-sm-12 align-items-center">
                <img :src="job.image" class="align-items-center rounded"/>
            </div>
            <div class="col-lg-8 col-md-6 my-4">
                <div class="col-12 contentName">{{ job.title }}</div>
                <div class="col-12 contentDesc">{{ job.description }}</div> 
            </div>
        </div>
        <div v-if="xskillView === true">
            <!-- Skill Tree Header -->
            <div class="row">
                <h1 class="col-12 header">Skill Tree</h1>
            </div>

            <!-- Base or Auxiliary selector headers -->
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

            <!-- Base skill Tree MODE -->
            <div class="skillTree" v-show="skillView === 'base'" >
                <skill-level :skills="job.base" />
            </div>

            <!-- Auxiliary skill Tree MODE -->
            <div class="skillTree" v-show="skillView === 'aux'" >
                <skill-level :skills="job.aux" />
            </div>
        </div>

        <!-- Subject Tree Mode -->
        <div v-if="xskillView === false">
            <subject-page/>
        </div>
    </div>
</template>

<style>
/**
    This class is applied to the entire project for fade-in/out, z-index, etc.
 */
</style>

<style scoped>
.skillTree {
    display: flex;
    padding-top: 10px;
    flex-direction: row;
    overflow-x: auto;
    max-width: inherit;
}
</style>

<script>
import {bus} from '/var/www/html/skillTree_nonSPA/resources/js/app.js'
export default {
    props: ['job'],
    data() {
        return {
            skillView: "base",
            stHoverBase: false,
            stHoverAux: false,
            view: 'skill',
            skill: null
        }
    },
    computed: {
        xskillView: function() {
            return this.$store.state.skillView
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
            this.skill = data
            this.view = 'subject'
        })
        bus.$on('skill-view', () => {
            this.view = 'skill'
        })
    }
}
</script>

