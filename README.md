# php Project-1

# Project Name
PHP LOGIN PAGE

# Author Name
JOY BIWOTT

# Reg No.
ENE212-0077/2022

# Project Description
This is a basic login system created in php

# Project set-up
    CONFIGURING XAMPP.

    THE HEADER/FOOTER
The header and footer do not change with shift from one file to another
This calls for the code to be stored dynamically i.e in the header.php & footer.php file.

        2.THE SIGN-UP PAGE
Create the file and like the headers and footers to it
in the form, the action is the page the data will be sent to onSubmit
action set to signup.inc.php, a file in the includes directory

        3. THE LOG IN PAGE
Same procedure as the sign up page

        4. CONNECTING TO THE DATABASE
A file, dbh.inc.php is created in the includes folder to connect to the databases and store whatever variables we need
a. A database name is required for the file
 A variable conn is assigned that actually connects/ opens up to our database.
 *PDO* VS *MySQL i*

        5. CREATING THE DATABASE TABLE
we'll use create table.
users will contain all the users that will log in
usersId autogenerates