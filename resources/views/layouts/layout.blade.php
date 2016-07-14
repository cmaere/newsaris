
@section('header')
<!DOCTYPE html>
<html class=" js no-touch no-android no-chrome firefox no-iemobile no-ie no-ie10 no-ie11 no-ios" lang="en">
<head>
	
<meta http-equiv="content-type" content="text/html; charset=UTF-8"> <meta charset="utf-8">
 <title>@yield('title')</title> 
<meta name="description" content="saris, kcn, nursing, university, malawi, kamuzu, college, ict, exams"> 
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

 <link rel="stylesheet" href="{{asset('css/app.css')}}" type="text/css">
 <link rel="stylesheet" href="{{asset('css/font.css')}}" type="text/css" cache="false">
 <script src="{{asset('scripts/formcontrols.js')}}" type="text/javascript"></script>
 
  <!--[if lt IE 9]> <script src="js/ie/respond.min.js" cache="false"></script> <script src="js/ie/html5.js" cache="false"></script> <script src="js/ie/fix.js" cache="false"></script> <![endif]-->
  <style type="text/css">
  .jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);
	  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";
	  color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}
	  .jqsfield { color: white;font: 10px arial, san serif;text-align: left;}
	  </style></head><body>
  <section class="hbox stretch"> 
	 
	   <aside class="bg-primary aside-sm" id="nav"> 
		   <section class="vbox">
			    <header class="dker nav-bar nav-bar-fixed-top"> 
				    <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav"> 
					    <i class="fa fa-bars"></i>
				     </a> 
				     <a href="#" class="nav-brand" data-toggle="fullscreen">@yield('titlename')</a> 
				     <a class="btn btn-link visible-xs" data-toggle="class:show" data-target=".nav-user"> 
					     <i class="fa fa-comment-o"></i> 
				     </a> 
			     </header> 
			     <section class="w-f"> 
				     
				     <div class="bg-success nav-user hidden-xs pos-rlt">
					      <div class="nav-avatar pos-rlt">
						       <a href="#" class="thumb-sm avatar animated rollIn" data-toggle="dropdown"> 								<img src="{{asset('images/avatar_default.jpg')}}" alt="" class=""> 
							       <span class="caret caret-white"></span> 
						       </a>
						        <ul class="dropdown-menu m-t-sm animated fadeInLeft">
								 <span class="arrow top"></span>
								  <li> <a href="#">Settings</a> </li> 
								  <li> <a href="#">Profile</a> </li> 
								  <li> <a href="#">
									   <span class="badge bg-danger pull-right">3</span> 									Notifications </a> </li>
								   <li class="divider"></li> <li> <a href="#">Help</a> </li>
								    <li> <a href="#">Logout</a> </li> </ul> 
								    <div class="visible-xs m-t m-b"> 
									    <a href="#" class="h3">@yield('LOGINNAME')</a> 
									    <p><i class="fa fa-map-marker"></i> </p> 
								    </div> 
							    </div> 
							    <div class="nav-msg">
								     <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
									     <b class="badge badge-white count-n">0</b> 
								     </a>
								      <section class="dropdown-menu m-l-sm pull-left animated fadeInRight"> 
									      <div class="arrow left"></div>
									       <section class="panel bg-white"> 
										       <header class="panel-heading"> 
											       <strong>You have 
												       <span class="count-n">0</span> notifications</strong> 
											       </header> 
											       <div class="list-group"> 
												       <a href="#" class="media list-group-item"> 
													       <span class="pull-left thumb-sm"> 
														       <img src="{{asset('images/avatar_default.jpg')}}" alt="John said" class="img-circle"> </span> 
														       <span class="media-body block m-b-none"> <br>  </span>
													        </a> 
														
														</div> <footer class="panel-footer text-sm"> <a href="#" class="pull-right"><i class="fa fa-cog"></i></a> <a href="#">See all the notifications</a>
														 </footer>
													  </section>
												   </section>
											   
											    </div>
										     </div> 
										     

									     
@yield('sidebar')





 <!-- BEGIN note --> 
 
 <div class="bg-danger wrapper hidden-vertical animated fadeInUp text-sm"> <a href="#" data-dismiss="alert" class="pull-right m-r-n-sm m-t-n-sm"><i class="fa fa-times"></i></a> Hi @yield('loginname') welcome to saris 
 </div> 
 
 
</section> 

<footer class="footer bg-gradient hidden-xs">
	 <a href="./?page=Logout" class="btn btn-sm btn-link m-r-n-xs pull-right"> 
		 <i class="fa fa-power-off"></i> 
	 </a> 
	 <a href="#nav" data-toggle="class:nav-vertical" class="btn btn-sm btn-link m-l-n-sm"> <i class="fa fa-bars"></i> </a> </footer> </section> </aside> 
	 
	
	 
	 <section id="content"> 
		 <section class="vbox"> 
		 <header class="header bg-white b-b"> 
			 <p>@yield('welcomemessage')</p>
		  </header> 
		  <!-- END note --> 
		 
		 <section class="scrollable wrapper"> 
			 <!-- breadcrumb -->
			 <div class="row">
				 <div class='col-lg-12'> 
	
					 <ul class='breadcrumb'>
						 <li><a href='./main'><i class='fa fa-home'></i>Home</a></li> 
						 @yield('breadcrumb')
		 
				    	</ul>
			
			    	</div>
			   </div>
			 
			 <!-- end breadcrumb -->
			 <div class="row"> 				
			 
			
			
			
			<!-- Content -->
			
			@yield('content')


			<!-- // Content END -->
			
			
			
			@section('footer')
			
			
			
			 
			
			<div class="col-lg-4"> 
				
			<section class="panel">
				<!-- BEGIN news-->
				 <header class="panel-heading bg-success"> 
					 <ul class="nav nav-tabs nav-justified text-uc"> 
						 <li class=""><a data-toggle="tab" href="#popular">{NEWS}</a></li>
			  
					</ul>
				 </header>
				  <!-- END news -->
				  <div class="panel-body"> 
					  <div class="tab-content"> 
						  <!-- BEGIN newsinner -->
						  <div id="popular" class="tab-pane active"> 
							  <!-- BEGIN article -->
							  <article class="media"> <a class="pull-left thumb m-t-xs">
								   <i class="fa fa-bullhorn"></i> </a> 
								   <div class="media-body">
									    <a class="font-semibold" href="{NEWSLINK}" target="_new">{NEWSTITLE}</a> 
									    <div class="text-xs block m-t-xs">{NEWSCONTENT}<br><br>
										    <i class="fa fa-calendar"></i> {NEWSDATE} &nbsp;<i class="fa fa-user"></i>&nbsp;{NEWSAUTHOR}
									    </div> 
								    </div>
							     </article>
							    <!-- END article -->
						     </div> 
						     <!-- END newsinner -->
						     <div id="recent" class="tab-pane"> 
							     <p class="text-center m-t-sm"><i class="fa fa-spinner fa fa-spin fa fa-2x"></i></p> 
						     </div> 
					     </div> 
				     </div> 
			     </section>
			
			</div> 
			</section> 
	
				 <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> 
			 </section>
			  <!-- /.vbox --> </section>
															       <script src="scripts/app.js"></script> 
															       <!-- Bootstrap -->  <!-- App --> 
														       </body></html>
											      
			
			
			