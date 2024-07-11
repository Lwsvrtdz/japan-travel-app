import { defineStore } from 'pinia';
import { ref } from 'vue';

export const useWeatherStore = defineStore('weather', () => {
    const weathers = ref([]);
    const currentWeather = ref(null);

    const fetchForecast = async (city) => {
        const response = await fetch(`/api/weather/forecast?city=${city}`);
        const data = await response.json();
        weathers.value = data;
    }

    const fetchCurrentWeather = async (city) => {
        const response = await fetch(`/api/weather/weather?city=${city}`);
        const data = await response.json();
        currentWeather.value = data;
    }

    return {
        weathers,
        currentWeather,
        fetchForecast,
        fetchCurrentWeather
    }
});