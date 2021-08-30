<?php
class Constant_model extends CI_Model
{
		
		// Insert Data from Any Table;
	public function insert_alltable($table_name,$data)
	{
		return $this->db->insert("$table_name", $data);
	}
		// Get Data from Any Table;
	public function get_alltable($table_name)
	{  
		$this->db->from($table_name);
		$query = $this->db->get();
		return $query->result();
	}

    public function getwhere($table,$col,$id){
        $this->db->where($col, $id)
			->from($table);
			$query = $this->db->get();
			return $query->result();
    }

	public function get_edit_data($table_name, $id){
		$this->db->where('id', $id)
			->from($table_name);
			$query = $this->db->get();
			return $query->result();
	}

	public function get_edit_row($table_name, $id){
		$this->db->where('id', $id)
			->from($table_name);
			$query = $this->db->get();
			return $query->row();
	}

        // Get Data from Any Table order by dec;
    public function get_alltable_desc($table_name)
    {
        $this->db->from($table_name);
        $this->db->order_by("id", "desc");
        $query = $this->db->get(); 
        return $query->result();
    }
	 // Delete Data from Any Table;
    public function deleteData($table, $id)
    {
        $this->db->where('id', $id);
        $this->db->delete("$table");
        return true;
    }

    // custom  delete
    public function custom_deleteData($table,$col1_name,$id)
    {
        $this->db->where("$col1_name", $id);
        $this->db->delete("$table");
        return true;
    }

    
    public function insertDataReturnLastId($table, $data)
    {
        $this->db->insert("$table", $data);
        return $this->db->insert_id();
    }

    public function insert_chat_room($table,$data)
    {
        $this->db->insert("$table", $data);
        return $this->db->insert_id();
    }
    
    public function Check_enrolled_courses($student_id,$course_id)
	{
		$this->db->select('*');
		$this->db->from('enrolled_courses');
		$this->db->where('student_id',$student_id);
        $this->db->where('course_id',$course_id);
		$result = $this->db->get();
		return $result->num_rows();
	}

    public function Check_enrolled_exercise($student_id,$course_id)
    {
        $this->db->select('*');
        $this->db->from('std_exercises');
        $this->db->where('std_id',$student_id);
        $this->db->where('exercise_id',$course_id);
        $result = $this->db->get();
        return $result->num_rows();
    }

	public function getDataOneColumn($table, $col1_name, $col1_value)
    {
        $this->db->where("$col1_name", $col1_value);
        //$this->db->order_by("id", "desc");
        $query = $this->db->get("$table");
        $result = $query->result();
        return $result;
    }

	public function getDataOneCol($table, $col1_value)
    {
        $this->db->where('pkg_id',$col1_value);
        $query = $this->db->get("$table");
        $result = $query->result();
        return $result;
    }

    
    public function updateData($table, $data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update("$table", $data);
        return true;
    }

    public function update_Custom_Data($table,$c_name, $id,$data)
    {
        $this->db->where($c_name, $id);
        $this->db->update("$table", $data);
        return true;
    }
	
    public function getOneCol($table,$col,$id)
    {
        $this->db->where("$col",$id);
        $this->db->limit('1');
        $this->db->order_by('id','desc');
        $query = $this->db->get("$table");    
        return $query->row();
    }
    public function getLatestOneRow($table)
    {
        $this->db->limit('1');
        $this->db->order_by('id','desc');
        $query = $this->db->get("$table");    
        return $query->row();
    }
    public function count_row($table,$user_type,$belong_by='')
    {
          // $q = $this->db->count_all_results($value);
        //if ($user_type == 'partner_admin') {
            $this->db->where('belong_by',$belong_by);
        //}
        if ($user_type == 'teacher') {
            $this->db->where('belong_by',$belong_by);
        }
        $this->db->where($table.'.deleted_at',NULL);
        $this->db->from($table);
        $q = $this->db->count_all_results(); 
        return $q;
    }   

    public function get_users($value,$user_id)
    {
        $this->db->select('users.id,users.user_type');
        $this->db->from('users');
        if ($value == 'all') {
            $this->db->where('user_type !=','admin');
        }if($value == 'partner_admin'){
            $this->db->where('user_type','partner_admin');
        }if($value == 'my_teachers'){
            $this->db->join('teachers','teachers.u_id = users.id');
            $this->db->where('teachers.u_id',$user_id);
        }
        if($value == 'my_students'){
            $this->db->join('students','students.u_id = users.id');
            $this->db->where('students.u_id',$user_id);
        }
        $this->db->where('status','active');
        $this->db->where('users.deleted_at',NULL);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function get_users_noti($user_id)
    {
        $this->db->select('push_notifications.*');
        $this->db->from('push_notifications');
      //  $this->db->where('read_at',0);
        $this->db->where('user_id',$user_id);
        $this->db->order_by("id", "DESC");
        $this->db->limit('4');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    public function get_total_noti($user_id)
    {
        $this->db->select('news_feed.*');
        $this->db->from('news_feed');
        $this->db->join('news_feed_noti','news_feed_noti.feed_id = news_feed.id');
        $this->db->where('news_feed.deleted_at',NULL);
        $this->db->where('news_feed_noti.user_id',$user_id);
        $this->db->order_by("news_feed.id", "DESC");
        $q = $this->db->count_all_results(); 
        return $q;
    }

    public function get_exam_questions($exam_id,$tab_num)
    {
        $this->db->select('exams_questions.*');
        $this->db->from('exams_questions');
        $this->db->where('tab_num',$tab_num);
        $this->db->where('exam_id',$exam_id);
        $this->db->order_by("exams_questions.id", "DESC");
        $this->db->where('exams_questions.deleted_at',NULL);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    public function check_call($user_id)
    {
        $this->db->where("receiver_id", $user_id);
        $this->db->where('meeting_status', 0);
        $this->db->where('user_popup', 0);
        $query = $this->db->get("calling");
         return $query->row();
    }

    public function meeting_user_info($meeting_name)
     {
        $this->db->select('users.*');
        $this->db->from('users');
        $this->db->join('calling','calling.sender_id = users.id');
        $q = $this->db->get(); 
        return $q->row();
     } 

    public function get_course_data($user_id)
    {
        $this->db->select('courses.*');
        $this->db->from('courses');
        $this->db->where('content_files !=',NULL);
        $this->db->where('belong_by',$user_id);
        $this->db->order_by("id", "DESC");
        $this->db->where('deleted_at',NULL);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function get_teacher_course_data($user_id)
    {
        $this->db->select('courses.*');
        $this->db->from('courses');
        $this->db->where('content_files !=',NULL);
        $this->db->where('teacher_id',$user_id);
        $this->db->order_by("id", "DESC");
        $this->db->where('deleted_at',NULL);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    } 

    public function get_msg_noti($id)
    {
        $this->db->select('message_noti.*');
        $this->db->from('message_noti');
        $this->db->where('room_id',$id);
        $this->db->where('user_id',$_SESSION['user_id']);
        $this->db->where('status',0);
        $this->db->where('deleted_at',NULL);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    public function std_graph()
    {
        $this->db->select('COUNT(id) as total_std, DATE_FORMAT(created_at,"%m") as monthKey');
        $this->db->from('students');
        $this->db->where('year(`created_at`)','2020');
        $this->db->where('belong_by',$_SESSION['user_id']);
        $this->db->where('deleted_at',NULL);
        $this->db->group_by("monthKey");
        $this->db->order_by("created_at", "ASC");
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    public function course_graph()
    {
        $this->db->select('COUNT(id) as total_course, DATE_FORMAT(created_at,"%m") as monthKey');
        $this->db->from('courses');
        $this->db->where('year(`created_at`)','2020');
        $this->db->where('belong_by',$_SESSION['user_id']);
        $this->db->where('deleted_at',NULL);
        $this->db->group_by("monthKey");
        $this->db->order_by("created_at", "ASC");
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    public function teacher_graph()
    {
        $this->db->select('COUNT(id) as total_teacher, DATE_FORMAT(created_at,"%m") as monthKey');
        $this->db->from('teachers');
        $this->db->where('year(`created_at`)','2020');
        $this->db->where('belong_by',$_SESSION['user_id']);
        $this->db->where('deleted_at',NULL);
        $this->db->group_by("monthKey");
        $this->db->order_by("created_at", "ASC");
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    public function partner_graph()
    {
        $this->db->select('COUNT(id) as total_partner, DATE_FORMAT(created_at,"%m") as monthKey');
        $this->db->from('partner_admin');
        $this->db->where('year(`created_at`)','2020');
        $this->db->where('deleted_at',NULL);
        $this->db->group_by("monthKey");
        $this->db->order_by("created_at", "ASC");
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function teacher_std_graph($id)
    {
        $this->db->select('COUNT(id) as total_std, DATE_FORMAT(created_at,"%m") as monthKey');
        $this->db->from('enrolled_courses');
        $this->db->where('year(`created_at`)','2020');
        $this->db->where('instructor_id',$id);
        $this->db->where('deleted_at',NULL);
        $this->db->group_by("monthKey");
        $this->db->order_by("created_at", "ASC");
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    public function teacher_course_graph($id)
    {
        $this->db->select('COUNT(id) as total_course, DATE_FORMAT(created_at,"%m") as monthKey');
        $this->db->from('courses');
        $this->db->where('year(`created_at`)','2020');
        $this->db->where('teacher_id',$id);
        $this->db->where('deleted_at',NULL);
        $this->db->group_by("monthKey");
        $this->db->order_by("created_at", "ASC");
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function delete_group_user_req($group_id,$user_id)
    {
        $this->db->where("group_id", $group_id);
        $this->db->where("user_id", $user_id);
        $this->db->delete("group_users_request");
        return true;
    }
    public function get_rate_teacher($std_id='')
    {
        $this->db->select('teachers.name as teacher_name, teacher_rating.id, teacher_rating.teacher_id');
        $this->db->from('teacher_rating');
        $this->db->join('teachers','teacher_rating.teacher_id = teachers.id');
        $this->db->where('teacher_rating.std_id',$std_id);
        $this->db->where('teacher_rating.deleted_at',NULL);
        $this->db->where('teacher_rating.rate',0);
        $this->db->order_by("teacher_rating.id", "DESC");
        $q = $this->db->get(); 
        $result = $q->result();
        return $result;
    }
    public function get_rate_student($techer_id)
    {
        $this->db->select('students.first_name, students.last_name, students.profile_pic, teacher_rating.*');
        $this->db->from('teacher_rating');
        $this->db->join('students','teacher_rating.std_id = students.u_id');
        $this->db->where('teacher_rating.teacher_id',$techer_id);
        $this->db->where('teacher_rating.deleted_at',NULL);
        $this->db->where('teacher_rating.rate !=', 0);
        $this->db->order_by("teacher_rating.id", "DESC");
        $q = $this->db->get(); 
        $result = $q->result();
        return $result;
    }
    function fileUploader($file, $input_name, $path = 'assets/upload', $fileSize = 1800, $fullpath = null, $newfilename = null, $formats = 'jpg|png|jpeg|gif|mp4' ){

        //creating folder according tot he current month and year
        if($fullpath === null || $fullpath == ''){
            $path = $path . '/' . date('Y') . '/' . date('m').'/';
        }

        //setting up config for the upload library
        $config['upload_path'] = $path;
        if (!is_dir($path)) {
            mkdir($path, 0777, TRUE);
        }
        $config['allowed_types'] = $formats;
       // $config['max_size'] = $fileSize;
        if($newfilename){
            $config['file_name'] = substr($newfilename, 0, -4);
            $config['overwrite'] = true;
            $config['overrideImageName'] = true;
        }else{
            $config['file_name'] = time(). '_' . $file['name'];
        }

        //add library
        $this->load->library('upload', $config);

        //reinitialize the configs of library otherwise it will take it from previous settings
        $this->upload->initialize($config);
        
        //make upload
        $uploaded = $this->upload->do_upload($input_name);
        
        if (!$uploaded) {
            $e = $this->upload->display_errors('', '');
            return array('error'=>$e);
        }else{
            $upload_data = $this->upload->data();
            return $path.$upload_data['file_name'];
        }
    }

	public function get_city($table)
	{
		$this->db->select('city.*,country.id as c_id,country.country_name');
		$this->db->from($table);
		$this->db->join('country', 'country.id = city.country_id','left');
		$query = $this->db->get();
		return $query->result();
	}

	public function arrival_city()
	{
		$query = $this->db->query('SELECT arrival_city.id AS id, country.id AS country_id,country.country_name As country_name,arrival.id AS arrival_id, arrival.name AS arrival_name 
		FROM arrival_city 
		JOIN country ON country.id = arrival_city.country_id 
		JOIN city AS arrival ON arrival.id = arrival_city.arrival_city_id');
		return $query->result();
	}

	public function departure_city()
	{
		$query = $this->db->query('SELECT departure_city.id AS id, country.id AS country_id,country.country_name As country_name, departure.id AS departure_id, departure.name AS departure_name 
		FROM departure_city 
		JOIN country ON country.id = departure_city.country_id 
		JOIN city AS departure ON departure.id = departure_city.departure_city_id');
		return $query->result();
	}

	public function guide_details()
	{
		$query = $this->db->query('SELECT guide_details.*,country.country_name FROM guide_details
			JOIN country ON country.id = guide_details.country_id
		');
		return $query->result();
	}

	public function itinerary_where($id)
	{
		$this->db->select('itinerary.*,packages.*, guide_details.id as guide_id, guide_details.name ,country.id as cont_id, country.country_name');
		$this->db->from('itinerary');
		$this->db->join('packages','packages.id = itinerary.pkg_id');
		$this->db->join('country','country.id = packages.country_id');
		$this->db->join('guide_details','country.id = guide_details.country_id');
		$this->db->where('itinerary.id',$id);
		$this->db->group_by('guide_id');
		$query = $this->db->get();
		return $query->result();
	}

	public function aggent_rates()
	{
		$this->db->select('aggent_rates.*,itinerary.title,packages.country_id, guide_details.id as guide_id, guide_details.name ,country.id as cont_id, country.country_name');
		$this->db->from('aggent_rates');
		$this->db->join('itinerary','itinerary.id = aggent_rates.itinerary_id');
		$this->db->join('packages','packages.id = itinerary.pkg_id');
		$this->db->join('country','country.id = packages.country_id');
		$this->db->join('guide_details','aggent_rates.guide_id = guide_details.id');
		$query = $this->db->get();
		return $query->result();
	}

	public function aggent_rates_view($id)
	{
		$this->db->select('aggent_rates.*,itinerary.title, guide_details.id as guide_id, guide_details.name ,country.id as cont_id, country.country_name, GROUP_CONCAT(size_and_cost_aggent_rates.group_type) as group_type ,GROUP_CONCAT(size_and_cost_aggent_rates.size) as size,GROUP_CONCAT(size_and_cost_aggent_rates.cost) as cost,GROUP_CONCAT(size_and_cost_aggent_rates.group_type) as group_type');
		$this->db->from('aggent_rates');
		$this->db->join('size_and_cost_aggent_rates','size_and_cost_aggent_rates.aggent_rates_id = aggent_rates.id');
		$this->db->join('itinerary','itinerary.id = aggent_rates.itinerary_id');
		$this->db->join('packages','packages.id = itinerary.pkg_id');
		$this->db->join('country','country.id = packages.country_id');
		$this->db->join('guide_details','aggent_rates.guide_id = guide_details.id');
		$this->db->where('aggent_rates.id',$id);
		$query = $this->db->get();
		return $query->row();
	}
} 
?>
