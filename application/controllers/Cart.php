<?php

class Cart extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Constant_model');
		// $this->load->library('cart');
		
	}
	public function index()
	{ 
		$html = "";
		$total = "";
		// if (in_array($_POST['id'], array_column($this->cart->contents(), 'id'))) {
		// 	$rowid = 0;
		// 	foreach ($this->cart->contents() as $tour) {
		// 		if ($tour['id'] === $_POST['id']) { 
		// 			$rowid = $tour['rowid']; 
		// 			$data = array(
		// 				'rowid'   => $rowid,
		// 				'id' => $_POST['id'],
		// 				'name' => $_POST['name'],
		// 				'qty' => 1,
		// 				'price' => $_POST['price'],
		// 				'day' => $_POST['day'],
		// 			);
		// 			$this->cart->update($data);
		// 			if (!empty($this->cart->contents())) {
		// 				foreach ($this->cart->contents() as $items) {
		// 					$html .= '<tr id="'.$items['rowid'].'">
		// 						<td> '.$items["name"].' </td>
		// 						<td id="day"> '.$items['day'].' </td>
		// 						<td id="price"> '.$items['price'].' <a href="javascript:void(0)" class="minus-icon remove_row" data-id="'.$items['rowid'].'"> - </a> </td>
		// 					</tr>';
		// 					$total = $this->cart->total();
		// 				}
		// 			}
		// 		}
		// 	}
		// }else{
		// 	$data = array(
		// 		'id' => $_POST['id'],
		// 		'name' => $_POST['name'],
		// 		'qty' => 1,
		// 		'price' => $_POST['price'],
		// 		'day' => $_POST['day'],
		// 	);
		// 	$this->cart->insert($data);
		// 	if (!empty($this->cart->contents())) {
		// 		foreach ($this->cart->contents() as $key => $items) {
		// 			$html .= '<tr id="'.$items['rowid'].'">
		// 				<td> '.$items["name"].' </td>
		// 				<td id="days" data-day='.$items["day"].'> '.$items['day'].' </td>
		// 				<td id="price"> '.$items['price'].' <a href="javascript:void(0)" class="minus-icon remove_row" data-id="'.$items['rowid'].'"> - </a> </td>
		// 			</tr>';
		// 			$total = $this->cart->total();
		// 		}
		// 	}
		// }
		$lat = "";
		$long = "";
		$total_days = 0;
	//	$location[] = '';
		if (in_array($_POST['id'], array_column($this->cart->contents(), 'id'))) {
			return false;
		}else{
			$data = array(
				'id' => $_POST['id'],
				'qty' => 1,
				'price' => $_POST['price'],
				'name' => str_replace(',', '. ', $_POST["name"]),
				'option' => array(
					'day' => $_POST['day'],
					'longitude' => $_POST['longitude'],
					'latitude' => $_POST['latitude'],
					'city_id' => $_POST['city_id'],
					'city_longitude' => $_POST['city_longitude'],
					'city_latitude' => $_POST['city_latitude'],
				),
			);
			$this->cart->insert($data);

			if (!empty($this->cart->contents())) {
				foreach ($this->cart->contents() as $key => $items) {
					$days = str_replace(' Days','',$items['option']["day"]); $total_days = $total_days+$days;
					$html .= '<tr id="'.$items['rowid'].'">
						<td> '.str_replace('.', ', ', $items["name"]).' </td>
						<td id="days" data-day='.$items['option']["day"].'> '.$items['option']["day"].' </td>
						<td id="price"> '.$items['price'].' <a href="javascript:void(0)" class="minus-icon remove_row" data-id="'.$items['rowid'].'"> - </a> </td>
					</tr>';
					$total = $this->cart->total();
					$lat = $items['option']["latitude"];
					$long = $items['option']["longitude"];
					
					$location[] = ["lat" => $items['option']["latitude"],
					"long" => $items['option']["longitude"]];

					$city_location[] = ["city_longitude" => $items['option']["city_longitude"],
					"city_latitude" => $items['option']["city_latitude"]];
				}
			}
		
		$data = array(
			"html" => $html,
			"total" => $total,
			"lat" => $lat,
			"long" => $long,
			"location" => $location,
			"days" => $total_days,
			"city_location" => $city_location,
		);
		
		echo json_encode($data);
		}
		
			
	}


	public function removeCartItem()
	{
		$total = "";
		$total_days = 0;
		$longitude = "";
		$latitude = "";
		$res = [array()];
		$rowid = $_POST['id'];
		$data = array(
            'rowid'   => $rowid,
            'qty'     => 0
        );
        $this->cart->update($data);
		if (!empty($this->cart->contents())) {
			foreach ($this->cart->contents() as $key => $items) {
				$days = str_replace(' Days','',$items['option']["day"]); $total_days = $total_days+$days;
				$total = $this->cart->total();
				$lat = $items['option']["latitude"];
				$long = $items['option']["longitude"];
				$location[] = ["lat" => $items['option']["latitude"],
				"long" => $items['option']["longitude"]];
				$status = true;
			}
		}else{
			$total = 0;
			$lat = '33.43211082128627';
			$long = '-99.98580752275456';
			$location[] = [];
			$status = false;
			$total_days = 0;
		}

		$data = array(
			"total" => $total,
			"lat" => $lat,
			"long" => $long,
			"location" => $location,
			'status' => $status,
			'days' => $total_days
		);

		echo json_encode($data);
	}

	public function count_price()
	{
		if ($_POST['people_qty'] != 0) {
		
	    	$base_fare = $_POST['base_fare_one']*$_POST['people_qty'];
			$gst_total = ($_POST['gst']/100)*$base_fare;
	    	$base_plus_gst = $base_fare+$gst_total;
	        $tcs_total = $base_plus_gst*($_POST['tcs']/100);
	        $total_number = $base_fare+$gst_total+$tcs_total;
			$pkg_amt = $_POST['pkg_amt']*$_POST['people_qty'];
			$final_price = get_price_dani($pkg_amt+$total_number);
			$per_person = ($pkg_amt+$total_number)/$_POST['people_qty'];

			$data = array(
				'base_fare' => get_price_dani($total_number),
				'per_person' => get_price_dani($per_person), 
				'final_price' => $final_price,
			);
		}else{
			$data = array(
				'base_fare' => get_price_dani(0),
				'per_person' => get_price_dani(0), 
				'final_price' => 0,
			);
		}	 
		echo json_encode($data);
	}

	public function custom_tour_count_price()
	{
		// echo "<pre>";
		// print_r($this->cart->contents());
		$admin_settings = $this->Constant_model->getOneCol('website_setting','id',1);
		$post_base_fare_one = $admin_settings->basefare;
		if ($_POST['people_qty'] != 0) {
			$people_qty = $_POST['people_qty'];
			$gst = $admin_settings->gst;
			$tcs = $admin_settings->tcs;


			$base_fare = $post_base_fare_one*$people_qty;
			$gst_total = ($gst/100)*$base_fare;
			$base_plus_gst = $base_fare+$gst_total;
			$tcs_total = $base_plus_gst*($tcs/100);
			$total_number = $base_fare+$gst_total+$tcs_total;
			$pkg_amt = $this->cart->total()*$people_qty;
			$final_price = get_price_dani($pkg_amt+$total_number);
			$per_person = ($pkg_amt+$total_number)/$people_qty;

			$data = array(
				'base_fare' => get_price_dani($total_number),
				'per_person' => get_price_dani($per_person),
				'gst_total' =>  get_price_dani($base_plus_gst),
				'tcs_total' =>  get_price_dani($tcs_total),
				'final_price' => $final_price,
			);
		}else{
			$data = array(
				'base_fare' => get_price_dani(0),
				'per_person' => get_price_dani(0), 
				'gst_total' =>  get_price_dani(0),
				'tcs_total' =>  get_price_dani(0),
				'final_price' => 0,
			);

		}
		echo json_encode($data);
		
	}
}
