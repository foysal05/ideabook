

<?php
session_start();
	date_default_timezone_set('Asia/Dhaka');
	if($_SESSION['login']==TRUE AND $_SESSION['status']=='Activate'){

?>
<html>
	<head>
  <title>ideaBook</title>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="../css/bootstrap.css">
	  <link rel="stylesheet" href="../css/bootstrap.min.css">
	  <link href="../css/sb-admin-2.css" rel="stylesheet">
	  <link rel="stylesheet" href="../css/style.css">
	  <link rel="stylesheet" href="../css/file_upload.css">
	  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
	  <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
  
  
  <!-- sweet alert box-->
  
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	  <script src="../js/file_upload.js"></script>
	  <script src="../js/checkbox.js"></script>
   
   <script type="text/javascript" src="jquery-1.8.0.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body >
        
<nav class="navbar navbar-inverse" style="background-color:#428BCA; border-color:#428BCA" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.php">ideaBook</a>
  </div>
<style>
.navbar-inverse .navbar-nav>li>a{
	color:#FFFFFF;
}
.navbar-inverse .navbar-brand{
	color:#FFFFFF;
}
.navbar-inverse .navbar-nav>.active>a, .navbar-inverse .navbar-nav>.active>a:hover, .navbar-inverse .navbar-nav>.active>a:focus{
	color: white;
	background-color:#428C02;
}
	  .dropdown-menu>li>a{
	color:white;
}
.navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:hover, .navbar-inverse .navbar-nav>.open>a:focus{
		 background-color:#428C02;
	 }
	  </style>
  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
     
    </ul>
	
    
	
    <ul class="nav navbar-nav navbar-right" style="backgruund-color:#337AB7">
			  
				  <li class="dropdown">
				   <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-envelope" style="font-size:18px;"></span></a>
				   <ul class="dropdown-menu"></ul>
				  </li>
			 
	 <li class="active"><a href="timeline.php"><?php echo $_SESSION['name'];?></a></li>
      <li ><a href="index.php">Home</a></li>
      <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
     
	  <li><a href="index.php"></a></li>
	  <li><a href="index.php"></a></li>
      
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>	
<script>
$(function() {
    $( "#std" ).autocomplete({
        source: '../user_search.php'
    });
});
</script>
  
  <div style="color:white; display:none">
              
			   </div>

  
  
  <!-- Content here -->
  <div class="container-fluid" style="height:auto;">
  
  <div class="row content" style="height:auto;width:100%">
   <div class="col-sm-3 sidenav">
      <h4></h4>
      <ul class="nav nav-pills nav-stacked">
	  
		<?php
		if($_SESSION['user_type']=='STAFF'){
			//echo $_SESSION['user_type'];
			?>
		
		
       
        <li><a href="#section2"><?php echo $_SESSION['name']; ?></a></li>
		<li ><a href="../admin/control/index.php">Control</a></li>
        <li><a href="index.php">Home</a></li>
        <li  class="active"> <a href="timeline.php">Timeline</a></li>
			<?php
		}else{
			?>
			<li ><a href="index.php">Home</a></li>
			<li class="active"><a href="timeline.php">Timeline</a></li>
			<li><a href="category.php">Idea Category</a></li>
			<li><a href="message.php">Message</a></li>
			<?php
				
			}
			
			?>
	  
	  
        
		
      </ul><br>
      
	  <br>
	  <div class="panel panel-default">
		<div style="height:200px">
        <img src="../image/ib.png" height="100%" width="70%"><strong style="color:#337AB7; font-size:1.4em">ideaBook</strong>
		</div>
      </div>
	  
    </div>
		<div class="col-sm-8">
            
          <h2>Welcome to ideaBook</h2>
	<p>These terms and conditions outline the rules and regulations for the use of ideaBook's Website.</p> <br /> 
	
	<p>By accessing this website we assume you accept these terms and conditions in full. Do not continue to use ideaBook's website 
	if you do not accept all of the terms and conditions stated on this page.</p>
	<p>The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice
	and any or all Agreements: “Client”, “You” and “Your” refers to you, the person accessing this website
	and accepting the Company’s terms and conditions. “The Company”, “Ourselves”, “We”, “Our” and “Us”, refers
	to our Company. “Party”, “Parties”, or “Us”, refers to both the Client and ourselves, or either the Client
	or ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake
	the process of our assistance to the Client in the most appropriate manner, whether by formal meetings
	of a fixed duration, or any other means, for the express purpose of meeting the Client’s needs in respect
	of provision of the Company’s stated services/products, in accordance with and subject to, prevailing law
	of . Any use of the above terminology or other words in the singular, plural,
	capitalisation and/or he/she or they, are taken as interchangeable and therefore as referring to same.</p><h2>Cookies</h2>
	<p>We employ the use of cookies. By using ideaBook's website you consent to the use of cookies 
	in accordance with ideaBook’s privacy policy.</p><p>Most of the modern day interactive web sites
	use cookies to enable us to retrieve user details for each visit. Cookies are used in some areas of our site
	to enable the functionality of this area and ease of use for those people visiting. Some of our 
	affiliate / advertising partners may also use cookies.</p><h2>License</h2>
	<p>Unless otherwise stated, ideaBook and/or it’s licensors own the intellectual property rights for
	all material on ideaBook. All intellectual property rights are reserved. You may view and/or print
	pages from http://ideabookuog.000webhostapp.com for your own personal use subject to restrictions set in these terms and conditions.</p>
	<p>You must not:</p>
	<ol>
		<li>Republish material from http://ideabookuog.000webhostapp.com</li>
		<li>Sell, rent or sub-license material from http://ideabookuog.000webhostapp.com</li>
		<li>Reproduce, duplicate or copy material from http://ideabookuog.000webhostapp.com</li>
	</ol>
	<p>Redistribute content from ideaBook (unless content is specifically made for redistribution).</p>
	<div style="color:#428BCA">
	<h2>Conditions for post any idea</h2>
	<p>The author of an idea receives an automatic email notification whenever a comment is
submitted to any of their ideas by a student (but not by a member of staff)<br>

Ideas and comments can be posted anonymously, although the author’s details will be
stored in the database so any inappropriate ideas can be investigated.<br>
All new ideas are disabled after a closure date for new ideas, but comments can
continue to be done until a final closure date.<br>
Once an idea is submitted the system emails a notification to the Department’s QA
Coordinator.<br>
The author of an idea receives an automatic email notification whenever a comment is
submitted to any of their ideas by a student (but not by a member of staff).</p>
<br>
</div>
<h2>User Comments</h2>
	<ol>
		<li>This Agreement shall begin on the date hereof.</li>
		<li>Certain parts of this website offer the opportunity for users to post and exchange opinions, information,
		material and data ('Comments') in areas of the website. ideaBook does not screen, edit, publish
		or review Comments prior to their appearance on the website and Comments do not reflect the views or
		opinions ofideaBook, its agents or affiliates. Comments reflect the view and opinion of the
		person who posts such view or opinion. To the extent permitted by applicable laws ideaBookshall
		not be responsible or liable for the Comments or for any loss cost, liability, damages or expenses caused
		and or suffered as a result of any use of and/or posting of and/or appearance of the Comments on this
		website.</li>
		<li>ideaBookreserves the right to monitor all Comments and to remove any Comments which it considers
		in its absolute discretion to be inappropriate, offensive or otherwise in breach of these Terms and Conditions.</li>
		<li>You warrant and represent that:
			<ol>
				<li>You are entitled to post the Comments on our website and have all necessary licenses and consents to
						do so;</li>
				<li>The Comments do not infringe any intellectual property right, including without limitation copyright,
					patent or trademark, or other proprietary right of any third party;</li>
				<li>The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise unlawful material
					or material which is an invasion of privacy</li>
				<li>The Comments will not be used to solicit or promote business or custom or present commercial activities
					or unlawful activity.</li>
				</ol>
			</li>
		<li>You hereby grant to <strong>ideaBook</strong> a non-exclusive royalty-free license to use, reproduce,
		edit and authorize others to use, reproduce and edit any of your Comments in any and all forms, formats
		or media.</li>
	</ol>
<h2>Hyperlinking to our Content</h2>
	<ol>
		<li>The following organizations may link to our Web site without prior written approval:
			<ol>
			<li>Government agencies;</li>
			<li>Search engines;</li>
			<li>News organizations;</li>
			<li>Online directory distributors when they list us in the directory may link to our Web site in the same
				manner as they hyperlink to the Web sites of other listed businesses; and</li>
			<li>Systemwide Accredited Businesses except soliciting non-profit organizations, charity shopping malls,
				and charity fundraising groups which may not hyperlink to our Web site.</li>
			</ol>
		</li>
	</ol>
	<ol start="2">
		<li>These organizations may link to our home page, to publications or to other Web site information so long
			as the link: (a) is not in any way misleading; (b) does not falsely imply sponsorship, endorsement or
			approval of the linking party and its products or services; and (c) fits within the context of the linking
			party's site.
		</li>
		<li>We may consider and approve in our sole discretion other link requests from the following types of organizations:
			<ol>
				<li>commonly-known consumer and/or business information sources such as Chambers of Commerce, American
					Automobile Association, AARP and Consumers Union;</li>
				<li>dot.com community sites;</li>
				<li>associations or other groups representing charities, including charity giving sites,</li>
				<li>online directory distributors;</li>
				<li>internet portals;</li>
				<li>accounting, law and consulting firms whose primary clients are businesses; and</li>
				<li>educational institutions and trade associations.</li>
			</ol>
		</li>
	</ol>
	<p>We will approve link requests from these organizations if we determine that: (a) the link would not reflect
	unfavorably on us or our accredited businesses (for example, trade associations or other organizations
	representing inherently suspect types of business, such as work-at-home opportunities, shall not be allowed
	to link); (b)the organization does not have an unsatisfactory record with us; (c) the benefit to us from
	the visibility associated with the hyperlink outweighs the absence of <?=$companyName?>; and (d) where the
	link is in the context of general resource information or is otherwise consistent with editorial content
	in a newsletter or similar product furthering the mission of the organization.</p>

	<p>These organizations may link to our home page, to publications or to other Web site information so long as
	the link: (a) is not in any way misleading; (b) does not falsely imply sponsorship, endorsement or approval
	of the linking party and it products or services; and (c) fits within the context of the linking party's
	site.</p>

	<p>If you are among the organizations listed in paragraph 2 above and are interested in linking to our website,
	you must notify us by sending an e-mail to <a href="mailto:foysal35@diit.info" title="send an email to foysal35@diit.info">foysal35@diit.info</a>.
	Please include your name, your organization name, contact information (such as a phone number and/or e-mail
	address) as well as the URL of your site, a list of any URLs from which you intend to link to our Web site,
	and a list of the URL(s) on our site to which you would like to link. Allow 2-3 weeks for a response.</p>

	<p>Approved organizations may hyperlink to our Web site as follows:</p>

	<ol>
		<li>By use of our corporate name; or</li>
		<li>By use of the uniform resource locator (Web address) being linked to; or</li>
		<li>By use of any other description of our Web site or material being linked to that makes sense within the
			context and format of content on the linking party's site.</li>
	</ol>
	<p>No use of ideaBook’s logo or other artwork will be allowed for linking absent a trademark license
	agreement.</p>
<h2>Reservation of Rights</h2>
	<p>We reserve the right at any time and in its sole discretion to request that you remove all links or any particular
	link to our Web site. You agree to immediately remove all links to our Web site upon such request. We also
	reserve the right to amend these terms and conditions and its linking policy at any time. By continuing
	to link to our Web site, you agree to be bound to and abide by these linking terms and conditions.</p>
<h2>Removal of links from our website</h2>
	<p>If you find any link on our Web site or any linked web site objectionable for any reason, you may contact
	us about this. We will consider requests to remove links but will have no obligation to do so or to respond
	directly to you.</p>
	<p>Whilst we endeavour to ensure that the information on this website is correct, we do not warrant its completeness
	or accuracy; nor do we commit to ensuring that the website remains available or that the material on the
	website is kept up to date.</p>
<h2>Content Liability</h2>
	<p>We shall have no responsibility or liability for any content appearing on your Web site. You agree to indemnify
	and defend us against all claims arising out of or based upon your Website. No link(s) may appear on any
	page on your Web site or within any context containing content or materials that may be interpreted as
	libelous, obscene or criminal, or which infringes, otherwise violates, or advocates the infringement or
	other violation of, any third party rights.</p>
<h2>Disclaimer</h2>
	<p>To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions relating to our website and the use of this website (including, without limitation, any warranties implied by law in respect of satisfactory quality, fitness for purpose and/or the use of reasonable care and skill). Nothing in this disclaimer will:</p>
	<ol>
	<li>limit or exclude our or your liability for death or personal injury resulting from negligence;</li>
	<li>limit or exclude our or your liability for fraud or fraudulent misrepresentation;</li>
	<li>limit any of our or your liabilities in any way that is not permitted under applicable law; or</li>
	<li>exclude any of our or your liabilities that may not be excluded under applicable law.</li>
	</ol>
	<p>The limitations and exclusions of liability set out in this Section and elsewhere in this disclaimer: (a)
	are subject to the preceding paragraph; and (b) govern all liabilities arising under the disclaimer or
	in relation to the subject matter of this disclaimer, including liabilities arising in contract, in tort
	(including negligence) and for breach of statutory duty.</p>
	<p>To the extent that the website and the information and services on the website are provided free of charge,
	we will not be liable for any loss or damage of any nature.</p>

	 

            

            
			
        </div>
		
	</div>


<!-- content end here -->
  

   

   

<footer class="container-fluid text-center" style="background-color:#286090; margin-top:10px;">
  <p>IdeaBook &copy; <?php echo date('Y');?></p>
  <?php echo $_SESSION['user_type'];?>
  
</footer>

</body>


</html>
<script>
$(document).ready(function(){
 
 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('.dropdown-menu').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();
 
				/* $('#comment_form').on('submit', function(event){
				  event.preventDefault();
				  if($('#subject').val() != '' && $('#comment').val() != '')
				  {
				   var form_data = $(this).serialize();
				   $.ajax({
					url:"insert.php",
					method:"POST",
					data:form_data,
					success:function(data)
					{
					 $('#comment_form')[0].reset();
					 load_unseen_notification();
					}
				   });
				  }
				  else
				  {
				   alert("Both Fields are Required");
				  }
				 });*/
 
 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 5000);
 
});
</script>
<?php
	
	}else 
		header('location:../login.php?deactivate');
?>