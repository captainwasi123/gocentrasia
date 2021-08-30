<?php

class Home extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('custom_helper');
        $this->load->model("constant_model");
        $this->load->model("Blogs_model");
        $this->load->helper("custom_helper");
		$this->load->helper("price_helper");
		$this->load->model("Site_model");
		$this->load->model("Custom_tours");
		$this->load->library('cart');
		$this->load->library('Pdf');
		
    }
    public function index()
    {   $this->cart->destroy();
        $data = array(
            'country' => $this->Site_model->get_country_limit('country',5),
            'custom' => $this->Site_model->getcustomtour("custom_tour"), 
			'event' => $this->Site_model->HomePageEvent(), 
			'slider' => $this->constant_model->get_alltable('slider'),
			'home' => $this->Constant_model->getOneCol('home_page','id',1),
        );
        $this->load->view('public/index',$data);
    }

	public function load_country()
	{
		$c = $this->Site_model->get_alltable_desc_limit('country');
		// 'country' => $this->Site_model->get_alltable_desc_limit('country',3),
		echo json_encode($c);
	}

    public function destination()
    {
        $data = array(
            "title" => "Destination",
			'country' => $this->Site_model->get_country_limit('country',5),
        );
        $this->load->view('public/destination',$data);
    }

    public function custom_tour()
    {
     // echo "<pre>"; print_r($this->cart->contents()); 
     //    $icon = 'icon1.png'; 
     //    $city = $this->Constant_model->get_alltable('city');
     //    foreach ($city as $key => $city_val) {
     //        foreach ($this->cart->contents() as $key => $items) { 
     //            if($city_val->id == $items["option"]["city_id"]){ 
     //                $icon = 'icon3.png';
     //            }    
     //        }
     //     //   if(empty($this->cart->contents())){ $icon = 'icon1.png';  }

     //     //   if($icon == ''){ $icon = 'icon1.png'; }
     //        $a[] = $icon;
     //    }
     //    print_r($a);
     //    echo die();
		 $data = array(
            "title" => "Custom Tour",
			"activity" => $this->constant_model->getDataOneColumn('activities','custom_tour_activity',1),
			"custom_tour" => $this->Custom_tours->custom_tour(),
            "city" => $this->Constant_model->get_alltable('city'),
            "map_center" => $this->Constant_model->getLatestOneRow('city'),
        );

	   $this->load->view('public/custom_tour',$data);
    }

	public function your_itinerary(){
		if(!empty($this->cart->contents())){
			$id = [];
			foreach ($this->cart->contents() as $key => $item) {
				$id[] = $item["id"];
				
			} //print_r($id); exit;
			$data = array(
				"title" => "Custom Tour",
				"activity" => $this->constant_model->get_alltable('activities'),
				'service' => $this->constant_model->get_alltable('services'),
				"custom_tour" => $this->Custom_tours->your_itinerary($id),
				"setting" => $this->Constant_model->getOneCol('website_setting','id',1),
			);
			//print_r(json_encode($data)); die;
			$this->load->view('public/show_your_itinerary',$data);
		}else{
			return redirect(base_url("Home/custom_tour"));
		}
	} 

    public function about()
    {
        $data = array(
            "title" => "About Us",
			'review' => $this->Constant_model->get_alltable('client_reviews'),
			'partner' => $this->Constant_model->get_alltable('our_partners'),
			'about' => $this->Constant_model->getOneCol('about_us','id',1)
        );

		//print_r(json_encode($data)); die;
        $this->load->view('public/about_us',$data);
    }

    public function contact()
    {
        $data = array(
            "title" => "Contact Us",
        );
        $this->load->view('public/contact',$data);
    }

    public function blogs_all()
    {
        $data = array(
            "title" => "Blogs",
            //"blogs" => $this->Blogs_model->getAllBlogs()
			'rendomevent' => $this->Site_model->getrandomeventpackages(5),
        );
        $this->load->library("pagination");
        $config = [
                   "base_url"        =>   base_url("Home/blogs_all"),
                   "per_page"        =>   5,
                   "total_rows"      =>   $this->Blogs_model->num_rows(),
                   "full_tag_open"   =>   "<ul class='pagination'>",
                   "full_tag_close"  =>   "</ul>",
                   "first_tag_open"  =>   "<li>",
                   "first_tag_close" =>   "</li>",
                   "last_tag_open"   =>   "<li>",
                   "last_tag_close"  =>   "</li>",
                   "next_tag_open"   =>   "<li>",
                   "next_tag_close"  =>   "</li>",
                   "prev_tag_open"   =>   "<li>",
                   "prev_tag_close"  =>   "</li>",
                   "num_tag_open"    =>   "<li>",
                   "num_tag_close"   =>   "</li>",
                   "cur_tag_open"    =>   "<li><a style='background-color:#2196f3; color:white;'>",
                   "cur_tag_close"   =>   "</a></li>",
                  ];
        $this->pagination->initialize($config);
        $data['blogs'] = $this->Blogs_model->bloglist($config["per_page"],$this->uri->segment(3));


        $this->load->view('public/blogs_all',$data);
    }

    public function blog_detail($id)
    {
        $id = hashids_decrypt($id);
        $data = array(
            "title" => "Blog Detail",
            "blog" => $this->Blogs_model->getAllBlogsWhere($id),
			"random" => $this->Blogs_model->getrandomblogslimit(2),
			'rendomevent' => $this->Site_model->getrandomeventpackages(5),
        );
		//print_r(json_encode($data)); die;
        $this->load->view('public/blog_detail',$data);
    }

    public function packages($id)
    {
		$id = hashids_decrypt($id);
		//echo "<pre>"; 
		$event = $this->Site_model->geteventpackageswhere($id);
        $pkg = $event->package_id;
		$c_id = $event->country_id;
    	$data = array(
            "title" => "Packages",
			'event' => $event,
			'country' => $this->Site_model->getcountrybypackage($c_id),
			'itin' => $this->Site_model->getpackageitinerarylimit($pkg,7),
			'activity' => $this->Site_model->getActivityByPackage($pkg),
			'service' => $this->Site_model->getServiceByPackage($pkg),
            'img_galary' => $this->Constant_model->getDataOneColumn('package_images','pkg_id', $pkg),
			'rendomevent' => $this->Site_model->getrandomeventpackages(5),
			'rendomeventbottom' => $this->Site_model->getrandomeventpackagesbottom(),
        );
		//echo json_encode($data); die;
        $this->load->view('public/packages',$data);
    }

	public function Loaditin()
	{
		$id = $_POST["id"];
		$limit = 7;
		if(isset($_POST["id"])){
			$page = $_POST["offset"];
		}
		$data =  $this->Site_model->getpackageitinerary($id,$limit,$page);
		//echo $this->db->last_query();
		$html = "";
		$pages = $page+7;
		foreach ($data as $key => $value) {
			$lastid = $value->id;
			
		$html .=  "<div class='path-box'>";
		$html .= "<h4> $value->title </h4>";
		$html .= '<h5> <img src="'.base_url().'assets/site/images/pin-icon.jpg"> </h5>';
		$html .=		"<div>";
		$html .=	'<img src=" '.base_url().$value->img.' " />';

		$html .=  '<p>'. $value->detail .'</p>';
		$html .=	"</div>";
				
		$html .=	"</div>";
		}
		$html .=	"<div class='inclusion-button'>";
		$html .=		"<a href='javascript:void(0)' id='load-itin' data-id='". $id ."' data-limit='". $pages ."'> SHOW MORE </a>";
		$html .=	" </div>";
	}

	public function downloaditinerary ($id)
	{
		$id = hashids_decrypt($id); 
		$data['itin'] = $this->Site_model->getpackageitinerary($id);
		$this->load->view('public/downloaditinerary', $data);
		$html = $this->output->get_output();
		$this->dompdf->loadHtml($html);

		$this->dompdf->setPaper('A4', 'landscape');

		$this->dompdf->render();

		$this->dompdf->stream('downloaditinerary.pdf',array('Attachment' => 0));
		
	}

    public function country($id)
    { 
		$id = hashids_decrypt($id); 
		// echo $id . die;
		$data = array(
			"id" => $id,
            "title" => "Tour Country",
			'activity' => $this->Constant_model->get_alltable('activities'),
			'country' => $this->Site_model->getcountrywhere($id),
			'event' => $this->Site_model->geteventpackagesforcountry($id,3),
			'rendomevent' => $this->Site_model->getrandomeventpackages(3),
			'destination' => $this->Site_model->get_country_limit('country',5),
        );
		

		//print_r(json_encode($data)); die;
        $this->load->view('public/kazakhstan',$data);
    }



	public function getTourByActivity()
	{	
		//print_r($_POST); die();
        // if (isset($_POST["formData"])) {
             
        //  }else{
        //     $d = $this->Custom_tours->custom_tour();
        //  } 
         $act = $_POST["formData"];
             $d = $this->Custom_tours->getTourByActivityName($act);
             //print_r($_POST); die();
    	$res["data"] = $d;
		echo $this->load->view('public/CustomToursByActivity', $res, TRUE);
		
	}

    public function getTourByCity()
    {   
        $city_id = $_POST["formData"];
             $d = $this->Custom_tours->getTourByCity($city_id);
        $res["data"] = $d;
        echo $this->load->view('public/CustomToursByActivity', $res, TRUE);
        
    }

    public function add_itinerary_cart()
    {
        # code...
    }
    // public function kyrgyzstan()
    // {
    //     $data = array(
    //         "title" => "kyrgyzstan"
    //     );
    //     $this->load->view('public/kyrgyzstan',$data);
    // }

    // public function tajiskistan()
    // {
    //     $data = array(
    //         "title" => "tajiskistan"
    //     );
    //     $this->load->view('public/tajiskistan',$data);
    // }

    // public function turkmenistan()
    // {
    //     $data = array(
    //         "title" => "turkmenistan"
    //     );
    //     $this->load->view('public/turkmenistan',$data);
    // }

    // public function uzbekistan()
    // {
    //     $data = array(
    //         "title" => "uzbekistan"
    //     );
    //     $this->load->view('public/uzbekistan',$data);
    // }
     public function terms_and_conditions()
	{
		$data = array(
			'title' => 'Terms-And-Conditions', 
            'data' => $this->Constant_model->get_alltable_desc('terms_and_conditions'),
		);
		$this->load->view('public/terms_and_conditions',$data);
	}
    public function package_form()
    { 
        $data = array(
            'title' => 'Package Form', 
            'from_data' => $_POST,
        );
        $this->load->view('public/package_form',$data);
    }

	public function price_range_filter()
	{
		//print_r($_POST);
		$data = array(
			'min_price' => $_POST['min'],
			'max_price' => $_POST['max']
		);

		// $data = array();
		// $act_id = [];
		// foreach ($_POST['activty_id'] as $key => $value) {
		// 	$act_id[$key] = $value;
		// }
		
		// $price = explode('~',$_POST['pricerange']);
		// $min_price = substr($price[0],1);
		// $max_price = substr($price[1],-6);

		// $data['act_id'] = $act_id;
		// $data['min_price'] = $min_price;
		// $data['max_price'] = $max_price;
		
		$res = $this->Site_model->price_range_filter($data);
		$html = '';
		foreach ($res as $key => $value) {
			$act_name = explode(',',$value->activity_name);
			$act_imgs = explode(',',$value->activity_img);
			$html .= '<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
			<a href="<?=base_url()?>Home/packages/"'.hashids_encrypt($value->id).'""
				style="background: none; color: none; font-weight: none; letter-spacing: none; padding: none; border-radius: none;"
				>
				<div class="package-box2">
					<div class="package-box2-image">
					<img src="'.base_url().$value->images.'">
					<h4> '. $value->event_name .' </h4>
					</div>
					<div class="package-box2-middle">
					<p> '.$value->description.'  </p>
					<p> <b> Places: </b> <span> '.$value->places_description.' </span></p>
					<h6> 
						<span> Group Tour</span>
						<b> INR '.number_format($value->group_price).' </b>
					</h6>
					<h6> 
						<span>Private Tour</span>
						<b> INR '.number_format($value->private_price).' </b>
					</h6>
					</div>
					<div class="package-box2-features"> ' ?>
					<?php 
					foreach($act_name as $key => $val) { 
						if ($key <= 4) {
							'<span> <img src="<?=base_url()?>assets\img\activity_img\"'.$act_imgs[$key].'"?>">'. $val .'</span>';
						}
					} 
					
					'</div>
					<div class="package-box2-detail">
					<a href="<?=base_url()?>Home/packages/"'.hashids_encrypt($value->id).'""> VIEW DETAIL </a>
					</div>
				</div>
			</a>';
		}
	}
}
