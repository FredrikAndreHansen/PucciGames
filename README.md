# PucciGames

Hot to install:

 - You will get the entire database structure in the SQLdump.sql file
 - Go to app/config/config.php to configure everything:
  ~ First configure/connect your database by using the "DB_HOST", "DB_USER", "DB_PASS" and "DB_NAME" parameters.
  ~ The "APPROOT" and the "PUBLICAPPROOT" are used to dynamically navigate within the website's structure and file system (No need to edit anything here)
  ~ The "URLROOT" is the online url address.
  ~ The "EMAIL" and "CCEMAIL" parameters are used for sending emails on the contact page, the "EMAIL" is the main email that receieves the email abd the "CCEMAIL" is the second email receiving the email.
  ~ "AUTHOR" is the websites author.
  ~ "SITENAME" is the name of the site.
  ~ "CAPTCHA_SITEKEY" is the captcha key received from Google, the webiste is using the Google Captcha V2.
