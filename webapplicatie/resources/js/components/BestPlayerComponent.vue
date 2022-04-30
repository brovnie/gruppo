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
        this.getBestPlayer();
        this.fetchBestPlayer();
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
            console.log("test before echo");
            Echo.channel('events-best-player')
                .listen('.best-player', (data) => {
                  this.bestPlayer = data.bestPlayer;
                  console.log("hello" + data.bestPlayer);
                });
        },
    },  
    computed: {
        chosenPlayer() {
            return this.bestPlayer;
        }
    }
}
</script>