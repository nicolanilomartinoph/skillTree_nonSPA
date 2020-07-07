<template>
    <div class="iconCont mx-auto">
        <div class="sign">+</div>
    </div>
</template>

<style scoped>
.iconCont {
    border-radius: 100%;
    background: grey;
    width: 30px;
    height: 30px;
    border: white solid 1px;
    text-align: center;
}

.sign {
    position: relative;
    line-height: 90%;
    font-size: 30px;
    bottom: 1px;
}
    
.sign:hover{
    cursor: pointer;
}

.iconCont:hover {
    background: rgb(160, 140, 140);
}
</style>