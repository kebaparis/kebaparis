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
	var passwordS = document.getElementById('passwordS').value;
	var email = document.getElementById('emailR').value;
	

	// Field empty check ^Ar
	if(username == "" || password == "" || passwordS == "" || email == "")
	{
		document.getElementById('statusHolder').innerHTML = "Please fill in all information!";
		document.write("<b>Hure fuell alles us</b>");
		setFieldsEmpty();
		return;
	}
	// Password aren't the same
	if(password != passwordS)
	{
		document.getElementById('statusHolder').innerHTML = "new passwords are'nt the same!";
				document.write("<b>Passwoerter stimmed ned :( , fuck you</b>");
		setFieldsEmpty();
		return;
	}

/* Schisss hurreee ^Ar 
	// E-Mail checken
    // Check Mail Syntax (bla@bla.bla)
			if(!preg_match("/^[^@].+\.\D{2,5}$/",$email)) {
					document.getElementById('statusHolder').innerHTML = "HUUUUREEEE!";
					setFieldsEmpty();
					return;
				//Splitta
				$split = explode('@', $email);
				$domain = $split[(count($split) -1)];
				//Get IP from $domain and check
				if(gethostbyname($domain) != $domain) {
					$notvalid = 'trashmail.net,trash-mail.com';
					$split = explode(',',$notvalid);
					//check
						if(!in_array(strtolower($domain), $split)) {
						//Mail is Ok
						}else {
									setFieldsEmpty();
									return;
						};		
					}; //close domain check
			}; //close mail check
*/


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
