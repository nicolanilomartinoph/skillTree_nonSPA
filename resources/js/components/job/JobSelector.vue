<template>
    <transition name="jobSelector">
        <div class="jobSelector bg-success">
            <JobGrid />
        </div>
    </transition>
</template>

<style scoped>
.jobSelector {
    position: absolute;
    width: 90vw;
    left: 5vw;
    height: 90vh;
}

.jobSelector-enter-active, .jobSelector-enter-leave {
    transition: opacity .5s;
    transition-delay: .2s;
}

.jobSelector-enter {
    opacity: 0;
    transition-delay: .5s;
}

.jobSelector-leave-to {
    opacity: .5;
    transition: opacity .5;
    animation: pulled .5s;
}

@keyframes pulled {
    0% {
        transform: scale(1);
    }

    100% {
        transform: scale(0);
    }
}

</style>

<script>
import JobGrid from './JobGrid'

export default {
    data() {
        return {
            css: {
                opacity: 0.0,
                zIndex: 1
            }
        }
    },
    computed: {
        view: function() {
            return this.$store.state.view.name
        }
    },
    components: {
        JobGrid
    }
}
</script>