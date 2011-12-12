function createAJAXobject() 
{
	if (window.XMLHttpRequest)
	{
		xmlhttp= new XMLHttpRequest();
	}
	else
	{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
} // end createAJAXobject()


//Login
function login()
{
	createAJAXobject();
	
	var username = document.getElementById('username').value;
	var password = document.getElementById('password').value;
	
	// Field empty check ^Ar
	if(username == "" || password == "")
	{
		//document.getElementById('statusHolder').innerHTML = "[Test] username or/and password is empty";
		setFieldsEmpty();
		alert("[Test] Username or/and Password empty, please bring this back to HTML site! I have no Idea how, setFieldsEmpty also not work. ^Klar")
		return;
	}
	alert("Nothing is empty, login...");
	
	
	xmlhttp.onreadystatechange=function()
	{
		//alert("data get");
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			document.getElementById("login").innerHTML=xmlhttp.responseText;
			//alert(xmlhttp.responseText);
		}
	}
	

	var page = "usr.php?rtype=lin&username=" + username + "&password=" + password;
	
	//alert(page);
	xmlhttp.open("GET",page,true);
	xmlhttp.send();
}



//Logout
function logout()
{
	createAJAXobject();
	

	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			document.getElementById("login").innerHTML=xmlhttp.responseText;
			//alert(xmlhttp.responseText);		
		}
	}
	var page = "usr.php?rtype=lou";
	
	//alert(page);
	xmlhttp.open("GET",page,true);
	xmlhttp.send();
}

//Register
function register()
{
	createAJAXobject();
	
	var username = document.getElementById('usernameR').value;
	var password = document.getElementById('passwordR').value;
	var passwordS = document.getElementById('passwordS').value;
	var email = document.getElementById('email').value;
		

	// Field empty check ^Ar
	//Username empty
	//Passwords empty
	//Email empty
	if(username == "" || password == "" || passwordS == "" || email == "")
	{
		document.getElementById('statusHolder').innerHTML = "Please fill in all information!";
		alert("[Test] Username / Passwords / Email is empty, bring back to design dunno how, set fields empty also not working")
		setFieldsEmpty();
		return;
	}
	alert("Nothing is empty, next...");
	
	// Password doesn't match
	if(password != passwordS)
	{
		document.getElementById('statusHolder').innerHTML = "new passwords are'nt the same!";
		alert("[Test] Everything is filled out, but passwords doesn't match, and SetEmptyFields not working!")
		setFieldsEmpty();
		return;
	}
	alert("Passwords match, next...");
	
	/*Regex Filter */
	filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

	if (!filter.test(email)) {
	  	alert("[Test] E-Mail format is wrong, bring back error")
		return false;
	}
	alert("Mail is fine, next...");
	
	
	xmlhttp.onreadystatechange=function()
	{
		//alert("data get");
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			//login ?
			document.getElementById("login").innerHTML=xmlhttp.responseText;
			//alert(xmlhttp.responseText);
		}
	}
	var page = "usr.php?rtype=reg&username=" + username + "&password=" + password  + "&email=" + email;
	//var page = "usr.php?rtype=lin&username=" + username + "&password=" + password;
	
	//alert(page);
	xmlhttp.open("GET",page,true);
	xmlhttp.send();
}

//change password
function changePassword()
{
	createAJAXobject();
	
	var oldPassword = document.getElementById('oldPassword').value;
	var newPassword = document.getElementById('newPassword').value;
	var newPassword1 = document.getElementById('newPassword1').value;
	
	if(oldPassword == "" || newPassword == "" || newPassword1 == "")
	{
		document.getElementById('statusHolder').innerHTML = "please fill in all information!";
		setFieldsEmpty();
		return;
	}
	
	if(newPassword != newPassword1)
	{
		document.getElementById('statusHolder').innerHTML = "new passwords are'nt the same!";
		setFieldsEmpty();
		return;
	}
	
	document.getElementById('statusHolder').innerHTML = "changing password...";
	
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			//alert(xmlhttp.responseText);
			if(xmlhttp.responseText.indexOf("TRUE") > 0)
			{
				//alert('pw checked');
				xmlhttp.onreadystatechange=function()
				{
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
					{
						//alert(xmlhttp.responseText);
						if(xmlhttp.responseText.indexOf("TRUE") > 0)
						{
							document.getElementById('statusHolder').innerHTML = "password changed!";
							setFieldsEmpty();
						}
						else
						{
							document.getElementById('statusHolder').innerHTML = "password not changed!";
							setFieldsEmpty();
						}
					}
				}
				
				var page = "userpanel/changePassword.php?pw=" + newPassword;
	
				//alert(page);
				xmlhttp.open("GET",page,true);
				xmlhttp.send();
			}
			else
			{
				document.getElementById('statusHolder').innerHTML = "current password wrong!";
				setFieldsEmpty();
			}
		}
	}
	
	var page = "userpanel/checkPassword.php?pw=" + oldPassword;
	
	//alert(page);
	xmlhttp.open("GET",page,true);
	xmlhttp.send();
	
}

// sets the input fields empty
function setFieldsEmpty()
{
	document.getElementById('oldPassword').value = "";
	document.getElementById('newPassword').value = "";
	document.getElementById('newPassword1').value = "";
}
