<h3>Войти на сайт:</h3>
<form action="/user/login" method="post"> <br>
    <label for="">login</label><br>
    <input type="text" name="login"><br>
    <label for="">password</label><br>
    <input type="password" name="password"><br>
    <button type="submit">Войти</button>
</form>

<?php debug($_SESSION);?>