$(document).ready(function(){
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
				return false;
			}
			else
			{
				$('.has_error').text('');
			}
		}
		if((firstname.length != 0) && (lastname.length != 0))
		{
			var lastname = lastname.toLowerCase();
			var fname = firstname.toLowerCase();
			var f = fname.charAt(0);
			
			var username = f.concat(lastname);

			$('#username').val(username).css('background','#FBFCCA');
		}
	});

});