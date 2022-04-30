<template>
<div>
    <p class="font-xl font-bold">{{smileys}}</p>
</div>
</template>
<script>
export default {
    props: ['userId', "smileys"],
    data() {
        return {
            updatedSmileys: "",
        }
    }, 
    created() {
        this.smileyListener();
        this.AddNewPlayerListener();
    },
    methods: {
        fetchSmileys() {
                let id = window.location.href.split('/').pop();
                axios.get('/events/'+ id + '/smileys/'+ this.userId).then((response) => {
                    this.updatedSmileys = response.data;
                })
        },
        smileyListener() {
            Echo.channel('update-smiley')
                .listen('.smiley', (data) => {
                    let player_id = data.bestPlayer.userId;
                    if(player_id == this.userId){
                    this.updatedSmileys = player;
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