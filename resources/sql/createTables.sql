-- Create Category Table
CREATE TABLE categories (
    category_id INT PRIMARY KEY,
    category_title VARCHAR(255) NOT NULL
);

-- Create Product Table
CREATE TABLE product (
    product_id INT PRIMARY KEY,
    product_title VARCHAR(255) NOT NULL,
    product_category_id INT,
    product_price DECIMAL(10, 2) NOT NULL,
    product_quantity INT NOT NULL,
    product_description TEXT,
    short_desc VARCHAR(255),
    product_image VARCHAR(255),
    FOREIGN KEY (category_id) REFERENCES Category(category_id)
);

-- Create Order Table
CREATE TABLE orders (
    order_id INT PRIMARY KEY,
    order_amount DECIMAL(10, 2) NOT NULL,
    order_transaction VARCHAR(255) NOT NULL,
    order_currency VARCHAR(3) NOT NULL,
    order_status VARCHAR(50) NOT NULL
);

-- Create User Table
CREATE TABLE users (
    user_id INT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    role VARCHAR(50) NOT NULL,
    address_id INT,
    FOREIGN KEY (address_id) REFERENCES Address(address_id)
);

-- Create Address Table
CREATE TABLE address (
    address_id INT PRIMARY KEY,
    street VARCHAR(255) NOT NULL,
    state VARCHAR(255) NOT NULL,
    zipcode VARCHAR(10),
    FOREIGN KEY (zipcode) REFERENCES Zipcode(zipcode)
);

-- Create Zipcode Table
CREATE TABLE zipcode (
    zipcode VARCHAR(10) PRIMARY KEY,
    city VARCHAR(255) NOT NULL
);

-- Create Reports Table
CREATE TABLE reports (
    reports_id INT PRIMARY KEY,
    product_id INT,
    user_id INT,
    order_id INT,
    user_detail TEXT,
    FOREIGN KEY (product_id) REFERENCES Product(product_id),
    FOREIGN KEY (user_id) REFERENCES User(user_id),
    FOREIGN KEY (order_id) REFERENCES OrderTable(order_id)
);
