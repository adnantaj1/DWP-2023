<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <h1 class="page-header">
                All Products
            </h1>
            <h4 class="bg-success text-center"> <?php displayMessage(); ?></h4>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <!--  call function to get products data   -->
                    <?php showProducts(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>