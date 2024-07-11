import { defineStore } from 'pinia';
import { ref } from 'vue';

export const usePlaceStore = defineStore('place', () => {
    const places = ref([]);

    const fetchPlaces = async (city) => {
        const response = await fetch(`/api/place?city=${city}`);
        places.value = await response.json();
    }

    return {
        places,
        fetchPlaces
    }
})