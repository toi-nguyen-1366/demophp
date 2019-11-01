<?php
include_once "bbeCore.php";

$model = new bbeCore();
$result = $model->getAllData('MyGuests');

$urlEdit =url() . '/edit.php';
function url(){
    $post =  (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? 'https://' : 'http://';
    $url = $post . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    $url = rtrim($url,'index.php');
    $url = rtrim($url,'/');
    return $url;
}
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<div class="table">
    <table class="table table-bordered">
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Email</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($result as $row): ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['firstname'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td> <a href = "<?php echo $urlEdit . "?id=" .$row['id'] ?>">Edit</a></td>
            </tr>
        <?php endforeach ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" class="text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">New</button>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" id="formMill">
                <div class="modal-body">

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="firstname">First name</label>
                            <input type="text" name="firstname" class="form-control" placeholder="First name">
                            <small id="passwordHelpBlock" class="form-text text-muted">
                            </small>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="lastname">Last name</label>
                            <input type="text" name="lastname" class="form-control" placeholder="Last name">
                            <small id="passwordHelpBlock" class="form-text text-muted">
                            </small>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Email">
                            <small id="passwordHelpBlock" class="form-text text-muted">
                            </small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="saveUSer">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $('#saveUSer').on('click',function () {
            var data = new FormData($("#formMill")[0]);
            var url = "<?php echo url() . '/create.php'  ?>";
            console.log(url);
            $.ajax({
                url: url,
                type: 'POST',
                processData: false,
                contentType: false,
                data: data,
                success: function (text){
                }

            })
        })
    })
</script>

