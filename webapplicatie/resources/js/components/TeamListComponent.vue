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
                let id = window.location.href.split('/').pop();
                axios.get('/events/'+ id + '/team').then((response) => {
                    this.team = response.data;
                })
        },
        AddNewPlayerListener() {
            Echo.channel('team-list')
                .listen('.updated-team', (data) => {
                  this.team = data.team;
                })
        },
        DeleteNewPlayerListener(){
                Echo.channel('team-list-delete')
                .listen('.updated-team', (data) => {
                this.team = data.team;
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