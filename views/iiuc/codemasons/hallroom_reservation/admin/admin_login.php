<?php
    include_once('../../../../../vendor/autoload.php');

    if(!isset($_SESSION) )session_start();
    use App\Message\Message;
    use App\UserManagement\RoleManagement;

?>

<form class="" method="post" action="login.php">

    <div class="form-group-lg">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
            <input type="text" class="form-control" name="email"  placeholder="Enter your Email..."/>
        </div>
    </div><br>

    <div class="form-group-lg">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
            <input type="text" class="form-control" name="password"  placeholder="Enter your Password..."/>
        </div>
    </div><br>

    <div class="form-group ">
        <input type="submit" id="button" class="btn btn-primary btn-lg btn-block login-button" value="Sign in">
    </div>
</form>