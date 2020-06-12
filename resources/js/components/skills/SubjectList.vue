<template>
    <ul class="subjectList">
        <li v-for="subject in subjects" :key="subject.id"
            class="subjectCont topic topicsContTheme">
            {{ subject.title }}
            <div class="references">
                <div class="blankSpace"></div>
                <span class="material-icons playIcon" :href="subject.video">
                    play_circle_outline
                </span>
                <span class="material-icons linkIcon" :href="subject.site">
                    link
                </span>
            </div>
        </li>
    </ul>
</template>

<style scoped>
.subjectCont {
    display: flex;
    flex-direction: row;
    text-indent: 10px;
    list-style-type:none;
    height: 50px;
    width: 96%;
    margin-top: 5px;
    margin-bottom: 5px;
    line-height: 45px;
    font-weight: 900;
    box-sizing: border-box;
}

.blankSpace {
    flex: 5;
}

.references {
    display: flex;
    flex-direction: row;
    flex: 2;
}

.playIcon {
    font-size: 50px;
}
.playIcon:hover {
    color: gray;
}

.linkIcon {
    font-size: 50px;
}
.linkIcon:hover {
    color: gray;
}
</style>

<script>
export default {
    props: ['subjects']
}
</script>