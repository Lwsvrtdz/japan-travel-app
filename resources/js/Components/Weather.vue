<script setup>
import { storeToRefs } from "pinia";
import { ref, watch, computed, reactive } from "vue";
import { useWeatherStore } from "@/stores/useWeatherStore";
import { usePlaceStore } from "@/stores/usePlaceStore";

const weatherStore = useWeatherStore();
const placeStore = usePlaceStore();

const selectedCity = ref("Tokyo");

const handleSelectedCityAction = () => {
  weatherStore.fetchForecast(selectedCity.value);
  weatherStore.fetchCurrentWeather(selectedCity.value);
  placeStore.fetchPlaces(selectedCity.value);
};

handleSelectedCityAction();

const { weathers, currentWeather } = storeToRefs(weatherStore);

const { places } = storeToRefs(placeStore);
</script>

<template>
  <div class="min-h-screen bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto space-y-10">
      <select
        v-model="selectedCity"
        @change="handleSelectedCityAction"
        class="block w-full p-3 border border-gray-300 rounded mb-6 bg-white shadow"
      >
        <option value="" disabled>Select a city</option>
        <option value="Tokyo">Tokyo</option>
        <option value="Yokohama">Yokohama</option>
        <option value="Kyoto">Kyoto</option>
        <option value="Osaka">Osaka</option>
        <option value="Sapporo">Sapporo</option>
        <option value="Nagoya">Nagoya</option>
      </select>
      <div class="grid">
        <div class="bg-white p-6 rounded-lg shadow-lg">
          <img
            :src="`https://openweathermap.org/img/wn/${currentWeather.weather.icon}@4x.png`"
            alt="current-weather-icon"
            class="w-20 h-20 mx-auto"
          />
          <h3 class="text-xl font-semibold text-center mt-4">
            {{ currentWeather.date }}
          </h3>
          <p class="text-center">{{ currentWeather.time }}</p>
          <p class="text-center mt-2">
            Temperature: {{ currentWeather.main.temp }} °C
          </p>
          <p class="text-center">
            Feels Like: {{ currentWeather.main.feels_like }} °C
          </p>
          <p class="text-center">
            Weather: {{ currentWeather.weather.description }}
          </p>
          <p class="text-center">
            Wind Speed: {{ currentWeather.wind.speed }} m/s
          </p>
        </div>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div
          v-for="(weather, index) in weathers.list"
          :key="index"
          class="bg-white p-6 rounded-lg shadow-lg"
        >
          <img
            :src="`https://openweathermap.org/img/wn/${weather.weather[0].icon}@4x.png`"
            alt="weather-icon"
            class="w-20 h-20 mx-auto"
          />
          <h3 class="text-xl font-semibold text-center mt-4">
            {{ weather.dt_txt }}
          </h3>
          <p class="text-center mt-2">
            Temperature: {{ weather.main.temp }} °C
          </p>
          <p class="text-center">
            Feels Like: {{ weather.main.feels_like }} °C
          </p>
          <p class="text-center">
            Weather: {{ weather.weather[0].description }}
          </p>
          <p class="text-center">Wind Speed: {{ weather.wind.speed }} m/s</p>
        </div>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div
          v-for="(place, index) in places.places"
          :key="index"
          class="bg-gray-200 p-6 rounded-lg shadow-lg"
        >
          <div class="grid space-y-5">
            <div class="grid">
              <img
                style="float: left"
                :src="
                  place.categories[0].icon.prefix +
                  '100' +
                  place.categories[0].icon.suffix
                "
                class="w-20 h-20 mx-auto"
              />
              <h3 class="text-xl font-semibold text-center mt-4">
                {{ place.name }}
              </h3>
            </div>

            <div class="grid">
              <ul class="text-center">
                <li v-for="(category, index) in place.categories" :key="index">
                  {{ category.name }}
                </li>
              </ul>
            </div>
            <div class="grid">
              <p>{{ place.distance }}m</p>
            </div>
            <div class="grid">
              <p>{{ place.location.formatted_address }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style lang="scss" scoped></style>