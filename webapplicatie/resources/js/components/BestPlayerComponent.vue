<template>
<div>
    <div v-if="bestPlayer.length === 0">
    
{{bestPlayer}}
        <img :src="'/storage/' + bestPlayer.profil_photo" alt="profile picture " >
        <a href="" alt="">{{ bestPlayer.username }}</a>
    </div>

</div>
</template>
<script>
export default {
    props: ['bestPlayerData'],
    data() {
        return {
            bestPlayer: [],
        }
    }, 
    created() {
        this.getBestPlayer();
    },
    methods: {
        getBestPlayer() {
            Echo.channel('events-best-player')
                .listen('.best-player', (data) => {
                  this.bestPlayer = data.team;
                })
        },
    },  
    computed: {
        chosenPlayer() {
            return this.bestPlayer;
        }
    }
}
</script>