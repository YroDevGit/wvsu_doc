<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * CodeYro by: Tyrone Limen Malocon / Tyrone Lee Emz
 */

$CY_DB_HOST = "localhost";

//database config:
$CY_DATABASE = ""; // <<==== database name. Please change database here.
$CY_DB_USERNAME = "root";
$CY_DB_PASSWORD = "";


//Driver config:
$CY_DB_DRIVER = "mysqli";
/** CodeYRO
* Supports: mysqli, odbc, pdo, postgre, sqlite3, cubrid, ibase, mssql, sqlsrv
*			
*/

$CY_DB_PATH = ""; // This is use only when using sqlite3 or ibase as db driver ($CY_DB_DRIVER).
$CY_DB_PORT = ""; // This is use only when using cubrid db driver ($CY_DB_DRIVER).
$CY_DSN_NAME = ""; // This is use only when using odbc db driver ($CY_DB_DRIVER).


/// database config definitions.
/// please don't modify or change anything below...
define("CY_DB_HOST", $CY_DB_HOST);
define("CY_DATABASE", $CY_DATABASE);
define("CY_DB_USERNAME", $CY_DB_USERNAME);
define("CY_DB_PASSWORD", $CY_DB_PASSWORD);
define("CY_DB_DRIVER", $CY_DB_DRIVER);
define("CY_DB_PATH", $CY_DB_PATH);
define("CY_DB_PORT", $CY_DB_PORT);
define("CY_DSN_NAME", $CY_DSN_NAME);
/**
 * CodeYRO
 * @Tyrone Limen Malocon @Tyrone Lee Emz
 * Database connection...
 */
?>