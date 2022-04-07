use `ltw`;

INSERT INTO `admin` (`admin_id`, `username`
, `password`, `email`) values
(0, 'admin', '123', 'admin@admin.com');

INSERT INTO `products` values
(0, 'This is a demo product', 'https://previews.123rf.com/images/petro/petro1405/petro140500075/28708560-variet%C3%A0-di-abiti-appesi-su-rack-in-boutique.jpg',
 120000, 'Demo');

INSERT INTO `cart` values (0, 0);

INSERT INTO `customer` values 
(0, '0909009990', 'demo@gmail.com', 'Demo Demo', 'demo123' , '123456',
 'MALE', 0);

INSERT INTO `product_in_cart` values 
(5, 0, 0, 'M');