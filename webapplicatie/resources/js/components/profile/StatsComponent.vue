<template>
<div class="flex gap-5">
    <div class="flex-1">
        <p v-if="updatedSmileys > 0  " class="font-xl font-bold">{{updatedFriends}}</p>
        <p v-else class="font-xl font-bold">{{friends}}</p>
        <p class="font-sm" translate="Vrienden">Vrienden</p>
     </div>
    <div class="flex-1">
    {{updatedParticipations}}
        <p v-if="updatedParticipations > 0  " class="font-xl font-bold">{{updatedParticipations}}</p>
        <p v-else class="font-xl font-bold">{{participated}}</p>
        <p class="font-sm" translate="Deelnemen">Deelnemen</p>
     </div>
    <div class="flex-1">
        <p v-if="updatedSmileys > 0  " class="font-xl font-bold">{{updatedSmileys}}</p>
        <p v-else class="font-xl font-bold">{{smileys}}</p>
        <p class="font-sm">Smileys</p>
     </div>
</div>
</template>
<script>
export default {
    props: ["userId","friends", "participated", "smileys"],
    data() {
        return {
            updatedParticipations: 0,
            updatedSmileys: 0,
            updatedFriends: 0,
        }
    }, 
    created() {
        this.friendsListened();
        this.ParticipatedListener();
        this.smileyListener();
    },
    methods: {
        friendsListened() {
            Echo.channel('update-friends')
            .listen('.friends', (data) => {
                if(data.friends.userId == this.userId) {
                    this.updatedFriends = data.frieds.lenght;
                }
            })
        },
        ParticipatedListener() {
            Echo.channel('update-participated')
            .listen('.count-participated', (data) => {
            if(data.participated.userId == this.userId) {
                    this.updatedParticipations = data.participated.count;
                    }
                })
        },
        smileyListener() {
            Echo.channel('update-smiley')
            .listen('.count-smiley', (data) => {
                if(data.smiley.userId == this.userId) {
                    this.updatedSmileys = data.smiley.smileys;
                }
            })
        }
    },  
    
    computed: {
        returnSmileys() {
            return this.updatedFriends;
            return this.updatedParticipations;
            return this.updatedSmileys;
        }
    }
}
</script>