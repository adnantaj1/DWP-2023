<div id="page-wrapper">
    <div class="container-fluid">
        <h1 class="page-header">
            Add User
            <?php addUser(); ?>
        </h1>
        <h4>
        </h4>
        <div class="col-md-4">
            <form action="" method="post">
                <div class="form-group">
                    <label for="category-title">USERNAME</label>
                    <input type="text" name="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="category-title">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="category-title">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" name="add_user" class="btn btn-primary" value="Add User">
                </div>
            </form>
        </div>
    </div>
</div>