###################
Vehicle Repair Assistance Information System
###################

Developed using CodeIgniter Framework.

CodeIgniter is an Application Development Framework - a toolkit - for individuals who build websites using PHP. Its primary aim is to enable faster project development by providing a rich set of libraries for common tasks, as well as a simple interface and logical structure to access these libraries. With CodeIgniter, developers can focus on their projects creatively, minimizing the amount of code required for a given task.

*******************
Description and Functionality
*******************

The information system, codenamed Vehix, is a web-based application designed to assist users in creating and discussing topics related to vehicle repairs. The application allows users to create topics and categories, comment on topics, and engage in discussions. There are three types of users:

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
 - FAMNIT phpMyAdmin Database: All data is stored in the SISIII2022_[89191015] database.
 - CodeIgniter 3 Framework: The entire project is based on this MVC framework, utilizing its foundational features to build a complete application.
 - Front-end Design: Bootstrap 5 and custom CSS were used for designing the user interface.
 - XAMPP Apache Web Server: Local server setup for testing and development purposes.
 - WinSCP: Used to connect to the student account and FAMNIT server.
 - Visual Studio Code: Personal code editor with useful extensions, including Error Lens and CodeIgniter 3 extension, greatly facilitating development tasks.

*******************
Most Demanding Part
*******************

The initial challenge was familiarizing myself with the CodeIgniter Framework, but with the assistance of the Visual Studio Code extension, I quickly adapted to it. Configuring models and controllers, as well as displaying data in views, were the subsequent tasks, all of which were done locally using XAMPP Apache Web Server for testing.

Lastly, setting up the configuration and database on the FAMNIT server posed a minor challenge but was overcome without complications.

