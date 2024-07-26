<?php
$OK = "";
if(isset($_POST['btn'])){
    $name = $_POST['name'];
    $server = $_POST['server'];
    $htaccessFile = '../.htaccess';

$htaccessContent = <<<EOT
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteBase /$name/

    # Rewrite requests to Front_End if they are not for existing files or directories
    RewriteCond %{REQUEST_URI} !^/Front_End/
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ Front_End/$1 [L]

    # Rewrite requests to Back_End if they are not for existing files or directories
    RewriteCond %{REQUEST_URI} !^/Back_End/
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^back_end/(.*)$ Back_End/$1 [L]

    # Redirect Trailing Slashes...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)/$ /$1 [L,R=301]
</IfModule>
EOT;

if (file_put_contents($htaccessFile, $htaccessContent) !== false) {
    
} else {
    echo "There was an error creating the .htaccess file.";
}

$htaccessFile = '../Front_End/.htaccess';

$htaccessContent = <<<EOT
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteBase /$name/

    # Redirect Trailing Slashes...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Remove index.php from URL
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ index.php/$1 [L]
</IfModule>
EOT;

if (file_put_contents($htaccessFile, $htaccessContent) !== false) {
    
} else {
    echo "There was an error creating the .htaccess file.";
}

$phpFile = '../data.php'; 

$phpContent = <<<EOT
<?php

/** 
 * 
 * @package    CodeYRO
 * @author     Tyrone Lee Emz
 * @author name: Tyrone Limen Malocon
 * @copyright  Copyright (c) 2024 - Tyrone Lee Emz
 * @since      Version 1.0.0
 * @filesource
 * 
*/

// Change app details
\$APP_TITLE = ""; // Optional
\$APP_DESCRIPTION = ""; // Optional
\$YEAR = date("Y-m-d"); // Optional

// When using apache, might need to use the default http://localhost/, might need to rename when server is changed
\$SERVER_NAME = "$server"; // Mandatory - this is the first thing you need to rename
\$APP_NAME = "$name"; // Mandatory - this is the second thing you need to rename
\$APP_PROTOCOL = "http://"; // Mandatory - this is the second thing you need to rename


?>
<?php
function get_cy_base_link(\$default) {
    \$host = \$_SERVER['HTTP_HOST'];
    \$uri = \$_SERVER['REQUEST_URI'];
    if (strpos(\$host, ':') !== false) {
        return "http://\$host";
    } else {
        return \$default;
    }
}


?>
EOT;

if (file_put_contents($phpFile, $phpContent) !== false) {
    $OK = "1";
} else {
    echo "There was an error creating the $phpFile file.";
}
}

function getProjectRootFolderName() {
    $currentDir = __DIR__;
    $parentDir = dirname($currentDir);
    return basename($parentDir);
}
?>

<html>
<head>
    <title>CodeYRO</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            background-color: #0b0c10;
            color: #66fcf1;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        .card-form {
            background-color: #1f2833;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 255, 255, 0.2);
            width: 350px;
            text-align: left;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .starting {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            width: 100%;
        }

        .title {
            padding-bottom: 20px;
            text-align: center;
        }

        .main-title span {
            font-size: 24px;
            font-weight: bold;
            color: #66fcf1;
        }

        .small small {
            color: #66fcf1;
        }

        input[type=text] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #66fcf1;
            border-radius: 4px;
            background-color: #0b0c10;
            color: #66fcf1;
        }

        button {
            background-color: #66fcf1;
            color: #0b0c10;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #45a29e;
        }

        a {
            color: #66fcf1;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .success-message {
            color: #45a29e;
        }

        .error-message {
            color: #d9534f;
        }

        footer {
            position: absolute;
            bottom: 10px;
            width: 100%;
            text-align: center;
            color: #c5c6c7;
        }

        .rw {
            padding-top: 20px;
        }

        .rw a {
            color: #66fcf1;
        }

        .makesure {
            color: #c5c6c7;
            font-size: 14px;
            font-family: monospace;
        }

        #modax {
            position: fixed;
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            background-color: rgba(0,0,0,0.9);
            z-index: 1000;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .modax-body {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .rrw {
            padding: 10px 0;
        }

        .bt {
            width: 150px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            height: 35px;
            margin: 5px;
        }

        .ok {
            background-color: #b6f7ff;
        }

        .start {
            background-color: #d4ffa1;
        }

        .tdbt {
            padding: 0 7px;
        }

        .success-copy {
            color: black;
        }
    </style>
</head>
<body>
    <?php if(file_exists("../data.php")): ?>
        <?php include_once "../data.php" ?>
    <div class="rw"><span class="makesure">Welcome to CodeYRO:</span></div>
    <div class="rw"><a href="<?= get_cy_base_link($APP_PROTOCOL.$SERVER_NAME.'/'.$APP_NAME) ?>" target="_blank">Open Homepage</a></div>
    <div class="rw"><a onclick="return confirm('Are you assigned to Front End?')" href="<?= get_cy_base_link($APP_PROTOCOL.$SERVER_NAME.'/'.$APP_NAME).'/generate/Controller/FE/' ?>" target="_blank">Add Front End <b>Controller</b></a></div>
    <div class="rw"><a onclick="return confirm('Are you assigned to Front End?')" href="<?= get_cy_base_link($APP_PROTOCOL.$SERVER_NAME.'/'.$APP_NAME).'/generate/Model/index.php' ?>" target="_blank">Add Front End <b>MODEL</b></a></div>
    <div class="rw"><a onclick="return confirm('Are you assigned to Back End?')" href="<?= get_cy_base_link($APP_PROTOCOL.$SERVER_NAME.'/'.$APP_NAME).'/generate/Controller/BE/' ?>" target="_blank">Add Back End <b>Controller</b></a></div>
    <?php endif; ?>

    <?php if(file_exists("../data.php")): ?> 
<div align='center' style="padding:20px 0px 5px 0px">
    <div>
        <span style="color:red;">Warning: File is already generated,<br>You don't need to submit the project details again unless you made some changes in parent folder name and server name.</span>
    </div>
</div>
<?php endif; ?>
    
    <div class="starting">
        <div class="card-form">
            <div class="title">
                <div class="main-title">
                    <span>CodeYro Framework</span>
                </div>
                <div class="small">
                    <small>Let us start with your project details</small>
                </div>
            </div>
            <form action="" method="post">
                <div>
                    <label for="name">Project name:</label>
                    <input type="text" name="name" value="<?= getProjectRootFolderName() ?>" placeholder="Enter project name">
                </div>
                <div>
                    <label for="server">Project server:</label>
                    <input type="text" name="server" value="<?= $_SERVER['SERVER_NAME'] ?>" placeholder="Enter project server">
                </div>
                <button type="submit" name="btn">Generate</button>
                <?php if($OK == "1"): ?>
                    <div class="success-message">Files created successfully!</div>
                <?php endif; ?>
            </form>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 CodeYRO. All Rights Reserved.</p>
    </footer>
</body>
</html>
