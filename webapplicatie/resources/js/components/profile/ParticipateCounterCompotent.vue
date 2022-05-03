<template>
<div>

    <p v-if="updatedParticipations > 0  " class="font-xl font-bold">{{updatedParticipations}}</p>
     <p v-else class="font-xl font-bold">{{participated}}</p>
</div>
</template>
<script>
export default {
    props: ["userId","participated"],
    data() {
        return {
            updatedParticipations: 0,
        }
    }, 
    created() {
        this.smileyListener();
    },
    methods: {
        smileyListener() {
                Echo.channel('update-participated')
                .listen('.count-participated', (data) => {
                    if(data.participated.userId == this.userId) {
                        this.updatedParticipations = data.participated.participated;
                    }
                })
        },
    },  
    computed: {
        returnSmileys() {
            return this.updatedParticipations;
        }
    }
}
</script>