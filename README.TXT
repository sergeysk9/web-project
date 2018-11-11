
Download and install XAMPP
An easy to install Apache distribution containing MySQL, PHP, and Perl. 
https://sourceforge.net/projects/xampp/

Create MySQL database and table visitors. 

Script to create the table:

CREATE TABLE `visitors` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(20) DEFAULT NULL,
  `firstname` varchar(20) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


Unzip responsive_website.zip in rwd folder and copy the folder in htdocs directory in xampp directory on your PC..

modify conn.php file in the includes directory. Enter your user, password and database.

start XAMPP server, apache and MySql.

Open a browser chrom or firefox and type in URL: 
 
http://localhost/rwd/

webpage will be displayed.

Good luck!
 