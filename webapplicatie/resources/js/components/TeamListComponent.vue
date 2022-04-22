<template>
<div>
    <div v-for="(player, key) in team">
        <img :src="'/storage/' + player.profil_photo" alt="profile picture " >
        <a href="" alt="">{{ player.username }}</a>
    </div>

</div>
</template>
<script>
export default {
    data() {
        return {
            team: [],
        }
    }, 
    created() {
        this.fetchPlayer();
        this.listenForChanges();
    },
    methods: {
        fetchPlayer() {

                axios.get('/events/1/team').then((response) => {
                    this.team = response.data;
                })
        },
        listenForChanges() {
            Echo.channel('team-list')
                .listen('.updated-team', (data) => {
                    
                   alert(data.team);
                    this.team.push(data.team);
                    console.log(this.team);
                    })
        }
    },  
    computed: {
        teamList() {
            return this.team;
        }
    }
}
</script>