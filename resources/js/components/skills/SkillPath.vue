<template>
        <svg class="path">
            <line 
                :x1="50 + '%'" :y1="5 + '%'"
                :x2="50 + '%'" :y2="50 + '%'"
            />
        </svg>
</template>

<script>
export default {
    props: [],
}

</script>

<style scoped>
svg {
    display:flex;
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