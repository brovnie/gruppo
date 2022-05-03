<template>
<div>

    <p v-if="updatedSmileys > 0  " class="font-xl font-bold">{{updatedSmileys}}</p>
     <p v-else class="font-xl font-bold">{{smileys}}</p>
</div>
</template>
<script>
export default {
    props: ["userId","smileys"],
    data() {
        return {
            updatedSmileys: 0,
        }
    }, 
    created() {
        this.smileyListener();
    },
    methods: {
        smileyListener() {
                Echo.channel('update-smiley')
                .listen('.count-smiley', (data) => {
                    if(data.smiley.userId == this.userId) {
                        this.updatedSmileys = data.smiley.smileys;
                    }
                })
        },
    },  
    computed: {
        returnSmileys() {
            return this.updatedSmileys;
        }
    }
}
</script>