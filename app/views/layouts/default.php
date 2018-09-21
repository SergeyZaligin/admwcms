<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?=$this->getMeta(); ?>
</head>
<body>
    <style>
        .errors-validate {
            color: red;
        }
        .success-validate{
            color: green;
        }
    </style>
    <nav>
        <ul>
            <li>
                <a href="/user/signup">Signup</a>
            </li>
            <li>
                <a href="/user/login">Login</a>
            </li>
            <li>
                <a href="/user/logout">Logout</a>
            </li>
        </ul>
    </nav>
    <h3>Default</h3>
    <?=$content; ?>
    
    <?php if (isset($_SESSION['validate_errors'])): ?>
    <div class="errors-validate">
        <?=$_SESSION['errors']; unset($_SESSION['errors']); ?>
    </div>
    <?php  elseif (isset($_SESSION['validate_success'])) : ?>
    <div class="success-validate"><?=$_SESSION['validate_success']; unset($_SESSION['validate_success']); ?></div>
    <?php endif; ?>
    
    <?php
        use \RedBeanPHP\R as R;
        $logs = R::getDatabaseAdapter()
            ->getDatabase()
            ->getLogger();

        debug( $logs->grep( 'SELECT' ) );
    ?>
</body>
</html>
