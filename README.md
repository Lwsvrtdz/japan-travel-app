# Bizmates Technical Exam

This repository contains the code for the technical exam for Bizmates company. The project is a weather application that fetches and displays weather data for various cities.

## Tools
- Laravel 11
- Vue 3
- Pinia store management
- TailwindCSS for styling

### Prerequisites

Before you begin, ensure you have met the following requirements:
!! Make sure you have API KEY for all third-party APIs that are used here
- OpenWeather
- GeoapifyAPI
- Foursquare



### Installation

1. Clone the repository:
    ```sh
    git clone https://github.com/your-username/japan-travel-app.git
    cd japan-travel-app
    ```

2. Install the backend dependencies:
    ```sh
    composer install
    ```

3. Install the frontend dependencies:
    ```sh
    npm install
    ```

4. Copy the `.env.example` file to `.env` and update the environment variables:
    ```sh
    cp .env.example .env
    ```

5. Generate the application key:
    ```sh
    php artisan key:generate
    ```

6. Build the frontend assets:
    ```sh
    npm run dev
    ```

8. Start the development server: (Optional depends on your local setup)
    ```sh
    php artisan serve
    ```

### Usage

1. Open your browser and navigate to `http://localhost:8000`.
2. Select a city from the dropdown to fetch and display the weather data for the selected city.

### Screenshots
![image](https://github.com/user-attachments/assets/74091e89-9a6e-4e19-a673-9bd87df8b31d)
--
![image](https://github.com/user-attachments/assets/acbabddd-95ff-4cc6-97f8-2b1abd2dc4ef)




## Description

The application consists of the following components:

- **Weather.vue**: The main Vue component that handles the UI for displaying weather data.
- **useWeatherStore.js**: A Pinia store that manages the state for weather data.
- **WeatherResource.php**: A Laravel resource that transforms the weather data for the forecast.
- **CurrentWeatherResource.php**: A Laravel resource that transforms the current weather data.
- **PlaceResource.php**: A Laravel resource that transforms the place data.

The application fetches weather data from an external API and displays it in a user-friendly format. The data includes current weather, forecast, and related places for the selected city.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
