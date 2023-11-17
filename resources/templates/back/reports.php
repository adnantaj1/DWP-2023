<div id="page-wrapper">

    <div class="container-fluid">

        <div class="row">

            <h1 class="page-header">
                Reports
            </h1>
            <h4 class="bg-success text-center"> <?php displayMessage(); ?></h4>
            <h4 class="bg-success text-center"> </h4>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Product ID</th>
                        <th>Order ID</th>
                        <th>Product Title</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <!--  call function to get products data   -->
                    <?php getReports(); ?>
                </tbody>
            </table>

        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->