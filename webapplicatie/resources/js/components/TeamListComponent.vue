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
        this.fetchTeam();
        this.AddNewPlayerListener();
        this.DeleteNewPlayerListener();
    },
    methods: {
        fetchTeam() {

                axios.get('/events/1/team').then((response) => {
                    this.team = response.data;
                })
        },
        AddNewPlayerListener() {
            Echo.channel('team-list')
                .listen('.updated-team', (data) => {
                    
                   alert(data.team);
                    this.team.push(data.team);
                    console.log(this.team);
                    })
        },
        DeleteNewPlayerListener(){
            console.log('Listen for delete event');
        }
    },  
    computed: {
        teamList() {
            return this.team;
        }
    }
}
</script>