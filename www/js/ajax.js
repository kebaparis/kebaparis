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

