<?php
if (isset($_GET['id'])) {
    $query = query("SELECT * FROM users WHERE 
    user_id=" . escape_string($_GET['id']) . " ");
    confirm($query);

    while ($row = fetch_array($query)) {

        $username = escape_string($row['username']);
        $email = escape_string($row['email']);
        $password = escape_string($row['password']);
    }
}
updateUser();
?>

<div id="page-wrapper">

    <div class="container-fluid">

        <h1 class="page-header">
            Edit User
        </h1>

        <div class="col-md-4">

            <form action="" method="post">

                <div class="form-group">
                    <label for="category-title">USERNAME</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $username ?>">
                </div>
                <div class="form-group">
                    <label for="category-title">Email</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $email ?>">
                </div>
                <div class="form-group">
                    <label for="category-title">Password</label>
                    <input type="password" name="password" class="form-control" value="<?php echo $password ?>">
                </div>

                <div class="form-group">

                    <input type="submit" name="edit_user" class="btn btn-primary" value="Edit User">
                </div>

            </form>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->