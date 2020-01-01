<?php 
    class AccuWeather {
		public $link;
		public $type; 
		public $locationKey;
		public $q;
		public $apikey;
		public $daily = "5day";
		public $lang = 'en-US';
		public $metric = 'false';
		public $details = 'false';
		public $day;
		public $data;
		
		public function __construct($apikey) {
			$this->link = "http://dataservice.accuweather.com/";
			$this->apikey = $apikey;
		}
		private function getDataFromUrl($url) {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_URL, $url);
			$data = curl_exec($ch);
			curl_close($ch);
			return $data;
		}
		public function beautifier(){
			$data = array();
			foreach($this->data['DailyForecasts'] as $day){
				$data[] = array(
								'Date' => $day['Date'],
								'Date2' => date('j M Y', strtotime($day['Date'])),
								'Day' => date('l', strtotime($day['Date'])),
								'Temperature' => $day['Temperature']['Maximum']['Value'],
								'Icon' => str_pad($day['Day']['Icon'],2,'0', STR_PAD_LEFT),
								'DayPhrase' => $day['Day']['IconPhrase'],
								'Wind' => $day['Day']['Wind']['Speed']['Value'] . ' ' . $day['Day']['Wind']['Speed']['Unit']
								
								);
			}
			$this->data = $data;
		}		
		public function lunch(){
			switch ($this->type) {
				case 'daily':
					$json = $this->getDataFromUrl($this->link . 'forecasts/v1/daily/' .  $this->daily."/".$this->locationKey."?apikey=".$this->apikey."&language=".$this->lang."&details=".$this->details."&metric=".$this->metric);
					$array = json_decode($json, 1);
					$this->data = $array;		
					break;
				case 'autocomplete':
					$json = $this->getDataFromUrl($this->link . 'locations/v1/cities/autocomplete?apikey=' . $this->apikey . '&q=' . $this->q);
					$array = json_decode($json, 1);
					$this->data = $array;
					break;
				default:
			}
	
		}
		
    }
?>