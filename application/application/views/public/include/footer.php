<!-- Footer Section Starts Here -->
<footer>
         <div class="container">
            <div class="footer-about">
               <a href=""> <img src="<?=base_url().'assets/site/'?>images/footer-logo.jpg"> </a>
               <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat... </p>
               <h6> <a href=""> <i class="fa  fa-user"> </i> support@ocentrasia.com </a> </h6>
               <h6> <a href=""> <i class="fa  fa-phone"> </i> +44-2033185978 </a> </h6>
            </div>
            <div class="footer-list">
               <h3 class="footer-heading1"> Explore </h3>
               <ul>
                  <li> <a href=""> Home </a> </li>
                  <li> <a href=""> Destination </a> </li>
                  <li> <a href=""> Custom Tour </a> </li>
                  <li> <a href=""> About Us </a> </li>
                  <li> <a href="https://dnpprojects.com/demo/travel_web_admin/Home/blogs_all"> Blog </a> </li>
                  <li> <a href="<?=base_url()?>home/terms_and_conditions"> Cancellation Policy </a> </li>
                  <li> <a href=""> Privacy Policy </a> </li>
                  <li> <a href=""> Contact Us </a> </li>
               </ul>
            </div>
            <div class="footer-news">
               <h3 class="footer-heading1"> Get Our NewsLetter </h3>
               <p> Sign up for the latest insights and ideas
                  from  Katherine worrell 
               </p>
               <form>
                  <input type="text" placeholder="Email Address" name="">
                  <input type="submit" value="SEND" name="">
               </form>
               <div class="footer-social">
                  <h6> FOLLOW US </h6>
                  <a href=""> <i class="fab fa-facebook-f"> </i> </a>
                  <a href=""> <i class="fab fa-twitter"> </i> </a>
                  <a href=""> <i class="fab fa-instagram"> </i> </a>
                  <a href=""> <i class="fab fa-pinterest"> </i> </a>
                  <a href=""> <i class="fab fa-linkedin"> </i> </a>
               </div>
            </div>
         </div>
      </footer>
      <!-- Footer Section Ends Here -->
      <!-- Copyrights Section Starts Here -->
      <section class="copyrights">
         <span> © 2020 gocentrasia All Rights Reserved. </span>
      </section>
      <!-- Copyrights Section Ends Here -->
      <!-- Bootstrap Javascript -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="<?=base_url().'assets/site/'?>js/bootstrap.min.js"> </script>
      <script src="<?=base_url().'assets/site/'?>js/functions.js"> </script>
      <script src="<?=base_url().'assets/site/'?>js/slick-slider.js"> </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.5/js/lightslider.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/js/bootstrap-datetimepicker.min.js"></script>
      <script type="text/javascript">
         $('#lightSlider').lightSlider({
         gallery: true,
         item: 1,
         loop:true,
         slideMargin: 0,
         thumbItem: 10,
         speed: 900
         });
      </script>
      <script>
    $(document).ready(function(){
 
  slideShow();


 
function slideShow(){
  
 
  
 
    var current = $('#slider .show');
 
  var next = current.next().length ? 
      current.next() :
      // if index == false then show first img
      current.siblings().first();
  
 
   current.hide().removeClass('show');
   next.fadeIn("slow").addClass('show');
  
  
 
  setTimeout(slideShow, 3000);
  
};
  
});    
      </script>
      <script>
          
 $('.tours-slick-slider').slick({
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 1,
  focusOnSelect: false,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },

    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },

    {
      breakpoint: 700,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },

    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
         slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});


      </script>
   </body>
</html>
<!-- GetButton.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "+1(800) 123-45-67", // WhatsApp number
            call_to_action: "Message us", // Call to action
            position: "left", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /GetButton.io widget -->
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6075734e067c2605c0c1eccd/1f35ckr2j';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->