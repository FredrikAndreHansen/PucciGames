# PucciGames

## About

Pucci Games is my website about the games I make, the site is hosted at: www.puccigames.com

The site is made with HTML5, CSS3, JavaScript, Three.js, PHP, and MySQL. The code is object-oriented and are using the MVC(Model View Controller) framework.

## How to install

 ### You will get the entire database structure in the SQLdump.sql file
 ### Go to app/config/config.php to configure everything:
  - First, configure/connect your database by using the "DB_HOST", "DB_USER", "DB_PASS" and "DB_NAME" parameters.
  - The "APPROOT" and the "PUBLICAPPROOT" are used to dynamically navigate within the website's structure and file system (No need to edit anything here)
  - The "URLROOT" is the online URL address.
  - The "EMAIL" and "CCEMAIL" parameters are used for sending emails on the contact page, the "EMAIL" is the main email that receives the email, and the "CCEMAIL" is the second email receiving the email.
  - "AUTHOR" is the website's author.
  - "SITENAME" is the name of the site.
  - "CAPTCHA_SITEKEY" is the captcha key received from Google, the website is using the Google Captcha V2.
  - Add the Three.js file in public/javascript

## Functionalities

The site has 5 functionalities, Email, Blog, Posting Assets, User Creation/Login, and Commenting.
 - Email: You can receive emails from the email form on the landing page.
 The email has 2 spam filters, the first filter is the captcha. The second filter checks for certain spam words, if the email contains any of the spam words then the email is rejected. The user will receive a message that the email was rejected due to the email being marked as spam, however, it is very unlikely that a user would get the email rejected due to the spam words. The filter words are the following: 'SEO', 'GMB', 'ahrefs', 'UR40+', 'Moz', 'MOZ', 'FREE', 'EXPIRATION', 'Semrush'. This can be changed in app/controllers/Index.php.
 
 - Blog: Only an admin user can add blog posts. When posting an update, you can add a headline, description, and images and then assign a category. You can then view the blog from the "Posts" page and you can then filter by category, or search for the blog post. The 4 most recent blog posts will automatically appear on the landing page. If you post anything by using "3P", "2020: A Space Odyssey" or "Paper World" as the category, then the blog post will also appear on the information page for the game selected.
 
 - Post assets: Posting an asset also requires the user to be an admin. When posting the asset you must give it a name, description, alt description, add an image and assign it to one of the following categories: Textures, Sprites, or Backgrounds. You can also filter assets by category or search for them on the "Assets" page.
 
 - Users: The reason for having users is for preventing spam in comments, it is also easier to maintain comments with users (for example: if a user should leave many spam comments, the admin user can then ban the user and all the comments from that user is removed, they can also be retrieved back if you unban the user). You can register as a new user by going to the "Register" page, you will then need to create a username, email, and password (adding a website is optional). The user will then be a normal user by default, you can only create an admin user from the database, and set the "usertype" column to "Admin". Also, the user needs to confirm their email before they can comment, if they don't confirm the email within 24 hours then the user will be deleted. The admin also has a list of all the users, when they made any changes, and where they have left a comment.

 - Comments: After a user has confirmed their email they can then leave a comment, they can leave a comment for any blog posts or assets that are submitted. The comment will contain the user's image, username, website, date of the comment, and the comment. Every time there is a new comment or if a new blog post or asset is submitted, then the sitemap.xml will be automatically updated accordingly.

## Security

- Prevents SQL injection and cross-site scripting in all input/text fields. The "Trim" function is used to remove any scripts/tags.
- Only the "public" folder is available since the "app" folder has all the functionalities.
- There are 5 login attempts for logging in before you receive a cooldown.
- All passwords are hashed.
- If a user has forgotten their password they need to enter their email address and a randomly generated string of 60 characters are sent to their email which they must use to change their password within 10 minutes before it expires.
