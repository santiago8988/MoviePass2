<?php
    include("header.php");
?>

<html>
    <form action = "#process-register.php" method = "post" class = "form-register">

        <label for = "user_name">Nombre de usuario</label>
        <input type = "text" name = "name" id = "user_name" requiered>

        <label for = "user_email">Correo electronico</label>
        <input type = "text" name = "email" id = "user_email" requiered>

        <label for = "user_password">Contraseña</label>
        <input type = "password" name = "password" id = "user_password" requiered>
        
        <label for = "user_password_two">Repita la contraseña</label>
        <input type="password" name = "re_password" id = "user_password_two" requiered>

        <div>
                <input type = "radio" name = "gender" id = "user_gender_m" value = "masculino">
                <label for = "user_gender_m">Masculino</label>

                <input type = "radio" name = "gender" id = "user_gender_f" value = "femenino">
                <label for = "user_gender_f">Femenino</label>

                <input type = "radio" name = "gender" id = "user_gender_o" value = "otro">
                <label for = "user_gender_o">Otro</label>
        </div>

        <label for = "user_birthday">Fecha de nacimiento</label>
        <input type = "date" name = "birthday" id = "user_birthday" requiered>
        
        <input type = "checkbox" name = "terminos" id = "user_termes">
        <label for = "user_termes">Acepto los terminos y condiciones.</label>

        <button type = "submit">Registrarme</button>
        
    </form>
</html>