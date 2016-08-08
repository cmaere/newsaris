$(document).ready(function(){
	$.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });

	$('input').blur(function(){
		var password = $('input[name=password]').val();
		var confirmpassword = $('input[name=confirmpassword]').val();
		var firstname = $('input[name=firstname]').val();
		var lastname = $('input[name=lastname]').val();

		if((password.length != 0) && (confirmpassword.length != 0))
		{
			if(password != confirmpassword)
			{
				$('.has_error').text('Passwords do not match').css('color', 'red');
				$('input[name=password]').focus();
				$('input[name=confirmpassword]').focus();
				return false;
			}
			else
			{
				$('.has_error').text('');
			}
		}
		else
		{
			$('.has_error').text('');
		}

		if((firstname.length != 0) && (lastname.length != 0))
		{
			var lastname = lastname.toLowerCase();
			var fname = firstname.toLowerCase();
			var f = fname.charAt(0);
			
			var username = f.concat(lastname);

			$.ajax({
				type: "POST",
				url: "/newsaris/public/Policy/CreateAccount",
				data: {userID: username, _token: '{{ csrf_token() }}'},
				success: function(data){
					console.log(data);
					$('#username').val(data).css('background','#FBFCCA');
				}
			});
		}
	});
});