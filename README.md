# PHP API REST 🐘
## This API is intended to allow to access a users CRUD.

<p align="center">
    <a href="#about">About</a> •
    <a href="#pre-requirements">Pre requirements</a> • 
    <a href="#how-to-use">How to use</a> • 
    <a href="#technologies">Technologies</a> •
    <a href="#author">Author</a>
</p>

<h4 align="center"> 
	🏁 PHP API REST ✔ version 2.0.1 is ready 🏁
</h4>

<div id="about">
    <h1>About</h1>
    <p>This is a project that addresses an API in pure PHP in a simple way. The objective was to create a user control system that has a CRUD and a login method, and these functions can be accessed when the API is properly authenticated.</p>
</div>

<div id="pre-requirements">
    <h1>Pre requirements</h1>
🔹 To use the project it is necessary to have PHP and Apache installed on the computer considering that the system will run the system at localhost. For the development of this project, the XAMPP tool was used, which can be accessed at the following address: https://www.apachefriends.org/download.html<br>
🔹 It is also necessary to have an API Client Platform. In this project Insomnia was used. This software can be found at the follow address: https://insomnia.rest/download
</div>

<div id="how-to-use">
    <h1>How to use</h1>
🔹 The first step is to clone the project into the XAMPP htdocs folder, this is an example: <b>xampp/htdocs/PHP_API_REST/clone here</b>.<br>
🔹 To run the API it is necessary to have the Apache server and PHP connected.<br>
🔹 You have to create the project database. You have to go to database folder, copy the sql code and paste in into the database manager of your choice (In this project SQLyog Communit software was used, you can find it in https://code.google.com/archive/p/sqlyog/wikis/Downloads.wiki). Press <b style="color: blue">CTRL + A<b> to select all SQL code and press to run. You will have two tables: user and log_change_user as the following images. 


![user_table]()


![log_change_user_table]()


🔹 Go to the documentation/documents folder and open the index.html file in the browser of your choice. This file shows how to use each of the API endpoints. Note that it is necessary to put the project path before the endpoint in the URL inside Insomnia. See the example:

![request_example](https://github.com/DayaneCordeiro/PHP_API_REST/blob/main/images/request_example.png)


🔹 With the server and PHP working, you can use Insomnia to access the API functions, all the details are in the documentation mentioned in the previous topic.
</div>

<div id="technologies">
    <h1>Technologies</h1>
 
 The following tools were used in the construction of the project:

- [PHP](https://www.php.net/)
- [MySQL](https://www.mysql.com/)
- [JWT](https://github.com/firebase/php-jwt)
- [Apidoc](https://apidocjs.com/)
- [Autoload](https://getcomposer.org/doc/01-basic-usage.md)
</div>

<div id="autho">
    <h1>Author</h1>
    <a href="https://github.com/DayaneCordeiro">
        <img style="border-radius: 100%;" src="https://avatars.githubusercontent.com/u/50596100?v=4" width="150px;" alt=""/>
        <br />
        <sub><b>Dayane Cordeiro</b></sub>
    </a>

Made with ❤️ by Dayane Cordeiro!

✔ Computer Engineering student at PUC Minas<br>
✔ PHP Developer<br>
✔ Passionate about computer architecture and learning.<br>

[![Linkedin Badge](https://img.shields.io/badge/-Dayane-blue?style=flat-square&logo=Linkedin&logoColor=white&link=https://www.linkedin.com/in/dayane-cordeiro-1b761318b/)](https://www.linkedin.com/in/dayane-cordeiro-1b761318b/) 
[![Gmail Badge](https://img.shields.io/badge/-dayane.cordeirogs@gmail.com-c14438?style=flat-square&logo=Gmail&logoColor=white&link=mailto:dayane.cordeirogs@gmail.com)](mailto:dayane.cordeirogs@gmail.com)
</div>
