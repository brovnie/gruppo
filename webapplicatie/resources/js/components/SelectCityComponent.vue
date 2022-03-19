<template>
    <div>
        <label for="location">Locatie</label>
        <select>
        <option>Select city</option>
            <option v-for="city in cities" :value="city.name">
                {{ city.name }}
            </option>
        </select>
    </div>
</template>
<script>
import axios from 'axios';

export default {
    data() {
        return {
            cities: {},
        }
    },
    methods: {
        getCity(){
            axios.get('/api/v1/cities')
                .then((response)=>{
                    console.log(response.data.results[2]);
                    this.cities = response.data.results
            })
        }
    },
    created() {
        this.getCity()
    }
}
</script>
