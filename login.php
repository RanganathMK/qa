<?php

session_start();

if (!isset($_SESSION['myusername'])){
//header('location:login.php');

echo '<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">';
echo '<tr>';
echo '<form name="form1" method="post" action="check_login.php">';
echo '<td>';
echo '<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">';
echo '<tr>';
echo '<td colspan="3"><center><strong>Myplex Debugger </strong></center></td>';
echo '</tr>';
echo '<tr>';
echo '<td width="78">Username</td>';
echo '<td width="6">:</td>';
echo '<td width="294"><input name="myusername" type="text" id="myusername"></td>';
echo '</tr>';
echo '<tr>';
echo '<td>Password</td>';
echo '<td>:</td>';
echo '<td><input name="mypassword" type="password" id="mypassword"></td>';
echo '</tr>';
echo '<tr>';
echo '<td>&nbsp;</td>';
echo '<td>&nbsp;</td>';
echo '<td><input type="submit" name="Submit" value="Login"></td>';
echo '</tr>';
echo '</table>';
echo '</td>';
echo '</form>';
echo '</tr>';
echo '</table>';

}

else {
header('location:welcome.php');
}
?>



