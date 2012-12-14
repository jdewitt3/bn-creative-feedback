<?php
echo "<form name='login' method='post' id='login' enctype='application/x-www-form-urlencoded' action='../lib/login.php'>
<div><label for='username'>Username</label>
<input name='username' id='username' type='text' value='kshay@brandnetworksinc.com'></div>
<div><label for='password'>Password</label>
<input name='password' id='password' type='password' value='bnhack'></div>
<input name='action' id='action' value='login' type='hidden'>
<div>
<input name='submit' id='submit' value='Login' type='submit'></div>
</form>";
?>