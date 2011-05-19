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
	
	//alert(username);
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
	var email = document.getElementById('emailR').value;
	
	
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