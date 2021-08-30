 $(document).ready(function(){


 	var val1 = 0;

 	$('.navbar-handler').children("img").click(function(){

 		if(val1==0){
 			$(this).attr("src","https://dnpprojects.com/demo/travel_web_admin/assets/site/images/cross.png")
 		$('.navbar-custom').slideToggle()

 		val1 = 1;
 	
 	}
 	else {
 		$('.navbar-custom').slideToggle()
 		$(this).attr("src","https://dnpprojects.com/demo/travel_web_admin/assets/site/images/hamburger.png")
 		val1 = 0;

 	}
 	})
 })


 $(window).scroll(function() {
var $height1 = $(window).scrollTop();
if($height1 > 10) {
 $('body').addClass("header-fixed")

} else {
 $('body').removeClass("header-fixed")
}
});



 $(function () {
   var bindDatePicker = function() {
		$(".date").datetimepicker({
        format:'YYYY-MM-DD',
			icons: {
				time: "fa fa-clock-o",
				date: "fa fa-calendar",
				up: "fa fa-arrow-up",
				down: "fa fa-arrow-down"
			}
		}).find('input:first').on("blur",function () {
			// check if the date is correct. We can accept dd-mm-yyyy and yyyy-mm-dd.
			// update the format if it's yyyy-mm-dd
			var date = parseDate($(this).val());

			if (! isValidDate(date)) {
				//create date based on momentjs (we have that)
				date = moment().format('YYYY-MM-DD');
			}

			$(this).val(date);
		});
	}
   
   var isValidDate = function(value, format) {
		format = format || false;
		// lets parse the date to the best of our knowledge
		if (format) {
			value = parseDate(value);
		}

		var timestamp = Date.parse(value);

		return isNaN(timestamp) == false;
   }
   
   var parseDate = function(value) {
		var m = value.match(/^(\d{1,2})(\/|-)?(\d{1,2})(\/|-)?(\d{4})$/);
		if (m)
			value = m[5] + '-' + ("00" + m[3]).slice(-2) + '-' + ("00" + m[1]).slice(-2);

		return value;
   }
   
   bindDatePicker();
 });
 
 
 
 $(document).ready(function() {
  

  $(".set > a").on("click", function() {
    if ($(this).hasClass("active")) {
      $(this).removeClass("active");
      $(this)
        .siblings(".content")
        .slideUp(200);
      $(".set > a i")
        .removeClass("fa-minus")
        .addClass("fa-plus");
    } else {
      $(".set > a i")
        .removeClass("fa-minus")
        .addClass("fa-plus");
      $(this)
        .find("i")
        .removeClass("fa-plus")
        .addClass("fa-minus");
      $(".set > a").removeClass("active");
      $(this).addClass("active");
      $(".content").slideUp(200);
      $(this)
        .siblings(".content")
        .slideDown(200);
    }
  });
 
 
 /*var hah1 = $(".slick-track").height();
 
 $(".custom-tours").find(".package-box2").css("height",hah1)*/

});

$(function() {
  $("#price-range").slider({range: true, min: 0, max: 200000, values: [0, 200000], slide: function(event, ui) {$("#priceRange").val("$" + ui.values[0] + " ~ $" + ui.values[1]);}
  });
  $("#priceRange").val("$" + $("#price-range").slider("values", 0) + " ~ $" + $("#price-range").slider("values", 1));
  
  $("#mpg-range").slider({range: true, min: 10, max: 100, values: [0, 100], slide: function(event, ui) {$("#MPGRange").val(ui.values[0] + " - " + ui.values[1]);}
  });
  $("#MPGRange").val($("#mpg-range").slider("values", 0) + " ~ " + $("#mpg-range").slider("values", 1));
  
  $("#mileage-range").slider({range: true, min: 0, max: 200000, values: [0, 200000], slide: function(event, ui) {$("#mileageRange").val(ui.values[0] + " - " + ui.values[1]);}
  });
  $("#mileageRange").val($("#mileage-range").slider("values", 0) + " ~ " + $("#mileage-range").slider("values", 1));
});

 
