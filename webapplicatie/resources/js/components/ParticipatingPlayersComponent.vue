<template>
<div>
    <span>{{teamSize}}</span>
</div>
</template>
<script>
export default {
    data() {
        return {
            teamSize: "",
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
                    this.teamSize = response.data.length;
                })
        },
        AddNewPlayerListener() {
            Echo.channel('team-list')
                .listen('.updated-team', (data) => {
                  this.teamSize = data.team.length ;
                })
        },
        DeleteNewPlayerListener(){
                Echo.channel('team-list-delete')
                .listen('.updated-team', (data) => {
                this.teamSize = data.team.length;
            })
        }
    },  
    computed: {
        countTeamSize() {
            return this.teamSize;
        }
    }
}
</script>