<div class="col-md-12">
    <div class="row">
        <h1 class="page-header">
            All Orders
        </h1>
        <h4 class="bg-success text-center"> <?php displayMessage(); ?></h4>
    </div>
    <div class="row">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Amount</th>
                    <th>Transaction</th>
                    <th>Currency</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php display_Orders(); ?>
                </tr>
            </tbody>
        </table>
    </div>
</div>