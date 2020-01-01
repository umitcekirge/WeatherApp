<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>AccuWeatherApp</title>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha256-L/W5Wfqfa0sdBNIKN9cG6QA5F2qx4qICmU2VgLruv9Y=" crossorigin="anonymous" />

</head>

<body>
    <div class="containerapp">
        <div class="weather-side">
            <div class="weather-gradient"></div>
            <div class="date-container">
                <h2 class="date-dayname"><?=date('l', strtotime($weatherData[0]['Date']));?></h2><span class="date-day"><?=date('j M Y', strtotime($weatherData[0]['Date']));?></span><i class="location-icon" data-feather="map-pin"></i><span class="location"><?=$_COOKIE['weatherLocation']?>, <?=$_COOKIE['weatherLocationCountry']?></span>
            </div>
            <div class="weather-container"><img src="https://developer.accuweather.com/sites/default/files/01-s.png">
                <h1 class="weather-temp"><?=(int)$weatherData[0]['Temperature'];?>°C</h1>
                <h3 class="weather-desc"><?=$weatherData[0]['DayPhrase'];?></h3>
            </div>
        </div>
        <div class="info-side">
            <div class="today-info-container">
                <div class="today-info">
                    <div class="wind"> <span class="title">WIND</span><span class="value"><?=$weatherData[0]['Wind'];?></span>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="week-container">
                <ul class="week-list">
                    <li class="active"><img src="https://developer.accuweather.com/sites/default/files/<?=$weatherData[0]['Icon'];?>-s.png"><span class="day-name"><?=date('D', strtotime($weatherData[0]['Date']));?></span><span class="day-temp"><?=(int)$weatherData[0]['Temperature'];?>°C</span></li>
                    <li><img src="https://developer.accuweather.com/sites/default/files/<?=$weatherData[1]['Icon'];?>-s.png"><span class="day-name"><?=date('D', strtotime($weatherData[2]['Date']));?></span><span class="day-temp"><?=(int)$weatherData[1]['Temperature'];?>°C</span></li>
                    <li><img src="https://developer.accuweather.com/sites/default/files/<?=$weatherData[2]['Icon'];?>-s.png"><span class="day-name"><?=date('D', strtotime($weatherData[3]['Date']));?></span><span class="day-temp"><?=(int)$weatherData[2]['Temperature'];?>°C</span></li>
                    <li><img src="https://developer.accuweather.com/sites/default/files/<?=$weatherData[3]['Icon'];?>-s.png"><span class="day-name"><?=date('D', strtotime($weatherData[4]['Date']));?></span><span class="day-temp"><?=(int)$weatherData[3]['Temperature'];?>°C</span></li>
                    <div class="clear"></div>
                </ul>
            </div>
            <div class="location-container">
                <button class="location-button" data-toggle="modal" data-target="#exampleModal"> <i data-feather="map-pin"></i><span>Change location</span></button>

				<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"">
				  <div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel" style="color: #222831">Change Location</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body"  style="color: #222831">
						  <div class="row">
							<div class="col">
							  <div class="form-group">
								<input type="text" class="form-control" id="inputLocation" placeholder="Location">
							  </div>
							</div>
							<div class="col-auto">
							  <button type="button" class="btn btn-primary btnSearchLocation">Search</button>
							</div>
						  </div>
						  
						  <div class="row">
							    <div class="col-12">
								  <table id="locationTable" class="table table-bordered">
									<thead>
									  <tr>
										<th scope="col">Location</th>
										<th scope="col" style="width: 1px; !important;">Country</th>
										<th scope="col" style="width: 1px; !important;">Action</th>
									  </tr>
									</thead>
									<tbody>
									  								  
									</tbody>
								  </table>
							</div>
						  </div>

						  
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					  </div>
					</div>
				  </div>
				</div>

            </div>
        </div>
    </div>

	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha256-WqU1JavFxSAMcLP2WIOI+GB2zWmShMI82mTpLDcqFUg=" crossorigin="anonymous"></script>
    <script src="./assets/js/script.js"></script>

</body>

</html>