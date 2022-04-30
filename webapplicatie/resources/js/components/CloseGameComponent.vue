<template>
    <div>
        <div v-if="hasGamefinished && isUserInTheTeam && isMatchResultEmpty">  
            <a :href="url">Sluit het spel</a>
        </div>
    </div>
</template>

<script>
export default {
    props: ['userId',
            'eventDate',
            'eventStartTime'],
    data() {
        return {
            url: "",
            isUserInTheTeam: true,
            hasGamefinished: false,
            isMatchResultEmpty: true,
        }
    }, 
    created() {
        this.getUrl();
    },
    mounted() {

        let id = window.location.href.split('/').pop();
        axios.get('/events/'+ id + '/team')
        .then((response) => {
            let team = response.data;
            let isPlayerParticipating = team.some(player => player.id == this.userId);
            this.isUserInTheTeam = isPlayerParticipating; 
        });
        let eventFinished = false;

        let event_ms = Number( this.eventStartTime.split(':')[0]) * 60 * 60 * 1000 + Number(this.eventStartTime.split(':')[1]) * 60 * 1000;
        let date = new Date();
        let year = date.getFullYear();
        let month = parseInt(date.getMonth());
        let day = parseInt(date.getDay());
        let eventsDate = this.eventDate.split('-');

        if( year > eventsDate[0] ){
            eventFinished = true;
        } else if( year == eventsDate[0] ) {
            if( month < parseInt(eventsDate[1]) ){
                eventFinished = true;
            } else if( month == parseInt(eventsDate[1]) ){
                if(day <= parseInt(eventsDate[2]) ){
                    eventFinished = true;
                }
            }
        }

        let test = setInterval( () => {
                let today = new Date();
                let today_ms =  today.getHours() + ':' + today.getMinutes();
                today_ms = Number( today_ms.split(':')[0]) * 60 * 60 * 1000 + Number(today_ms.split(':')[1]) * 60 * 1000;
               if((today_ms - event_ms >= 0 || eventFinished))  {
                   console.log("test");
                    this.hasGamefinished = true;
                    clearInterval(test);
                    return;
               }

         } ,600);

         

    },
    methods: {
        getUrl() {
            let id = window.location.href.split('/').pop();
            this.url = "/events/" + id + "/team/" + this.userId + '/results'  ;
        },

    },  
    computed: {
        availabilePlaces() {
            return this.url;
            return this.hasGamefinished;
        }
    }
}
</script>
