<?php
    include("header.php");
    include("nav.php");
?>

    <div class = "container-form">

        <form action = "process-login" method = "POST" class = "form-login">

            <h1>Log in</h1>

            <div>
                <input type = "text" name = "name" id = "user_name" placeholder = "&#128100 Enter your username" autofocus requiered>
            </div>

            <div>
                <input type = "password" name = "password" id = "user_password" placeholder = "&#128274 Enter your password" required>
            </div>

            <button type = "submit">Log in</button>

            <a href = "form-register.php">Still not registered?</a>

        </form>
    </div>

<?php
    include("footer.php");
?>