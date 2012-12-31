<div id="aside">
<p>Hello, <?php echo $user_data['username'] ?></p>
<ul>
    <li>
        <a href="signout.php">Sign out</a>
    </li>
    <li>
        <a href="change_password.php">Change password</a>
    </li>
    <li>
        <a href="<?php echo $user_data['username'] ?>">Profile</a>
    </li>
    <li>
        <a href="user_profile.php">Change Profile</a>
    </li>
</ul>
</div>