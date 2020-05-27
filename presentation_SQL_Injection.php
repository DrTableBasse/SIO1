//Presentation of SQL Injection with an exemple of code.


<?php 
//With query option, you can play with this request to add or delete what you want. You can do every thing. 
mysql_query(SELECT FROM employees WHERE name = . $name);

//Example of SQL Injection
//This requestion will delete every line in employees table
$name = 'Test';DELETE FROM employees
mysql_query(SELECT FROM employees WHERE name = . $name);
?>

<?php


//To patch this, you must use "prepare" argument in your sql request and put it totally in variable.

//We see only PDO in classroom, so we will use it.

//NB: you must precise every information about your data base to force PDO to use prepare sql request

$connexion = new PDO('mysql:dbname="name_of_db"; host="ip"; charset=utf8', 'user','password'),

$connexion -> setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

//Case when we have an error

$connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//--------------------------------------------\\

$stmt = $pdo->prepare('SELECT * FROM employees WHERE name = :name');
$stmt->execute(array('name' => $name));
foreach ($stmt as $line)
{
//Processing the result line
}

?>
