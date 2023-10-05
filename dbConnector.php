<?php

// Create constants
DEFINE ('DB_USER', 'username');
DEFINE ('DB_PSWD', 'password');
DEFINE ('DB_SERVER', 'localhost');
DEFINE ('DB_NAME', 'database name');

// ///////////////////////////////////////////////////
// Get db connection
function ConnGet() {
    // $dbConn will contain a resource link to the database
    // @ Don't display error
    $dbConn = @mysqli_connect(DB_SERVER, DB_USER, DB_PSWD, DB_NAME, 3306)
    OR die('Failed to connect to MySQL ' . DB_SERVER . '::' . DB_NAME . ' : ' . mysqli_connect_error()); // Display messge and end PHP script

    return $dbConn;
}


function Search($dbConn, $searchTerm)
{
    $query = "SELECT * FROM tableName WHERE itemName like '%" . $searchTerm . "%' OR anotherField like '%" . $searchTerm . "%'";
    return @mysqli_query($dbConn, $query);
}


function GetItemById($dbConn, $itemId)
{
    $query = "SELECT * FROM tableName WHERE itemId = " . $itemId . ";";
    return @mysqli_query($dbConn, $query);
}

function GetItemAlternative($dbConn, $itemId)
{
    $query = "SELECT JSON_OBJECT(
                'id', table.id,
                'field1', table.field1,
                'field2', table.field2,
                'field3', table.field3) as Json1
                FROM cart WHERE id = $itemId;";
    return @mysqli_query($dbConn, $query);
}

function GetAll($dbConn)
{
    $query = "SELECT * FROM tableName;";
    return @mysqli_query($dbConn, $query);
}


function DeleteSingleItemByParam($dbConn, $productTitle)
{
    $query = "DELETE * FROM tableName WHERE itemName = " . $productTitle . ";";
    return @mysqli_query($dbConn, $query);
}

function DeleteAll($dbConn)
{
    $query = "DELETE * FROM tableName;";
    return @mysqli_query($dbConn, $query);
}

function Insert($dbConn, $value){
    $query = "INSERT INTO tablename (value) VALUES (" . $value . ");";
    return @mysqli_query($dbConn, $query);
}

?>