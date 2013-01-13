
<form action="login.php" method="post"> 
    <fieldset>       
        <ul>            
            <li>
                <img id="loginIcon" src="img/login.png">
            </li>
            <li>
                <div id="formTitle">Sign-in/Register</div>
            </li>
            <li>
                Username:<br />
                <input type="text" name="username">
            </li>
            <li>
                Password:<br/>
                <input type="password" name="password">
            </li>
            <li>
                <input type="submit" value="Sign In">
            </li>            
            <li>
                Forgotten your<a href="recover.php?mode=username">username</a> or<a href="recover.php?mode=password">password</a>?
            </li>
            <li>
                Not a member yet?<a href="register.php">Register!</a>
            </li>
        </ul>
    </fieldset>
</form>

