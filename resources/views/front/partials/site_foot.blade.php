<footer class="footer">
			<div class="container">
					<div class="col-md-4 col-sm-4">
					<h4 class="_16">Unilink Software Pvt. Ltd.</h4>
					<h4 class="_12">Greater Kailash Area, New Delhi - 110019
					</h4>
			</div>
					
					<div class="col-md-4 col-sm-4">
							<h4 class="_14">Reach Us</h4>
						  <h4 class="_13"><i class="fa fa-phone"></i>&nbsp&nbsp+91-11-41601701&nbsp&nbsp|&nbsp&nbsp<i class="fa fa-mobile"></i>&nbsp&nbsp+91-9811261602</br>
						 <i class="fa fa-envelope-o"></i>&nbsp&nbsp <a href="mailto:info@unilinkindia.com" style="color:white;">info@unilinkindia.com</a> </br>
						  Skype:<a href="skype:nnmathur" style="color:white;">nnmathur</a></h4>
						
					</div>
					<div class="col-sm-4 col-md-4">
					<div class="footer-social-icons">
						<h4 class="_14">Follow us on</h4>
						<ul class="social-icons">
							<li><a href="https://www.facebook.com/unilinksoft/" class="social-icons" target="blank"><i class="fa fa-facebook"></i></a></li>
							<li><a href="https://www.twitter.com/unilinkindia" class="social-icons" target="blank"> <i class="fa fa-twitter"></i></a></li>
							<li><a href="skype:nnmathur" class="social-icons"> <i class="fa fa-skype" target="blank"></i></a></li>
							<li><a href="https://www.youtube.com/channel/UCzD-xRspsSYgvsp8dB7nbWQ" class="social-icons" target="blank"> <i class="fa fa-youtube"></i></a></li>
							<li><a href="https://www.linkedin.com/company/unilink-software/" class="social-icons" target="blank"> <i class="fa fa-linkedin"></i></a></li>
						</ul>
				</div>
					</div>	
					
					<div class="clear"></div>
					<!-- <div class="col-md-3 col-sm-3 pull-right footer-copyright"><a href="" title="Terms of Use">Terms of Use</a>&nbsp; <span class="footer-dot">&#46;</span> &nbsp;<a href="mailto:info@unilinkindia.com" title="Privacy Policy">Privacy Policy</a></div> -->
                   
			</div>

</footer>
		

    <script src="js/jquery.min.js"></script>
    
    <script src="{{ asset('front1/js/bootstrap.js') }}" type="text/javascript"></script>    
    <script src="{{ asset('front1/js/jquery.validate.js') }}" type="text/javascript"></script>
    <script src="{{ asset('front1/js/jquery-validate.bootstrap-tooltip.js') }}" type="text/javascript"></script>
    <script src="{{ asset('front1/js/validation.js') }}" type="text/javascript"></script>
	<script src="{{ asset('front1/js/inrhythm.js') }}" type="text/javascript"></script>
	<script src="{{ asset('front1/js/main.js') }}"></script>
    <script src="{{ asset('front1/js/wow.min.js') }}"></script>
   
<script type="text/javascript">
var $zoho=$zoho || {};$zoho.salesiq = $zoho.salesiq || 
{widgetcode:"93ab329fec2b65d383348291e989603b92691243c544a1a90276a6032210a361244e1b99d4812877dee795b5ce3a1d9a", values:{},ready:function(){}};
var d=document;s=d.createElement("script");s.type="text/javascript";s.id="zsiqscript";s.defer=true;
s.src="https://salesiq.zoho.com/widget";t=d.getElementsByTagName("script")[0];t.parentNode.insertBefore(s,t);d.write("<div id='zsiqwidget'></div>");
</script>
  </body>
  <script>
  	$(document).ready(function() {
  $('.counter').each(function() {
    var $this = $(this);
    var countTo = $this.text();
    $({ countNum: 0 }).animate({
      countNum: countTo
    }, {
      duration: 2000,
      easing: 'linear',
      step: function() {
        $this.text(Math.floor(this.countNum));
      },
      complete: function() {
        $this.text(this.countNum);
      }
    });
  });
});
  </script>


</html>