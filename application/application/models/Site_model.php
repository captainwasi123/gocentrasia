<?php

class Site_model extends CI_Model{

	public function getcustomtour($table)
	{
		$this->db->from("$table");
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
		return $query->result();
	}

	public function getwhere($table,$col,$id){
        $this->db->where($col, $id)
			->from($table);
			$query = $this->db->get();
			return $query->result();
    }

	public function getcountrywhere($id)
	{
		$query = $this->db->query('SELECT country.*, GROUP_CONCAT(country_images.img) AS c_img FROM country JOIN country_images ON country_images.country_id = country.id WHERE country.id = '.$id.'
		');
	 	return $query->row();
   
  	}

	public function geteventpackages($id='')
	{
		$query = $this->db->query('SELECT event.*, packages.package_name, packages.places_description, packages.description, packages.images, GROUP_CONCAT(activities.activity_name) AS activity_name, GROUP_CONCAT(activities.activity_img) AS activity_img FROM `event` JOIN packages ON event.package_id = packages.id JOIN package_activities ON package_activities.pkg_id = packages.id JOIN activities ON activities.id = package_activities.activity_id WHERE packages.country_id = "'.$id.'" GROUP BY event.id');

		// $query = $this->db->query('SELECT event., event.id AS e_id, packages., packages.id AS pk_id,services., GROUP_CONCAT(services.service_img) AS serv_img, package_service., activities.*,GROUP_CONCAT(activities.activity_img) AS act_img, package_activities.* FROM event INNER JOIN packages ON packages.id = event.package_id INNER JOIN package_service ON packages.id = package_service.pkg_id INNER JOIN services ON services.id = package_service.service_id INNER JOIN package_activities ON packages.id = package_activities.pkg_id INNER JOIN activities ON activities.id = package_activities.activity_id');
		return $query->result();
	}

	public function geteventpackagesforcountry($id,$limit)
	{
		$query = $this->db->query('SELECT event.*, packages.package_name, packages.places_description, packages.description, packages.images, GROUP_CONCAT(activities.activity_name) AS activity_name, GROUP_CONCAT(activities.activity_img) AS activity_img FROM `event` JOIN packages ON event.package_id = packages.id JOIN package_activities ON package_activities.pkg_id = packages.id JOIN activities ON activities.id = package_activities.activity_id WHERE packages.country_id = "'.$id.'" GROUP BY event.id LIMIT '.$limit.'');
		return $query->result();
	}

	public function geteventpackageswhere($id)
	{

		$query = $this->db->query('SELECT event.*, packages.* FROM `event`
		JOIN packages ON event.package_id = packages.id 
		-- JOIN package_activities ON package_activities.pkg_id = packages.id 
		-- JOIN activities ON activities.id = package_activities.activity_id 
		-- JOIN package_service ON package_service.pkg_id = packages.id
		-- JOIN services ON services.id = package_service.service_id
		WHERE event.id = "'.$id.'" GROUP BY event.id');
		// $query = $this->db->query('SELECT event.*, event.id AS e_id, packages.*,services.*, GROUP_CONCAT(services.service_img) AS serv_img, package_service.*, activities.*,GROUP_CONCAT(activities.activity_img) AS act_img, package_activities.*, GROUP_CONCAT(package_images.img) AS pkg_gal FROM event 
		// INNER JOIN packages ON packages.id = event.package_id
		// INNER JOIN package_service ON packages.id = package_service.pkg_id
		// INNER JOIN services ON services.id = package_service.service_id
		// INNER JOIN package_activities ON packages.id = package_activities.pkg_id
		// INNER JOIN activities ON activities.id = package_activities.activity_id
  //       INNER JOIN package_images ON package_images.pkg_id = packages.id
		// WHERE packages.id = '.$id.'');
		// $query = $this->db->query('SELECT event.*, packages.package_name, packages.places_description, packages.description, packages.images, GROUP_CONCAT(activities.activity_name) AS activity_name, GROUP_CONCAT(activities.activity_img) AS activity_img FROM `event` JOIN packages ON event.package_id = packages.id JOIN package_activities ON package_activities.pkg_id = packages.id JOIN activities ON activities.id = package_activities.activity_id WHERE event.id = '.$id.' GROUP BY event.id');
		// $query = $this->db->query('SELECT event.*, event.id AS e_id, packages.*,services.*, GROUP_CONCAT(services.service_img) AS serv_img, package_service.*, activities.*,GROUP_CONCAT(activities.activity_img) AS act_img, package_activities.*, GROUP_CONCAT(package_images.img) AS pkg_gal FROM event 
		// INNER JOIN packages ON packages.id = event.package_id
		// INNER JOIN package_service ON packages.id = package_service.pkg_id
		// INNER JOIN services ON services.id = package_service.service_id
		// INNER JOIN package_activities ON packages.id = package_activities.pkg_id
		// INNER JOIN activities ON activities.id = package_activities.activity_id
  //       INNER JOIN package_images ON package_images.pkg_id = packages.id
		// WHERE packages.id = '.$id.'');
		return $query->row();
	}

	public function getcountrybypackage($id)
	{
		$this->db->select('country.*,packages.country_id');
		$this->db->from("country");
		$this->db->join('packages', 'packages.country_id = country.id', 'left');
		$this->db->where('country.id', $id);
		$query = $this->db->get();
		return $query->row();
		
	}

	public function getpackageitinerarylimit($id,$limit)
	{	
		$query = $this->db->query('SELECT itinerary.* FROM packages
		JOIN itinerary ON packages.id = itinerary.pkg_id
		WHERE itinerary.pkg_id = '.$id.' LIMIT '.$limit.'');
		return $query->result();
	}

	public function getpackageitinerary($id,$limit,$offset)
	{	
		$query = $this->db->query('SELECT itinerary.* FROM packages
		JOIN itinerary ON packages.id = itinerary.pkg_id
		WHERE itinerary.pkg_id = '.$id.' LIMIT '.$offset.','.$limit.'');
		return $query->result();
	}

	public function getActivityByPackage($id)
	{
		$query = $this->db->query("SELECT GROUP_CONCAT(activities.activity_name) AS act_name, GROUP_CONCAT(activities.activity_img) AS act_img FROM `activities`
		INNER JOIN package_activities ON package_activities.activity_id = activities.id
		WHERE package_activities.pkg_id = ".$id."");
		
		return $query->row();
	}

	public function getServiceByPackage($id)
	{
		$query = $this->db->query("SELECT GROUP_CONCAT(services.service_name) AS serv_name, GROUP_CONCAT(services.service_img) AS serv_img FROM `services`
		INNER JOIN package_service ON package_service.service_id = services.id
		WHERE package_service.pkg_id = ".$id."");
		
		return $query->row();
	}

	public function HomePageEvent()
	{
		$query = $this->db->query("SELECT event.*,packages.country_id, packages.places_description, packages.description, packages.images FROM event
		JOIN packages ON packages.id = event.package_id
		WHERE event.show_home = 'yes'
		ORDER BY event.id DESC
		LIMIT 3");
		return $query->result();
	}

	public function RandmoEvent($limit)
	{
		$query = $this->db->query("SELECT event.*, packages.places_description, packages.description, packages.images FROM event
		JOIN packages ON packages.id = event.package_id
		ORDER BY RAND()
		LIMIT ".$limit."");
		return $query->result();
	}

	public function SimilerEvent($countryid, $limit)
	{
		$query = $this->db->query("SELECT event.*, packages.country_id, packages.places_description, packages.description, packages.images FROM event
		JOIN packages ON packages.id = event.package_id
		JOIN country ON country.id = packages.country_id
		WHERE packages.country_id = $countryid AND event.end_date >= DATE(NOW())
		LIMIT ".$limit."
		");
		return $query->result();
	}

	public function get_alltable_limit($table,$limit = null)
    {
        $this->db->from($table);
		$this->db->limit($limit);
        $query = $this->db->get();  
        return $query->result();
    }

	public function get_alltable_desc_limit($table,$limit = null)
    {
        $this->db->from($table);
		$this->db->limit($limit);
		//$this->db->order_by('id', 'desc');
        $query = $this->db->get();  
        return $query->result();
    }

	public function getrandomeventpackages($limit)
	{
		$query = $this->db->query('SELECT event.*, packages.package_name, packages.places_description, packages.description, packages.images, GROUP_CONCAT(activities.activity_name) AS activity_name, GROUP_CONCAT(activities.activity_img) AS activity_img FROM `event` JOIN packages ON event.package_id = packages.id JOIN package_activities ON package_activities.pkg_id = packages.id JOIN activities ON activities.id = package_activities.activity_id GROUP BY event.id ORDER BY RAND() LIMIT '.$limit.'');

		// $query = $this->db->query('SELECT event., event.id AS e_id, packages., packages.id AS pk_id,services., GROUP_CONCAT(services.service_img) AS serv_img, package_service., activities.*,GROUP_CONCAT(activities.activity_img) AS act_img, package_activities.* FROM event INNER JOIN packages ON packages.id = event.package_id INNER JOIN package_service ON packages.id = package_service.pkg_id INNER JOIN services ON services.id = package_service.service_id INNER JOIN package_activities ON packages.id = package_activities.pkg_id INNER JOIN activities ON activities.id = package_activities.activity_id');
		return $query->result();
	}

	public function getrandomeventpackagesbottom()
	{
		$query = $this->db->query('SELECT event.*, packages.package_name, packages.places_description, packages.description, packages.images, GROUP_CONCAT(activities.activity_name) AS activity_name, GROUP_CONCAT(activities.activity_img) AS activity_img FROM `event` JOIN packages ON event.package_id = packages.id JOIN package_activities ON package_activities.pkg_id = packages.id JOIN activities ON activities.id = package_activities.activity_id GROUP BY event.id ORDER BY RAND() LIMIT 3');

		// $query = $this->db->query('SELECT event., event.id AS e_id, packages., packages.id AS pk_id,services., GROUP_CONCAT(services.service_img) AS serv_img, package_service., activities.*,GROUP_CONCAT(activities.activity_img) AS act_img, package_activities.* FROM event INNER JOIN packages ON packages.id = event.package_id INNER JOIN package_service ON packages.id = package_service.pkg_id INNER JOIN services ON services.id = package_service.service_id INNER JOIN package_activities ON packages.id = package_activities.pkg_id INNER JOIN activities ON activities.id = package_activities.activity_id');
		return $query->result();
	}

	public function getcountrylimit($limit)
	{
		$this->db->select('*');
		$this->db->from('country');
		$this->db->limit($limit);
		
		
	}
}
