CREATE DATABASE ecom_db;

CREATE TABLE `about_info` (
  `id` int(11) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mon_fri_opening` varchar(20) NOT NULL,
  `mon_fri_closing` varchar(20) NOT NULL,
  `sat_opening` varchar(20) NOT NULL,
  `sat_closing` varchar(20) NOT NULL
)
--  To Insert data 
INSERT INTO `about_info` (`id`, `street`, `city`, `state`, `zipcode`, `phone`, `email`, `mon_fri_opening`, `mon_fri_closing`, `sat_opening`, `sat_closing`) VALUES
(1, '123 Main Street', 'City', 'Fredericia', '7000', '(123) 456-7890', 'info@example.com', '10:00 AM', '7:00 PM', '10:00 AM', '4:00 PM');

-- To Update
UPDATE `about_info` SET
    `street` = 'New Street Value',
    `city` = 'New City Value',
    `state` = 'New State Value',
    `zipcode` = 'New Zipcode Value',
    `phone` = 'New Phone Value',
    `email` = 'New Email Value',
    `mon_fri_opening` = 'New Mon-Fri Opening Time',
    `mon_fri_closing` = 'New Mon-Fri Closing Time',
    `sat_opening` = 'New Sat Opening Time',
    `sat_closing` = 'New Sat Closing Time'
WHERE `id` = 1;

-- Category Table
CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL
)
--  To Insert Data
INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'ASSEMBLY GLOVES'),
(2, 'GARDEN GLOVES'),
(8, 'Miltry Gloves'),
(9, 'Dress Gloves'),
(10, 'Fast Rope Gloves');

-- To Delete Category
DELETE FROM `categories` WHERE `cat_id` = [cat_id];

-- Orders Table
CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_amount` float NOT NULL,
  `order_transaction` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `order_currency` varchar(255) NOT NULL
)

--To INSERT Data
INSERT INTO `orders` (`order_id`, `order_amount`, `order_transaction`, `order_status`, `order_currency`) VALUES
(6, 45, '345645', 'Completed', 'USA');

-- To Delete Order
DELETE FROM `orders` WHERE `order_id` = [id];

-- Tp CREATE Products
CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `short_desc` text NOT NULL,
  `product_image` varchar(255) NOT NULL
)

--To INSERT Data

INSERT INTO `products` (`product_id`, `product_title`, `cat_id`, `price`, `quantity`, `description`, `material`, `image`) VALUES
([ProductID], 'ProductName', [CategoryID], [Price], [Quantity], 'Description', 'Material', 'ImageName.jpg');

-- To Delete Product
DELETE FROM `products` WHERE `product_id` = [id];

-- To Update Product
UPDATE `products` SET
    `product_title` = 'New Product Name',
    `cat_id` = NewCategoryID,
    `price` = NewPrice,
    `quantity` = NewQuantity,
    `description` = 'New Description',
    `material` = 'New Material',
    `image` = 'NewImageName.jpg'
WHERE `product_id` = Id;

-- To Create Reports
CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `product_quantity` int(11) NOT NULL
)

--To INSERT Data
INSERT INTO `reports` (`report_id`, `product_id`, `order_id`, `product_title`, `product_price`, `product_quantity`) VALUES
(6, 1, 10, 'product 1', 24.99, 1);

-- To Delete Report
DELETE FROM `reports` WHERE `report_id` = [id];

-- To CREATE slides
CREATE TABLE `slides` (
  `slide_id` int(11) NOT NULL,
  `slide_title` varchar(255) NOT NULL,
  `slide_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- INSERT Ddata
INSERT INTO `slides` (`slide_id`, `slide_title`, `slide_image`) VALUES
(18, 'Dress Gloves', 'slide1.jpeg');

-- To Delete slides
DELETE FROM `slides` WHERE `slide_id` = [id];

-- To CREATE User
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
)

-- To INSERT Data
INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `username`, `email`, `password`) VALUES
(14, 'John', 'Dow', 'john', 'john@gmail.com', '$2y$10$4gY9U3T3nswpMYEb5leAJu6Z3V1iBNuBmRy4FZuIf/7Nusq1bdGMC');

-- To Delete User
DELETE FROM `users` WHERE `user_id` = [id];

-- Example of view

CREATE VIEW ProductSummary AS
SELECT product_id, product_title, product_price, product_image
FROM products;

SELECT * FROM ProductSummary;

-- Example of Trigger

CREATE TRIGGER CheckQuantityBeforeInsert
BEFORE INSERT ON products
FOR EACH ROW
BEGIN
    IF NEW.product_quantity > 100 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error: Product quantity cannot exceed 100';
    END IF;
END;

