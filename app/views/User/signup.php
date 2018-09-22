<h3>Регистрация</h3>
<form action="/user/signup" method="post"> <br>
    <label for="">login</label><br>
    <input type="text" name="login" value="<?=isset($_SESSION['form_data']['login']) ? h($_SESSION['form_data']['login']) : ''; ?>"><br>
    <label for="">password</label><br>
    <input type="password" name="password"><br>
    <label for="">name</label><br>
    <input type="text" name="name"value="<?=isset($_SESSION['form_data']['name']) ? h($_SESSION['form_data']['name']) : ''; ?>"><br>
    <label for="">email</label><br>
    <input type="text" name="email"value="<?=isset($_SESSION['form_data']['email']) ? h($_SESSION['form_data']['email']) : ''; ?>"><br>
    <button type="submit">Зарегистрироваться</button>
    <?php if (isset($_SESSION['form_data'])) unset($_SESSION['form_data']);?>
</form>
