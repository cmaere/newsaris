<nav class="nav-primary hidden-xs"> 
<!-- BEGIN nav -->
<ul class="nav">
	<li class="active">
		<a href="./main"> <i class="fa fa-home"></i> <span>Dashboard</span> </a> 
	</li> 

	
	<!-- BEGIN sections -->
	
	@foreach ($chasections as $chasection)
	
	
	
	
	
		<li class='dropdown-submenu'> 
			<a href='#' class='dropdown-toggle' data-toggle='dropdown'>
			 <i class='fa {{$chasection->icon}} '></i> 
			 <span>{{$chasection->sectionname}}</span> </a>
			 	<!-- BEGIN outer  -->
				
				<ul class='dropdown-menu'>
					<!-- BEGIN loop -->
					
					
						@foreach($chasubsections[$x] as $chasubsection)
						<li> <a href='{{url('/')}}/{{$chasection->sectionname}}/{{$chasubsection->functionName}}'> {{$chasubsection->functionName}} </a></li>
						@endforeach		
					
					<!-- END loop -->
				</ul>
				<!-- END outer -->
			</li>
			
			<!--{{$x = $x + 1}}-->
	
	@endforeach		
			
	<!-- END sections -->
 </ul> 
  <!-- END nav -->
</nav> 
       