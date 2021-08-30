<?php 

class Custom_tours extends CI_Model{


    public function addcustomtour($data){
        $this->db->insert('custom_tour',$data);
    }

    public function getcustomtour()
	{  
		$this->db->from('custom_tour');
		$query = $this->db->get();
		return $query->result();
	}

	public function custom_tour()
	{
		$query = $this->db->query('SELECT custom_tour.*,city.id as city_id ,city.name AS city_name, city.longitude AS city_longitude, city.latitude AS city_latitude, GROUP_CONCAT(activities.activity_name) AS activity_name, GROUP_CONCAT(activities.activity_img) AS activity_img, GROUP_CONCAT(activities.id) AS act_id FROM `custom_tour`
		JOIN city ON custom_tour.city_id = city.id 
		JOIN custom_tour_activities ON custom_tour.id = custom_tour_activities.custom_id 
		JOIN activities ON activities.id = custom_tour_activities.activity_id GROUP by custom_tour.id'
		);
		return $query->result();
	}

	public function getTourByActivityName($data)
	{
		$query = $this->db->select('custom_tour.*,city.id as city_id ,city.name AS city_name, city.longitude AS city_longitude, city.latitude AS city_latitude, GROUP_CONCAT(activities.activity_name) AS activity_name, GROUP_CONCAT(activities.activity_img) AS activity_img')->from('custom_tour')
		->join("city","custom_tour.city_id = city.id ")
		->join("custom_tour_activities", "custom_tour.id = custom_tour_activities.custom_id",) 
		->join("activities","activities.id = custom_tour_activities.activity_id")->group_by("custom_tour.id")
		->where_in('custom_tour_activities.activity_id', $data)->get();
		return $query->result();
	}
	public function getTourByCity($city_id)
	{
		$query = $this->db->select('custom_tour.*,city.id as city_id ,city.name AS city_name, city.longitude AS city_longitude, city.latitude AS city_latitude, GROUP_CONCAT(activities.activity_name) AS activity_name, GROUP_CONCAT(activities.activity_img) AS activity_img')->from('custom_tour')
		->join("city","custom_tour.city_id = city.id ")
		->join("custom_tour_activities", "custom_tour.id = custom_tour_activities.custom_id",) 
		->join("activities","activities.id = custom_tour_activities.activity_id")->group_by("custom_tour.id")
		->where('custom_tour.city_id', $city_id)->get();
		return $query->result();
	}

	public function your_itinerary($id){
		$query = $this->db->select('custom_tour.*, GROUP_CONCAT(activities.activity_name) AS activity_name, GROUP_CONCAT(activities.activity_img) AS activity_img')->from('custom_tour')
		->join("custom_tour_activities", "custom_tour.id = custom_tour_activities.custom_id",) 
		->join("activities","activities.id = custom_tour_activities.activity_id")->group_by("custom_tour.id")->where_in('custom_tour.id', $id)->get();
		return $query->result();	
	}


	public function getActivityByCustomTour()
	{
		$this->db->select('*');
		$this->db->from('activities');
		$this->db->where('custom_tour_activity', "1");
		$query = $this->db->get();
		return $query->result();
	}

}
