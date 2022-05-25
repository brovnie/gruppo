<template>
    <div>
        <form  v-if="(freePlaces == true || freePlaces == 1) && isUserInTheTeam == false" @submit.prevent="addPlayer()" class="mx-5">  
                <button class="btn btn--inline btn--orange w-auto block " type="submit" name="participant">Deelnemen</button>
        </form>
        <form  v-if="isUserInTheTeam" @submit.prevent="removePlayer()" class="mx-5">  
                <button class="btn btn--inline btn--white w-auto block " type="submit" name="participant">Verlaten</button>
        </form>
    </div>
</template>

<script>
export default {
    props: ['userId'],
    data() {
        return {
            freePlaces: "",
            url: "",
            isUserInTheTeam: false,
        }
    }, 
    created() {
        this.getUrl();
        this.fetchStatus();
        this.showForm();
    },
    mounted() {
                let id = window.location.href.split('/').pop();
                axios.get('/events/'+ id + '/team')
                .then((response) => {
                    let team = response.data;
                    let isPlayerParticipating = team.some(player => player.id == this.userId);
                    return this.isUserInTheTeam = isPlayerParticipating; // true
                })
    },
    methods: {
        getUrl() {
            let id = window.location.href.split('/').pop();
            this.url = "/events/" + id + "/team" ;
        },
        fetchStatus() {
            let id = window.location.href.split('/').pop();
            axios.get('/events/'+ id + '/availabilty').then((response) => {
                this.freePlaces = response.data;
            })
        },
        showForm() {
            Echo.channel('team-list-count')
            .listen('.players-allowed', (data) => {
                this.freePlaces = data.playersAllowed;
            })
        },
        addPlayer() {
            axios.post(this.url, {
                _method: 'patch'
            })
            .then(data => {
                console.log("success");
                this.isUserInTheTeam = true;
            })
            .catch(e => {
                console.log("Error");
                console.log(e);
            });
        },
        removePlayer() {
            axios.post(this.url + "/" + this.userId, {
                _method: 'delete'
            })
            .then(data => {
                console.log("success");
                this.isUserInTheTeam = false;
            })
            .catch(e => {
                console.log("Error");
                console.log(e);
            });
        },
    },  
    computed: {
        availabilePlaces() {
            return this.freePlaces;
            return this.url;
        }
    }
}
</script>
