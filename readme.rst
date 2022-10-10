###################
Information System for Helping People Fix Their Vehicles
###################

Developed by Codeigniter Framework.

CodeIgniter is an Application Development Framework - a toolkit - for people
who build web sites using PHP. Its goal is to enable you to develop projects
much faster than you could if you were writing code from scratch, by providing
a rich set of libraries for commonly needed tasks, as well as a simple
interface and logical structure to access these libraries. CodeIgniter lets
you creatively focus on your project by minimizing the amount of code needed
for a given task.

*******************
Description and Functionalities
*******************

This information system, code name: Vehix, is an information system developed in order for people to be able to create topics as well as categories regarding their need to fix their personal vehicle. Application allows the users to comment and create a discussion on each topic.

There are three types of users:

1. Anonymous User - users that didn’t register an account
 		- Able to visit all of the static pages: 
			- Home
			- About
			- Contact
			- Help
		- Able to see and leave comments on topics, anonymously or to put in a name and an email.
		- Able to see the latest topics and categories.
		- Able to:
			- register
			- log in
			- logout

2. Registered User - user with a registered account
	- Being a registered user, this user inherits all the functionalities of the Anonymous user.
	- Registered users can log in at any time, and have following functionalities:
		- create a topic 
		- contains uploading of images
		- embedding YouTube links and 
		- creating a body that is easily formatted using CKEditor 4
		- edit topic & delete topic
		- leave a rating on the topic
		- create a category
				- delete category
		- leave a comment

3. Admin - moderates the website and has full control of all the functionalities
	- Being an admin, this user inherits all the functionalities of the Registered User.
	- Admins moderate and have following functionalities:
		- create a topic 
		- contains uploading of images
		- embedding YouTube links and 
		- creating a body that is easily formatted using CKEditor 4
			- edit topic & delete any topic
			- leave a rating on the topic
		- create a category
			- delete any category
		- leave a comment
			- delete any comment


**************************
Technologies Used
**************************

Following technologies were used for the development and implementation of this application:
 - FAMNIT phpMyAdmin Database - all the data is stored in the SISIII2022_ [89191015] database.
 - Codeigniter 3 Framework - the whole project is based on this MVC framework. Through exercises on the faculty to YouTube tutorials, I got very familiar with the foundations needed to build a complete application from scratch.
 - For the design of the front-end Bootstrap 5 was used and an additional custom css script.
 - XAMPP Apache Web Server - to establish a local server and do the testing on the localhost.
 - WinSCP - to connect to the student account and FAMNIT server.
 - Visual Studio Code - my personal code editor, for its enormous choice of quality extensions. For this project specifically of most help were Error Lense and Codeigniter 3 extension.

*******************
Most Demanding Part
*******************

At the beginning it was getting used to the Codeigniter Framework, but with the help of the Visual Studio Code extension for it, I quickly adapted to it. Then it was configuring models and controllers, and getting the data to be displayed in the views. Everything was done locally first, using XAMPP Apache Web Server. 

Lastly, setting up the configuration and the database on the FAMNIT server was a small headache, but nothing too complicated.

