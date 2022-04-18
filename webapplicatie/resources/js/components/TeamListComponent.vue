<template>
<div>
<p>Pusher data</p>
    <div v-for="player in team">
        <img src="" alt="profile picture " >
        <a href="" alt="">Link Profile</a>
    </div>
    {{team}}
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
            console.log('test');
        },
        listenForChanges() {
            Echo.channel('team-list')
                .listen('.updated-team', (data) => {
                    /*{"team":[
                        {"id":1,"created_at":"2022-03-29T17:11:55.000000Z","updated_at":"2022-03-29T17:12:19.000000Z","user_id":1,"name":"Marlena","familyname":"Test","location":"Aalst","gender":"v","birthdate":"1999-12-12","favorite_sport":"tennis","biography":"testing","profil_photo":"profiles/OIkVeTauFcIhaQyRMkP6RBQeBer75AYy4ZIi4eWL.png"},
                        {"id":5,"created_at":"2022-04-12T20:35:03.000000Z","updated_at":"2022-04-12T20:35:40.000000Z","user_id":5,"name":"Marlena","familyname":"Test","location":"Amblève","gender":"x","birthdate":"2000-12-12","favorite_sport":"hockey","biography":"xxd","profil_photo":"profiles/kbERb4XrXnu379rtCcyWwb46pOq9UQAtkTKgr42W.jpg"}
                        ]}*/
                    
                   alert(data.team[1].id);
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