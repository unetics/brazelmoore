<?php get_header(); ?>
<style type="text/css" media="screen">
	.event_info{
		width: 70%;
		float: left;
		padding: 15px;	
	}
	.booking_details{
		width: 30%;
		float: left;
		padding: 15px;
	}
	.map .em-location-map-container{
		width: 100% !important;
		height: 250px!important;
		margin-bottom: 50px;
	}
	input, textarea{
		width: 100%;
		border: 2px solid #aaa;
		  font-size: 15px;
		  line-height: 22px;
		  padding: 8px 12px;
		  border-radius: 4px;
		  box-shadow: none;
	}
	.em-tickets-spaces:after {
  visibility: hidden;
  display: block;
  font-size: 0;
  content: " ";
  clear: both;
  height: 0;
}
.em-tickets-spaces label, .em-tickets-spaces select{
	width: 70%;
	float: left;
}
.em-tickets-spaces label{
	padding: 7px;
	text-align: left;
	width: 30%;
	color: #AEA9A9;
	
}

	.em-booking-form-details {
	  padding: 0px;
	  width: auto;
	  float: none;
	}
	.em-booking{
		margin: 0;
	}
	select {
    padding:3px;
    margin: 0;
    border-radius:4px;
    font-size: 14px;
    background: white;
    color:#888;
    border:solid #AAAAAA 2px;
    outline:none;
    display: inline-block;
    appearance:none;
    cursor:pointer;
}
.em-booking-submit{
border: none;
  font-size: 18px;
  font-weight: 300;
  line-height: 1.4;
  border-radius: 0;
  padding: 10px 15px;
  -webkit-font-smoothing: subpixel-antialiased;
  transition: border .25s linear, color .25s linear, background-color .25s linear;
  display: inline-block;
  text-align: center;
    color: white;
  background-color: black;
  border-top: 2px solid #777;
  }
  
.em-booking-form-details input.input, .em-booking-form-details textarea {
  width: 100%;
}

@media screen and (max-width: 1000px) {
	.event_info, .booking_details{
		width: 100%;
		float: none;
	}
}
}
</style>
<body>
	<?php get_template_part( 'nav/init' ); ?>
	<main>
		<div class="container">
<?php
if (class_exists('EM_Events')) {
	echo EM_Events::output( array('format'=>'

	<div class="single_event clearfix">
		
		<div class="event_info">
		<h3>#_EVENTNAME</h3>
		<br/>
			<div class="description">#_EVENTNOTES</div>
		</div>
		
		<div class="booking_details">
			<div class="tile">
				<p>
				<strong>Date/Time</strong><br>
				Date - #_EVENTDATES<br>
				Time - <i>#_EVENTTIMES</i>
				</p>
				<p>
				<strong>Location</strong><br>
				#_LOCATIONNAME
				</p>
			</div>
			<div class="tile">
				<p><strong>Reserve Your Seats</strong></p>
				#_BOOKINGFORM
			</div>
		</div>
	</div>
	<div class="map">#_LOCATIONMAP</div>
	',
	'limit'=>1) );
}
?>
</div>
	</main>
<?php get_footer(); ?>