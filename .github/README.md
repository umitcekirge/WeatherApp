
<p align="center">
    <img src="https://raw.githubusercontent.com/umitcekirge/WeatherApp/master/ssWeatherApp.png?raw=true" alt="WeatherApp ScreenShot"/>
</p>


## WeatherApp ⛅
A weather app written in PHP ready to deploy with Docker.



## Installation
Clone project. 
```sh
$ git clone https://github.com/umitcekirge/WeatherApp.git
$ cd WeatherApp
```

Change APIKEYHERE with your api key and run.
```sh
$ sed -i 's/APIKEY/APIKEYHERE/g' code/index.php
```
After that:

```sh
$ docker-compose up
```

## Resources
- [AccuWeather API](https://developer.accuweather.com/) provides subscribers access to location based weather data via a simple RESTful web interface.
- [Simple Weather App Design](https://codepen.io/Call_in/pen/pMYGbZ)
- [Docker](https://www.docker.com/) is a tool designed to make it easier to create, deploy, and run applications by using containers.
- [Nginx](https://www.nginx.com/) is open source software for web serving, reverse proxying, caching, load balancing, media streaming, and more
