<?php 
//NOTE: cookie needs to be set before the html tag
if(isset($_POST["submit"]))
{
	$cookie_name = "login_name";
    $cookie_value = $_POST["name"];
    $expire = time() + 3*24*60*60;
    
    setcookie($cookie_name, $cookie_value, $expire, "/");
    setcookie("password", $_POST["passwd"], $expire, "/");
    setcookie("textcolor", $_POST["tcolor"], $expire, "/");
    setcookie("background", $_POST["bcolor"], $expire, "/");
    
    setcookie("date", date("m/d/Y"), $expire, "/");
    setcookie("time", date("h:i:sA"), $expire, "/");
    setcookie("ip", $_SERVER['REMOTE_ADDR'], $expire, "/");
}
?>

<html>
<head>
<title> Cookie Collector </title>
</head>
<body style="background-color: <?php echo $_COOKIE["background"] ?>
			;color: <?php echo $_COOKIE["textcolor"] ?>;" >
<?php 
if(isset($_COOKIE[$cookie_name]))
{
	echo "Welcome <b>" . $_COOKIE[$cookie_name] . "</b><br/>";
    echo "Your password is <b>" . $_COOKIE["password"] . "</b><br/>";
}
?>
<form method=POST action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Previous login: <?php echo $_COOKIE['time']; ?> on <?php echo $_COOKIE['date']; ?> <br/>
    Previous ip address: <?php echo $_COOKIE['ip']; ?> <br/><br/>
    
	Please type your name: <input type=text name=name value="<?php echo $_COOKIE[$cookie_name]; ?>"><br/>
    Please type your password: <input type=password name=passwd value="<?php echo $_COOKIE['password']; ?>"><br/>
    Please choose a text color: <input type=color name=tcolor value="<?php echo $_COOKIE['textcolor'] ?>" /><br/>
    Please choose a background color: <input type=color name=bcolor value="<?php echo $_COOKIE['background'] ?>" /><br/>
    <input type=submit name=submit value=submit ><br/>
</form>
<?php 

?>
</body>
</html>