<?php

class Package_model extends CI_Model{

    public function packageView($id)
    {
        $query = $this->db->query("SELECT packages.*, country.*,services.*,activities.*,itinerary.*, package_images.*
        FROM packages
        JOIN package_service ON packages.id = package_service.pkg_id AND services.id = package_service.service_id
        JOIN package_activities ON packages.id = package_activities.pkg_id AND activities.id = package_activities.activity_id
        JOIN country ON country.id = packages.country_id
        JOIN services ON services.id = package_service.service_id
        JOIN activities ON activities.id = package_activities.activity_id
        JOIN itinerary ON itinerary.pkg_id = packages.id
        JOIN package_images ON package_images.pkg_id = packages.id
        WHERE packages.id = ".$id."");

        return $query->result();
    }
}