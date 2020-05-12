<template>
        <svg>
            <!-- downline -->
            <line v-for="(parent, index) in parentPath" :key="index"
                :x1="parent.downline + '%'" :y1="5 + '%'"
                :x2="parent.downline + '%'" :y2="50 + '%'"
            />
            <!-- upline -->
            <line v-for="(child, index) in childPath" :key="index + 'ul'"
                :x1="child.upline + '%'" :y1="50 + '%'"
                :x2="child.upline + '%'" :y2="95 + '%'"
            />
            <!-- branchline -->
            <line v-for="(branch, index) in childPath" :key="index + 'bl'"
                :x1="branch.upline + '%'" 
                :x2="branch.parent_skills.downline + '%'" 
                :y1="50 + '%'"
                :y2="50 + '%'"
            />
            <!--
            <line v-for="(mark, index) in markers" :key="index + 'marker'" class="markers"
                :x1="mark + '%'" :y1="0 + '%'"
                :x2="mark + '%'" :y2="45 + '%'"
            />
            -->
        </svg>
</template>

<script>
export default {
    /**
     * We are going to mutate(add some properties for skillPath's use) the props 
     * as this skillPathing is not the skillTree's business
     */
    props: ['parent','child'],
    data: function() {
        return {
            parentGens: this.parent,
            childGens: this.child,
            markers: [0,10,20,30,40,50,60,70,80,90,100]
        }
    },
    computed: {
        parentTotalFlex: function() {
            let parentTotalFlex = 0;
            for(let i = 0; i < this.parentGens.length; i++){
                parentTotalFlex += this.parentGens[i].flex
            }
            return parentTotalFlex
        },
        pathableParent: function() {
            let pathableParent = []
            for(let i = 0; i < this.parentGens.length; i++){
                this.parentGens[i].child_skills.length > 0 ? pathableParent.push(this.parentGens[i]) : null
            }
            return pathableParent
        },
        parentFraction: function() {
            return 100 / this.parentTotalFlex
        },
        parentPath: function() {
            // Preparing variables
            let parentTotalFlex = 0;
            let pathableParent = []
            for(let i = 0; i < this.parentGens.length; i++){
                parentTotalFlex += this.parentGens[i].flex
                this.parentGens[i].child_skills.length > 0 ? pathableParent.push(this.parentGens[i]) : null
            }
            let parentFraction = 100 / parentTotalFlex

            // Doing the calc for each parent (including the unpathableParent(parent with no child))
            for(let i = 0, covered = 0; i < this.parentGens.length; i++){
                //if(this.parentGens[i].child_skills.length){
                    this.parentGens[i].downline = covered + (0.50 * (parentFraction * this.parentGens[i].flex))
                //}
                covered += parentFraction * this.parentGens[i].flex
            }
            return pathableParent
        },
        xparentPath: function() {
            // Preparing variables
            let parentTotalFlex = 0;
            for(let i = 0; i < this.parentGens.length; i++){
                parentTotalFlex += this.parentGens[i].flex
                //this.parentGens[i].child_skills.length > 0 ? pathableParent.push(this.parentGens[i]) : null
            }
            let parentFraction = 100 / parentTotalFlex

            // Doing the calc for each parent (including the unpathableParent(parent with no child))
            for(let i = 0, covered = 0; i < this.parentGens.length; i++){
                //if(this.parentGens[i].child_skills.length){
                    this.parentGens[i].downline = covered + (0.50 * (parentFraction * this.parentGens[i].flex))
                //}
                covered += parentFraction * this.parentGens[i].flex
            }
            return this.parentGens
        },
        childPath: function() {
            let childTotalFlex = 0;
            if(this.childGens) {
                for(let i = 0; i < this.childGens.length; i++) {
                    childTotalFlex += this.childGens[i].flex
                }
                let childFraction = 100 / childTotalFlex

                if(this.childGens !== undefined) {
                    for(let i = 0, covered = 0; i < this.childGens.length; i++){
                        this.childGens[i].upline = covered + (.5 * (childFraction * this.childGens[i].flex))
                        covered += childFraction * this.childGens[i].flex
                    }
                }
            }
            return this.childGens
        },
    }
}

</script>

<style scoped>
svg {
    height: 50px;
    display: flex;
    max-width: 100%;
    width : 100%;
}

line {
    stroke:rgb(255,0,0);
    stroke-width:2
}

.markers {
    stroke:rgb(17, 209, 0);
    stroke-width:1
}
</style>