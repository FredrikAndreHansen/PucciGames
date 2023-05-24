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
 
 - Post updates: Only a admin user can post updates. When posting a update, you can add a headline, description, images and then assign a category. You can then view the post from the "Posts" page and you can then filter by category, or search for the post. The 4 most recent posts will automatically appear on the landing page.
 
 - Post assets: Posting a asset also require the user to be a admin. When posting the asset you must give it a name, description, alt description, add a image and assign it to one of the following categories: Textures, Sprites or Backgrounds. You can also filter assets by category or searching for them in the "Assets" page.
 
 - Users: The reason for having users is for preventing spam in comments, it is also easier to maintain comments with users (for example: if a user should leave many spam comments, the admin user can then ban the user and all the comments from that user is removed, they can also be retrieved back if you unban the user). You can register as a new user by going to the "Register" page, you will then need to create a username, email and a password (adding a website is optional). The user will then be a normal user by default, you can only create a admin user from the database, set the "usertype" column to "Admin". Also, the user needs to confirm their email before they can comment, if they don't confirm the email within 24 hours then the user will be deleted. The admin also have a list over all the users, when they made any changes and where they have left a comment.

 - Comments:

## Security

## Site file structure
