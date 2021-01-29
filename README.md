# Camagru
First solo web project for the web based semester at WeThinkCode_ using PHP, HTML and CSS. You can find the project instructions brief here: instructions.
This web project is challenging you to create a small web application allowing you to make basic photo and video editing using your webcam (or uploading an image) and some predefined stickers, to create a fun combined image. It's design is influenced by social media sites, mainly instagram and snapchat and is a fun image sharing site.

Users can view the public gallery of images on the site even without an account, and get a preview of what they will be able to create once they sign up for an account via the about page. After signing up and verfiying their account, users can create images themselves, as well as add comments to, or "like" images in the public gallery. Users can also edit their profile information and remove images they have created if they wish.

To install the project you need to have the following dependencies installed before cloning: 
- LAMP/MAMP/XAMPP stack depending on your Operating system
- mysql database package
- install sendmail package


To install the project: 
- clone the repository from github into the "htdocs" folder of you chosen stack
- go into the camagru folder
- run the following command in commandline: sh install.sh
    if this throws an error, try to manually sart the services or follow the commands below:
        - go into config folder and open the database.php file and edit the mysql user and user password as you setup in your mysql package download
        - from the config folder run the following command line to set up the database: 
            php setup.php
        - if the database needs to be reset at any point, run the following from command line (in camagru folder):
            php dropdatabase.php
            hp setup.php


To run the site:
- make sure you installed it correctly and then in your chosen web browser type "localhost/camagru/" into your address bar and press enter. You should then see the home page of the site.


The source code of the project is laid out as follows in the repository:
- root folder: loose php files are all the different front end view pages
- root folder: the readme (explains the project)
- root folder: the project brief and testing page(pdfs)
- heplful scripts to help setup and run the project(sh files)

- config folder: contains the files for setting up the database connection and the databse itself to connect with your mysql installation

- css: contains all the bulma micro-framework code used for styling the fornt end views

- forms: conatins all the php files for users inputting data and editing data which needs to have input validation performed on it before it goes to the database, e.g. updating their password, searching for a profile of a user,  logging in and out.

- functions: contains the actual functions which apply the changes passed on by the forms after input validation e.g. to store a users updated details, or to add a comment the user created into the database

- gallery: default images added for testing purposes to display in the public gallery.

- imgs:
contains the images that the site istelf uses for the front end, non user uploaded images. e.g the stickers you can decorate your created images with

- templates: template pages used by every front end view page e.g. header and footer

- userimgs: images that the users have in their profile e.g. default profile picture

for testing the programme, see the testing pdf linked here: tests, and you can make use of the shell scripts for resetting the database and restarting mysql, sendmail and teh apache server.