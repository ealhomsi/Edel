# To whom it may concern

--------------------------------------------------------------------------------
# EDEL WEBSITE 

* This file contains instruction on how to operate and how to configure the website
* The website is a forum that is supposed to be be answered by the users and partners (NGOs)
* The user will receive notifications if someone posted a new answer

--------------------------------------------------------------------------------
# INSTALL AND CONFIGURE

* Install apache2 server using the following command:
    apt-get install apache2

* install apache2 modules related to php

* Configure apache2 to use ssl and https by creating a certificate. Consult digital ocean documentation

* install mysql database using the following command
    apt-get install mysql-server

* Configure mysql database to have a user with the password/username of boubou

* Run the database.sql schema against your newly created database so that it will create the tables

* Install postfix sever and configure an internet site with the capability of sending emails
    apt-get install postfix

* configure postfix using the command
    dpkg-reconfigure postfix

* set up an internet site for postfix

* set up an authentication to gmail noreplyedel@gmail.com by creating an sasl_password file

* run the command postmap against sasl_password file

* start all services using the following command
    service apache2 start; service mysql start; service postfix start;

* see error logs inside /var/log/apache2/error.log and /var/log/mail/mail.log

* test email services configured using the following command
echo 'text-content' | mail -s 'subject' 'destination@mail.ca'

* visit index.php inside the folder or set the default route to it

* run npm install autosize so that we get the autosize functionality for the post

--------------------------------------------------------------------------------
# Featured listing

* passwords are saved nd secure using hash salt system

* website functions under ssl tunnel

* postfix is installed so that email notification system is set up to notify the user when ever he receives an answer

* documents are uploaded and saved in the database and retrived from there

* ability to sign a document using the user's private key or encrypt it using the user's public key

* posts are searchable through tags

* The website is prone to mysql injection (do you know that myconcordia.ca is prone to this???)

* tags are dynamically created and there is an auto complete feature for them to help the user entering tags

* forum is ordered based on the number of up votes each post has received

* the forum is 80% phone responsive

* images and documents (pdf) are able to preview before download
--------------------------------------------------------------------------------
# Design and Colors

* The color pallet chosen
	a) #FAFAFA white
	b) #292929 dark
	c) #606C38  dark green
	e) #3897F0 blue for buttons
	d) #90FCF9 electric green
	
--------------------------------------------------------------------------------
# TO DO:
    a) RSS feed if necessary
    b) final touches for the phone reposivness


