<?php

if(isset($_POST['submit'])){
    $firtName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    if(empty($firtName)){
        $msg1 = "firtsname is not empty!";
    }
    if(empty($lastName)){
        $msg2 = "lastname is not empty!";
    }
    if(empty($email)){
        $msg3 = "email is not empty!";
    }
}
?>
<div class="container">
    <form action="" method="post">
        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="firstName" class="form-control">
            <div class="" style="color: crimson"><?php echo empty($msg1) ? $msg1 : '' ?></div>
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="lastName" class="form-control">
            <div class="" style="color: crimson"><?php echo empty($msg2) ? $msg2 : '' ?></div>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control">
            <div class="" style="color: crimson"> <?php echo empty($msg3) ? $msg3 : '' ?></div>
        </div>
        <div class="form-foter">
            <button type="submit" name="submit">Save</button>
            <button type="reset" name="reset">Reset</button>
        </div>
    </form>
</div>
