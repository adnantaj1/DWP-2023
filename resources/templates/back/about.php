<?php
require_once("../../resources/functions.php");
if (isset($_POST['submit'])) {
    // Get the input values from the form
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zipcode = $_POST['zipcode'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $monFriOpening = $_POST['mon_fri_opening'];
    $monFriClosing = $_POST['mon_fri_closing'];
    $satOpening = $_POST['sat_opening'];
    $satClosing = $_POST['sat_closing'];
    // Call the updateAboutInfo function with the input values
    updateAboutInfo(
        $street,
        $city,
        $state,
        $zipcode,
        $phone,
        $email,
        $monFriOpening,
        $monFriClosing,
        $satOpening,
        $satClosing
    );
}
$query = query("SELECT * FROM about_info LIMIT 1");
confirm($query);
$row = fetch_array($query);
displayMessage();
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <h1 class="page-header">
            About Us
        </h1>
        <div class="col-md-6">
            <form action="" method="post">
                <div class="form-group">
                    <label for="street">Street Address</label>
                    <input type="text" name="street" class="form-control" value="<?php echo $row['street']; ?>">
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" name="city" class="form-control" value="<?php echo $row['city']; ?>">
                </div>
                <div class="form-group">
                    <label for="state">State</label>
                    <input type="text" name="state" class="form-control" value="<?php echo $row['state']; ?>">
                </div>
                <div class="form-group">
                    <label for="zipcode">ZIP Code</label>
                    <input type="text" name="zipcode" class="form-control" value="<?php echo $row['zipcode']; ?>">
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone" class="form-control" value="<?php echo $row['phone']; ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>">
                </div>
                <div class="form-group">
                    <label for="mon_fri_opening">Monday - Friday Opening Hours</label>
                    <input type="text" name="mon_fri_opening" class="form-control" value="<?php echo $row['mon_fri_opening']; ?>">
                </div>
                <div class="form-group">
                    <label for="mon_fri_closing">Monday - Friday Closing Hours</label>
                    <input type="text" name="mon_fri_closing" class="form-control" value="<?php echo $row['mon_fri_closing']; ?>">
                </div>
                <div class="form-group">
                    <label for="sat_opening">Saturday Opening Hours</label>
                    <input type="text" name="sat_opening" class="form-control" value="<?php echo $row['sat_opening']; ?>">
                </div>
                <div class="form-group">
                    <label for="sat_closing">Saturday Closing Hours</label>
                    <input type="text" name="sat_closing" class="form-control" value="<?php echo $row['sat_closing']; ?>">
                </div>

                <!-- <div class="form-group">
                    <label for="facebook-link">Facebook Link</label>
                    <input type="text" name="facebook_link" class="form-control">
                </div> -->
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary" value="Update">
                </div>
            </form>
        </div>
    </div>
</div>