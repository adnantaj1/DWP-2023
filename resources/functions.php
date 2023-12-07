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
