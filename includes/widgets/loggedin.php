<div>
    <fieldset>
        <legend><?php echo "" . $user_data['username'] . "'s Account"; ?></legend>
        <ul>
            <li>
                <a href="<?php echo $user_data['username'] ?>">Profile</a>
            </li>
            <li>
                <a href="change_password.php">Change Password</a>
            </li>
            <li>
                <a href="user_profile.php">Change Profile</a>
            </li>
            <li>
                <a href="signout.php">Sign out</a>
            </li>
        </ul>
    </fieldset>
</div>