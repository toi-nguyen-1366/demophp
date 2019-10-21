<?php
include_once "bbeCore.php";

if(isset($_POST['submit']) && !empty($_GET['id'])){
    $firtName = $_POST['firstName'] ?? '';
    $lastName = $_POST['lastName'] ?? '';
    $email = $_POST['email'] ?? '';
    $id =$_GET['id'] ?? '';
    if(empty($firtName)){
        $msg1 = "firtsname is not empty!";
    }
    if(empty($lastName)){
        $msg2 = "lastname is not empty!";
    }
    if(empty($email)){
        $msg3 = "email is not empty!";
    }
    if($firtName != '' && $lastName != '' && $email != '') {
        $sqlInsert = "UPDATE `MyGuests` set firstname = '$firtName',lastname = '$lastName',email ='$email' where id = $id";
        $model = new bbeCore();
        $result = $model->upadteData($sqlInsert,'MyGuests');

    }
}
?>
<?php echo  $model->url() ?>
<div class="container">
    <form method="post">
        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="firstName" class="form-control" value="<?php echo isset($firtName) ? $firtName : '' ?>">
            <div class="" style="color: crimson"><?php echo isset($msg1) ? $msg1 : '' ?></div>
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="lastName" class="form-control"  value="<?php echo isset($lastName) ? $lastName : '' ?>">
            <div class="" style="color: crimson"><?php echo isset($msg2) ? $msg2 : '' ?></div>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control"  value="<?php echo isset($email) ? $email : '' ?>">
            <div class="" style="color: crimson"> <?php echo isset($msg3) ? $msg3 : '' ?></div>
        </div>
        <div class="form-foter">
            <button type="submit" name="submit">Save</button>
            <button type="reset" name="reset">Reset</button>
        </div>
    </form>
</div>
<script>
    <?php if(isset($result)){ ?>
    alert('<?php echo $result?>');
    window.location.replace(<?php echo  url() ?>);
    <?php } ?>
</script>
