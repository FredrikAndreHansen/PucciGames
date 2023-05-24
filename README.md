# PucciGames

## About

Pucci Games is my website about the games I make, the site is hosted at: www.puccigames.com

The site is made with HTML5, CSS3, JavaScript, Three.js, PHP and MySQL.

## How to install

 ### You will get the entire database structure in the SQLdump.sql file
 ### Go to app/config/config.php to configure everything:
  - First configure/connect your database by using the "DB_HOST", "DB_USER", "DB_PASS" and "DB_NAME" parameters.
  - The "APPROOT" and the "PUBLICAPPROOT" are used to dynamically navigate within the website's structure and file system (No need to edit anything here)
  - The "URLROOT" is the online url address.
  - The "EMAIL" and "CCEMAIL" parameters are used for sending emails on the contact page, the "EMAIL" is the main email that receieves the email abd the "CCEMAIL" is the second email receiving the email.
  - "AUTHOR" is the websites author.
  - "SITENAME" is the name of the site.
  - "CAPTCHA_SITEKEY" is the captcha key received from Google, the webiste is using the Google Captcha V2.

## Site functionalities

The site has 5 functionalitites, Email, Posting Updates, Posting Assets, User Creation/Login and Commenting.
 - Email: You can receive emails from the email form on the landing page.
 The email has 2 spam filters, the first filter is the captcha. The second filter checks for certain spam words, if the email contains any of the spam words then the email is rejected. The user will receive a message that the email was rejected due to the email being marked as spam, however, it is very unlikely that a user would get the email rejected due to the spam words. The filter words are the following: 'SEO', 'GMB', 'ahrefs', 'UR40+', 'Moz', 'MOZ', 'FREE', 'EXPIRATION', 'Semrush'. This can be changed in app/controllers/Index.php.
 
 - Post updates:
 - Post assets:
 - Users:
 - Comments:

## Site file structure
