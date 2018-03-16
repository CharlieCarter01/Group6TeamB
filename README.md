# Group6TeamB
Repo for all code and design work used in the development of the teams proposed Stress Tracking Site.

### Installing and Setting up Localhost for Site
Download [Xampp](https://www.apachefriends.org/index.html).

```
Install Xampp and start the Apache Server and MySql Server.
```




Drag the github repository files into the **C:\xampp\htdocs** directory.

[logo]: https://github.com/adam-p/markdown-here/raw/master/src/common/images/icon48.png "Logo Title Text 2"

* Set up the email verification sender on Xampp by following these instructions:

![alt text](https://i.imgur.com/hX7HNHe.png "Setup Mail")
* Change the **Auth_Username** & **Auth_Password** to:
```
auth_username=stressmonitor123@gmail.com
auth_password=stressmonitor555
```
### Setting up the MySql database
1. Create a new database in phpMyAdmin called **mydatabase**
2. Create a table called user
3. Insert the following SQL into the user table:
```
CREATE TABLE `user` (
  `Email` varchar(45) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ActivationHash` varchar(256) NOT NULL,
  `Activated` int(11) NOT NULL
)
```
4. **Done.**

Decleration

I, Josh Dobson, contributed the following to the submission: 31.6%
Backend System Design
PHP
Database Management
PHP Test Cases



I, Chetan Mistry, contributed the following to the submission: 5%
Front End Design
Manageyourstress.html

I, Charlie Carter, contributed the following to the submission: 31.6%
Front End Design
Main.html
Recordheart.html
Stressrecording.html
JavaScript 
Recordheart.html


I, Joseph Adegbile, contributed the following to the submission: 31.6%
System Test Case






