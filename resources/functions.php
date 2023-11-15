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

/*************************Front end functions **********/
//get products

function getProducts()
{
    $query = query("SELECT * FROM products");
    confirm($query);
    while ($row = fetch_array($query)) {

        $product = <<<DELIMETER
        <div class="col-sm-4 col-lg-4 col-md-4">
            <div class="thumbnail">
                <a href="item.php?id={$row['product_id']}"><img src="{$row['product_image']}" alt=""><a/>
            <div class="caption">
                <h4 class="pull-right">&#36;{$row['product_price']}</h4>
                <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a>
                </h4>
                <p>{$row['product_description']}</p>
                <a class="btn btn-primary" target="_blank" href="../resources/cart.php?add={$row['product_id']}">Add to cart</a>
            </div>
            </div>
        </div>    
        DELIMETER;

        echo $product;
    }
}

//get categories
function getCategories()
{
    $query = query("SELECT * FROM categories");
    confirm($query);
    while ($row = fetch_array($query)) {
        $category_links = <<<DELIMETER
        <a href='category.php?id={$row['cat_id']}' class= 'list-group-item'>{$row['cat_title']}</a>
        DELIMETER;
        echo $category_links;
    }
}

function getCategoryProducts()
{
    $query = query("SELECT * FROM products WHERE 
    product_category_id = " . escape_string($_GET['id']) . "");
    confirm($query);
    while ($row = fetch_array($query)) {
        $product = <<<DELIMETER
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                <img src="{$row['product_image']}" alt="">
                <div class="caption">
                <h3>{$row['product_title']}</h3>
                <p>{$row['short_desc']}</p>
                <p>
                    <a href="#" class="btn btn-primary">Buy Now!</a> <a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
                </p>
                </div>
                </div>
            </div>   
        DELIMETER;

        echo $product;
    }
}

function getProducts_shop_page()
{
    $query = query("SELECT * FROM products");
    confirm($query);
    while ($row = fetch_array($query)) {
        $product = <<<DELIMETER
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                <img src="{$row['product_image']}" alt="">
                <div class="caption">
                <h3>{$row['product_title']}</h3>
                <p>{$row['short_desc']}</p>
                <p>
                    <a href="../resources/cart.php?add={$row['product_id']}" class="btn btn-primary">Buy Now</a> <a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
                </p>
                </div>
                </div>
            </div>   
        DELIMETER;

        echo $product;
    }
}

function login_user()
{
    if (isset($_POST['submit'])) {

        $username = escape_string($_POST['username']);
        $password = escape_string($_POST['password']);

        $query = query("SELECT * FROM users WHERE 
        username = '{$username}' AND password = '{$password}' ");
        confirm($query);

        if (mysqli_num_rows($query) == 0) {
            setMessage("Wrong Username of Password");
            redirect("login.php");
        } else {
            $_SESSION['username'] = $username;
            // setMessage("Welcome to admin {$username}");
            redirect("admin");
        }
    }
}

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

/******************Back end functions **********/


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
