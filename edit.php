<?php

if(isset($_POST['submit'])){
    $firtName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    if(empty($firtName)){
        $msg = "firtsname is not empty!";
    }
    if(empty($lastName)){
        $msg = "lastname is not empty!";
    }
    if(empty($email)){
        $msg = "email is not empty!";
    }
}
?>
<div class="container">
    <form action="" method="post">
        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="firstName" class="form-control">
            <div class="" style="color: crimson"> <?php echo empty($msg) ?? $msg ?></div>
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="lastName" class="form-control">
            <div class="" style="color: crimson"> <?php echo empty($msg) ?? $msg ?></div>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control">
            <div class="" style="color: crimson"> <?php echo empty($msg) ?? $msg ?></div>
        </div>
        <div class="form-foter">
            <button type="submit" name="submit">Save</button>
            <button type="reset" name="reset">Reset</button>
        </div>
    </form>
</div>
