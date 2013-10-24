CREATE TABLE IF NOT EXISTS `pagination` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post` varchar(500) NOT NULL,
  `link` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `pagination`
--

INSERT INTO `pagination` (`id`, `post`, `link`) VALUES
(1, 'What is PHP and Why PHP is Popular', 'http://www.91weblessons.com/what-is-php/'),
(2, 'Getting the Real IP Address of Website Visitors in PHP', 'http://www.91weblessons.com/getting-the-real-ip-address-of-website-visitors-in-php/'),
(3, 'What is HTACCESS', 'http://www.91weblessons.com/what-is-htaccess/'),
(4, 'SEO Friendly URL using HTACCESS', 'http://www.91weblessons.com/seo-friendly-url-using-htaccess/'),
(5, 'Custom Error Pages Using HTACCESS', 'http://www.91weblessons.com/custom-error-pages-using-htaccess/'),
(6, 'Upload Form using Ajax Jquery', 'http://www.91weblessons.com/upload-form-using-ajax-jquery/'),
(7, 'Basic PHP Validations with regular expression', 'http://www.91weblessons.com/basic-php-validations-with-regular-expression/'),
(8, 'Adding Google Map to your website', 'http://www.91weblessons.com/adding-google-map-to-your-website/'),
(9, 'Hide .php extension with url rewriting using .htaccess', 'http://www.91weblessons.com/hide-php-extension-with-url-rewriting-using-htaccess/'),
(10, 'MySql Prepared Statements with PHP', 'http://www.91weblessons.com/mysql-prepared-statements-with-php/'),
(11, 'cURL with PHP', 'http://www.91weblessons.com/curl-with-php/'),
(12, 'PHP Cookie Ajax Based Like Dislike Script', 'http://www.91weblessons.com/php-cookie-ajax-based-like-dislike-script/'),
(13, 'CSS Rounded Corners Without Images for All Browsers', 'http://www.91weblessons.com/css-rounded-corners-without-images-for-all-browsers/'),
(14, 'PHP MVC Framework Tutorial', 'http://www.91weblessons.com/php-mvc-framework-tutorial/'),
(15, 'PHP Ajax Login Validation Tutorial', 'http://www.91weblessons.com/php-ajax-login-validation-tutorial/'),
(16, 'How to Create Facebook Application Using PHP and Retrieve User Information', 'http://www.91weblessons.com/how-to-create-facebook-application-using-php-and-retrieve-user-information/'),
(17, 'PHP Cookie Ajax Based Rating Script', 'http://www.91weblessons.com/php-cookie-ajax-based-rating-script/'),
(18, 'PHP Ajax Pagination Tutorial', 'http://www.91weblessons.com/php-ajax-pagination-tutorial/'),
(19, 'Live Username Availability Check with Ajax and PHP', 'http://www.91weblessons.com/live-username-availability-check-with-ajax-and-php/'),
(20, 'How to create custom module in drupal 7', 'http://www.91weblessons.com/how-to-create-custom-module-in-drupal-7/'),
(21, 'PHP Cookie Ajax Based Poll Script', 'http://www.91weblessons.com/php-cookie-ajax-based-poll-script/'),
(22, 'PHP Ajax Dynamic Tab', 'http://www.91weblessons.com/php-ajax-dynamic-tab/'),
(23, 'Software Testing Process', 'http://www.91weblessons.com/software-testing-process/');
