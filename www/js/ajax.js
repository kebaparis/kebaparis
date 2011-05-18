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
	
	
	var password = document.getElementById('password').value;
	var email = document.getElementById('email').value;
	
	
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