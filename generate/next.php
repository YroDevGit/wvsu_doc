<?php 

$htaccessFile = '../.htaccess';

$htaccessContent = <<<EOT
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteBase /project/

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

// Write the content to the .htaccess file
if (file_put_contents($htaccessFile, $htaccessContent) !== false) {
    echo ".htaccess file has been created successfully.";
} else {
    echo "There was an error creating the .htaccess file.";
}

?>