<template>
    <div class="template" :style="myCSS" id="myText">
        {{ text }}
    </div>
</template>

<style scoped>
div {
    text-align: center
}
</style>

<script>
/**
 * 15 a can cover a single line
 * This component will adjust the font-size based on container size and word count
 * - the text will fit into the container  as big as it can to fit all the words
 * - no scroll bars
 * - container will not resize
 * - will line break if necessary
 * - you can set nMax_line_breaks
 */
export default {
    props: ['text','base'],
    data() {
        return {
            client: null,
            window: null,
        }
    },
    computed: {
        nText() {
            return this.text.length
        },
        myCSS() {
            let fontSize = null

            if(this.nText <= 15) {
                fontSize = '1.3em'
            } else if(this.nText <= 20) {
                fontSize = '1em'
            } else if(this.nText <= 25) {
                fontSize = '.95em'
            } else if(this.nText <= 30) {
                fontSize = '0.85em'
            } else if(this.nText <= 60) {
                fontSize = '0.75em'
            } else if(this.nText <= 90) {
                fontSize = '0.6em'
            }

            return {
                fontSize : fontSize,
            }
        }
    }
}
</script>