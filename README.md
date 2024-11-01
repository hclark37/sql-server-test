PHP project aiming to manipulate an SQL table using user input.

Will later be implemented into my server code. 

To create the table:
```mysql -u username -p

USE databasename;

SOURCE /path/to/your/database.sql;```

Add to your code using: 
```require 'username.php';

$user = new user('host', 'user', 'password', 'dbname');

$user->addUser('usernameYouWant');

$userData = $user->readUser('usernameYouWant');```
