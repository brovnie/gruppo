<template>
<div>
 
    <div v-if="Object.keys(bestPlayer).length != 0 ">
        <img :src="'/storage/' + bestPlayer.profile_photo" alt="profile picture " >
        <a href="" alt="">{{ bestPlayer.username }}</a>
    </div>

</div>
</template>
<script>
export default {
    data() {
        return {
            bestPlayer: [],
        }
    }, 
    created() {
                this.fetchBestPlayer();
        this.getBestPlayer();
    },
    methods: {
        fetchBestPlayer() {
            let id = window.location.href.split('/').pop();
            axios.get('/events/'+ id + '/bestPlayer').then((response) => {
                if( Object.keys(response).length != 0 ){
                    this.bestPlayer = response.data;
                }
            })
        },
        getBestPlayer() {
            Echo.channel('events-best-player')
                .listen('.best-player', (data) => {
                  this.bestPlayer = data.bestPlayer;
                });
        }
    },  
    computed: {
        chosenPlayer() {
            return this.bestPlayer;
        }
    }
}
</script>