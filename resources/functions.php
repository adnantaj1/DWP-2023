<?php
//Helper functions
function last_id()
{
    global $connection;
    return mysqli_insert_id($connection);
}

function setMessage($msg)
{
    if (!empty($msg)) {
        $_SESSION['message'] = $msg;
    } else {
        $msg = "";
    }
}

function displayMessage()
{
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

function redirect($location)
{
    header("Location: $location");
}

function query($sql)
{
    global $connection;
    return mysqli_query($connection, $sql);
}

function confirm($result)
{
    global $connection;
    if (!$result) {
        die("QUERY FAILED" . mysqli_errno($connection));
    }
}

function escape_string($string)
{
    global $connection;
    return mysqli_real_escape_string($connection, $string);
}

function fetch_array($result)
{
    return mysqli_fetch_array($result);
}

/************************Contcat Page Function *************/
function sendMessage()
{
    if (isset($_POST['submit'])) {

        $to = "adnansulehri1*gmail.com";
        $name = $_POST['name'];
        $subject = $_POST['subject'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $headers = "From: {$name} {$email}";

        $result = mail($to, $subject, $message, $headers);

        if (!$result) {
            setMessage("Sorry, we could not receive you message");
            redirect("contact.php");
        } else {
            setMessage("Your message has been sent");
            redirect("contact.php");
        }
    }
}

function display_Orders()
{
    $query = query("SELECT * FROM orders");
    confirm($query);

    while ($row = fetch_array($query)) {
        $orders = <<<DELIMETER
        <tr>
            <td>{$row['order_id']}</td>
            <td>&#36;{$row['order_amount']}</td>
            <td>{$row['order_transaction']}</td>
            <td>{$row['order_currency']}</td>
            <td>{$row['order_status']}</td>
            <td><a class= "btn btn-danger" href="../../resources/templates/back/delete_order.php?id={$row['order_id']}" ><span class="glyphicon glyphicon-remove"></span></a></td>
        </tr>
        DELIMETER;
        echo $orders;
    }
}

/*************** get Reports ******************/
function getReports()
{
    $query = query("SELECT * FROM reports");
    confirm($query);
    while ($row = fetch_array($query)) {

        $reports = <<<Reports
        <tr>
            <td>{$row['report_id']}</td>
            <td>{$row['product_id']}</td> 
            <td>{$row['order_id']}</td>
            <td>{$row['product_title']}</td> 
            <td>&#36;{$row['product_price']}</td> 
            <td>{$row['product_quantity']}</td>
            <td><a class= "btn btn-danger" href="../../resources/templates/back/delete_report.php?id={$row['report_id']}" ><span class="glyphicon glyphicon-remove"></span></a></td> 
        </tr>    
        Reports;
        echo $reports;
    }
}

function fetchFooterInfo()
{


    $query = query("SELECT * FROM footer_info LIMIT 1");
    confirm($query);
    $result = fetch_array($query);

    if (!$result) {
        die("Query failed: ");
    }

    $row = $result;

    return $row;
}


/*************** about Controller ******************/
function updateAboutInfo($street, $city, $state, $zipcode, $phone, $email, $monFriOpening, $monFriClosing, $satOpening, $satClosing)
{
    // Check if any of the input fields are empty
    if (empty($street) || empty($city) || empty($state) || empty($zipcode) || empty($phone) || empty($email) || empty($monFriOpening) || empty($monFriClosing) || empty($satOpening) || empty($satClosing)) {
        setMessage("All fields must be filled in.");
        redirect("index.php?about"); // Redirect to the appropriate page
        return;
    }
    // Check if the email is a valid email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        setMessage("Invalid email format.");
        redirect("index.php"); // Redirect to the appropriate page
        return;
    }
    // Create the SQL query to update the about_info table
    $query = "UPDATE about_info SET ";
    $query .= "street = '" . escape_string($street) . "', ";
    $query .= "city = '" . escape_string($city) . "', ";
    $query .= "state = '" . escape_string($state) . "', ";
    $query .= "zipcode = '" . escape_string($zipcode) . "', ";
    $query .= "phone = '" . escape_string($phone) . "', ";
    $query .= "email = '" . escape_string($email) . "', ";
    $query .= "mon_fri_opening = '" . escape_string($monFriOpening) . "', ";
    $query .= "mon_fri_closing = '" . escape_string($monFriClosing) . "', ";
    $query .= "sat_opening = '" . escape_string($satOpening) . "', ";
    $query .= "sat_closing = '" . escape_string($satClosing) . "' ";
    $update_query = query($query);
    // Check if the query was successful
    if ($update_query) {
        setMessage("About information has been updated!");
        redirect("index.php?about"); // Redirect to the appropriate page
    } else {
        setMessage("Failed to update about information.");
        redirect("index.php?about"); // Redirect to the appropriate page
    }
}

function updateAbout()
{
    $query = query("SELECT * FROM about_info LIMIT 1");
    confirm($query);
    $row = fetch_array($query);

    $about = <<<ABOUT
        <div class="col-lg-4">
            <h4>Contact Information</h4>
            <p>{$row['street']}<br>{$row['city']}, {$row['state']} {$row['zipcode']}<br>Phone:{$row['phone']}<br>Email: {$row['email']}</p> 
        </div>
        <div class="col-lg-4">
            <h4>Opening Hours</h4>
            <p>Monday - Friday: {$row['mon_fri_opening']} - {$row['mon_fri_closing']}<br>Saturday: {$row['sat_opening']} - {$row['sat_closing']}<br>Sunday: Closed</p>
        </div>     
    ABOUT;
    echo $about;
}
