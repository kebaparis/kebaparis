<?php 

	include 'classes.php';
	$myDB = new Database();
	$myDB->connect();

	//define request type (login / logout / registration / activation / blahh)
	$rtype = $_REQUEST['rtype'];

	switch ($rtype) 
	{
		case "lin": lin();
					break;

		case "lou":	lou();
					break;

		case "reg":	reg();
					break;

		case "act":	act();
					break;

		default:	def();
					break;
	}

	$myDB->quit();


	function lin() 
	{
		echo "login requested <br />";
		$User['username'] = $_REQUEST['username'];
		$User['password'] = $_REQUEST['password'];

		$myuser = new user($User['username']);

		if($myuser->login($User['password']) == true)
		{
			printLoggedInForm($myuser->usrName);
		}
		else
		{
			//show login form if login failed
			echo "not logged in";
			printLoginForm();
			printRegistrationForm();
		}

	} // end lin()

	function lou() 
	{
		echo "logout requested <br />";
		//user class weiss den username aus der session

		$myuser = new user();
		$myuser->logout();

		echo "logged out.";
		printLoginForm();
		printRegistrationForm();

	} // end lou()



	function reg() 
	{
		echo "registration requested <br />";
		$newUser['username'] = $_REQUEST['username'];
		$newUser['password'] = $_REQUEST['password'];
		$newUser['email'] = $_REQUEST['email'];

		$myuser = new user($newUser['username']);
		$myuser->register($newUser['password'], $newUser['email']);

	} // end reg()


	function act() 
	{
		echo "activation requested <br />";
		$sentAkey = $_REQUEST['akey'];

		$myuser = new user();
		$myuser->checkActivationLink($sentAkey);

	} // end act()


	function def() 
	{
		echo "default requested <br />";
		$myuser = new user();

		if ($myuser->checkLogin()) 
		{
			printLoggedInForm($myuser->usrName);
		}
		else 
		{
			echo "not logged in";
			printLoginForm();
			printRegistrationForm();
		} //end else

	} // end def()

	// prints the login form (no check if user is logged in!!)
	function printLoginForm()
	{
		?>
		<div id="tlogin">
			<table>
				<tr>
					<td>
						<form>
							<label>username<label>
							<input type="text" name="username" id="username"/>
					</td>
					<td>
							<label>password<label>
							<input type="password" name="password" id="password"/>
					</td>
					<td>
					<!--<input type="submit" value="login" onClick="login()"/>-->
							<a href="#" onClick="login()">Login</a>
						</form>
					</td>
				</tr>
			</table>
		</div>
		<a class="tlogino-tloginc" href="#">Login</a>
		<?php
	} // end printLoginForm()

	function printLoggedInForm($username)
	{
		echo "logged in : $username";
		echo "<a href='#' onClick='logout()'>Logout</a>";
	}
	
	
	// Print Registration Form, should open after jquery click
	function printRegistrationForm()
	{
	?>
	
		<div id="treg">
			<table>
				<tr>
					<td>
						<form>
							<label>username<label>
							<input type="text" name="username" id="usernameR"/>
					</td>
					<td>
							<label>password<label>
							<input type="password" name="password" id="passwordR"/>
					</td>
					<td>
							<label>email<label>
							<input type="text" name="email" id="emailR"/>
					</td>
					<td>
							<a href="#" onClick="register()">Register</a>
						</form>
					</td>
				</tr>
			</table>
		</div>
		<!-- used for toggle-->
		<a class="trego-tregc" href="#">Register</a>
	<?php
	}

?>