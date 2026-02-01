<?php
// File: index.php
session_start();

// UK Cities with coordinates
$uk_cities = [
    'London' => ['lat' => '51.5074', 'lon' => '-0.1278'],
    'Manchester' => ['lat' => '53.4808', 'lon' => '-2.2426'],
    'Birmingham' => ['lat' => '52.4862', 'lon' => '-1.8904'],
    'Glasgow' => ['lat' => '55.8642', 'lon' => '-4.2518'],
    'Liverpool' => ['lat' => '53.4084', 'lon' => '-2.9916'],
    'Bristol' => ['lat' => '51.4545', 'lon' => '-2.5879'],
    'Leeds' => ['lat' => '53.8008', 'lon' => '-1.5491'],
    'Edinburgh' => ['lat' => '55.9533', 'lon' => '-3.1883'],
    'Cardiff' => ['lat' => '51.4816', 'lon' => '-3.1791'],
    'Belfast' => ['lat' => '54.5973', 'lon' => '-5.9301']
];

// API Configuration
$api_key = 'YOUR_API_KEY_HERE'; // Replace with your OpenWeatherMap API key
// For demo purposes, we'll use a fallback if no API key is provided
$use_fallback = empty($api_key) || $api_key === 'YOUR_API_KEY_HERE';

// Function to get weather data from API
function getWeatherData($city_name, $lat, $lon, $api_key, $use_fallback = false) {
    if ($use_fallback) {
        // Fallback demo data when no API key is provided
        return getDemoWeatherData($city_name);
    }
    
    try {
        // Get current weather
        $current_url = "https://api.openweathermap.org/data/2.5/weather?lat={$lat}&lon
