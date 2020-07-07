<template>
    <div class="JobEquipedCont">
        {{ equipedJob.title }}
    </div>
</template>

<style scoped>
.JobEquipedCont {
    width: max-content;
    padding-left: 3%;
    padding-right: 3%;
    padding-top: .5%;
    padding-bottom: .5%;
    margin: 1%;
    border-radius: 10px;
    background: rgb(95, 0, 112);
    color: white;
}
</style>

<script>
export default {
    props: ['equipedJob']
}
</script>