# db_class
## PHP Database Class  

Simple Class for connecting to and interacting with MySQL Database.

### Class Handles:  
-Connection
-Disconnection
-Get 1 row
-Get Multiple rows
-Insert rows
-Update rows
-Delete rows

Example SELECT query:

```
<?php  

require_once 'app/Database.php';

$db = new Database();
$query = "SELECT * FROM example_table WHERE id = ?"
$params = ["1"];

$result = $db->getRow($query, $params);

print_r($result);
```
