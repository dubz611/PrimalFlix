<!DOCTYPE HTML PUBLIC
"-//W3C//DTD HTML 4.01 Transitional//EN"
		"http://www.w3.org/TR/html401/loose.dtd">
		<html>
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<title>Flunkbuster</title>
		</head>
		<body>
                <form action="test2.php" method="GET">
<?php
require "db.php";
require "selectDistinct.php";

echo __LINE__ . __FILE__;

// Output a header
//print str_pad("UserName", 15) .
//        str_pad("Password", 15) .
//        str_pad("Email", 45) . "\n";

// Connect to db
if (!($connection = @ mysqli_connect($hostname, $username, $password, $databaseName)))
    die("Could not connect");

if(!mysqli_select_db($connection, $databaseName))
        showerror();

print "\nVendor: ";

selectDistinct($connection, "vendor", "vendorName", "vendorName", "All");

// Querying Flunkbuster table
//if (!($result = @ mysqli_query($connection, "SELECT * FROM AccountDetail")))
//    showerror();

//$x = mysql_num_rows($result);
//echo $x;

// Populate rows
/*while ($row = mysqli_fetch_array($result, MYSQL_NUM))
//while ($row = mysqli_fetch_row($result))
{
	//print $row["UserName"];
    
        foreach ($row as $attribute)
		print "($attribute) ";
		print "\n";
}

function showerror()
{
    die("Error " . mysqli_errno() . " : " . mysqli_error());
}
*/

?>
                    <br>
                    <input type ="submit" value="Show Vendors">
                    </form>
</body>
</html>
