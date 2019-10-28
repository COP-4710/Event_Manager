var url = 'http://157.245.128.154'
var ext = "php"

$(function() {

    $('#loginSubmit').click(function(e){
		$('#registerSubmit').removeClass('active');
		$(this).addClass('active');
		doLogin();
		e.preventDefault();
	});
	$('#registerSubmit').click(function(e)
	{
		console.log("submit clicked");
		$('#loginSubmit').removeClass('active');
		$(this).addClass('active');
		CreateAcct();
		e.preventDefault();
	});

});

function timedRefresh(timeoutPeriod) {
	setTimeout("location.reload(true);", timeoutPeriod);
}

function CreateAcct()
{
	var email = document.getElementById("email").value;
	var pass = document.getElementById("signupPW").value;
	var confirm_pass = document.getElementById("confirmPW").value;

	if (email == "")
	{
		document.getElementById("signupError").innerHTML = "Enter your Knight's email address";
		return;
	}
	if (pass != confirm_pass)
	{
		document.getElementById("signupError").innerHTML = "Passwords not matching. Try again.";
		return;
	}
	var jsonlogin = JSON.stringify({email:email, password:md5(password)});
	var fullUrl = url + './createaccount.' + ext;

	var xhr = new XMLHttpRequest();
	xhr.open("POST", fullUrl, true);
	xhr.setRequestHeader("Content-type", "application/json; charset=UTF-8");

	try {
		xhr.send(jsonPayload);
		console.log(jsonPayload);

		xhr.onreadystatechange = function()
		{
			if (this.readyState == 4 && this.status == 200)
			{
				var jsonObject = JSON.parse(xhr.responseText);
				var userID = jsonObject.id;
				if (userID < 1)
				{
					document.getElementById("loginError").innerHTML = "Email/Password combination invalid";
					console.log("user doesn't exist");
					return;
				}

				document.getElementById("loginError").innerHTML = "Success";
				createCookie("id", userID.toString());
			}
		}
	}
	function createCookie(name, value)
	{
		document.cookie = name + "=" + value + ";path=/";
	}
	function getCookie(cname)
	{
		var name = cname + "=";
		var decodedCookie = decodeURIComponent(document.cookie);
		var ca = decodedCookie.split(';');
		for(var i = 0; i <ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') {
				c = c.substring(1);
			}

			return c.substring(name.length, c.length);

		}
		return "";
	}


}
