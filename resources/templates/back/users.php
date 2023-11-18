<div id="page-wrapper">
    <div class="container-fluid">
        <div class="col-lg-12">
            <h1 class="page-header">
                Users
            </h1>

            <h4 class="bg-success text-center"> <?php displayMessage(); ?></h4>
            <a href="index.php?add_user" class="btn btn-primary">Add User</a>

            <div class="col-md-12">

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Username</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php showUsers(); ?>
                    </tbody>
                </table> <!--End of Table-->


            </div>

        </div>

    </div>
</div>