PHP project aiming to manipulate an SQL table using user input.

Will later be implemented into my server code. 

Add to your code using: 
```require 'username.php';

$user = new user('host', 'user', 'password', 'dbname');

$user->addUser('usernameYouWant');

$userData = $user->readUser('usernameYouWant');```
