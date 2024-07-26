<?php
$succ = 0;
$link = "";
$nm = "";
$hostnameCY = getWindowsSystemInfoCY();
if(isset($_POST['btn'])){
    $name = $_POST['name'];
    $nm = $name;
    $phpFile = "../../../Back_End/application/controllers/".$name.".php"; // Name of the PHP file to be created
    $link = "../../../Back_End/index.php/".$name;

    include "../../../data.php";
    $link_name_file = $SERVER_NAME."/".$APP_NAME."/Back_End/index.php/".$name;

    $phpContent = <<<EOT
    <?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class $name extends CY_Controller {//Created by: $hostnameCY
    
        public function __construct() {
            parent::__construct();
            /**
             * CodeYRO PHP framework inspired to Laravel and CodeIgniter.
             *  you can load libraries and files here..
             * \$this->load->library('session');
             */
        }

        //This is Back_End controller where you can create API's, Please don't delete this comment, you can use this in the future.
        //STATIC API:   /Back_End/index.php/$name   <== add this to your project/app parent link. 
        //Examples: 
        //LOCAL API: [SERVER]/[APPNAME]/Back_End/index.php/$name   //Replace the [SERVER]  with your servername and [APPNAME] with you projectname
        //===>LOCAL API Example use: $link_name_file
        //SERVER API: [HOST:PORT]/Back_End/index.php/$name    //Replace the [HOST:PORT]  with your HOST and PORT, Example localhost:8000
        // ===>SERVER API Example use: localhost:8000/Back_End/index.php/$name
        //PRODUCTION API: [SITENAME]/Back_End/index.php/$name 
        //===> PRODUCTION API Example use: https://CodeYRO.com/Back_End/index.php/$name 
        
        
        public function index()
        {
            //Please remove the sample code, it is just a test code
             \$data = ['AppName' => "First CodeYRO project"];
             print_r(\$data);
             //Remove the comment and replace your own code. thanks: CodeYro
        }
    
        /**
         * You can add more functions here
         */
    }
    ?>
    EOT;
    
    if (file_exists($phpFile)) {
        $succ = 2;
    } else {
        if (file_put_contents($phpFile, $phpContent) !== false) {
            $succ = 1;
        } else {
            $succ = 3;
        }
    }
}
?>

<html>
    <head>
        <title>CodeYRO</title>
        <style>
            body {
                font-family: 'Courier New', Courier, monospace;
                background-color: #282c34;
                color: #abb2bf;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }

            .card-form {
                background-color: #1c1e22;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                width: 320px;
                text-align: left;
            }

            .starting {
                padding-top: 20px;
            }

            .title {
                padding-bottom: 20px;
            }

            .main-title span {
                font-size: 22px;
                font-weight: bold;
                color: #61dafb;
            }

            .small small {
                color: #61dafb;
            }

            input[type=text] {
                width: 100%;
                padding: 10px;
                margin: 10px 0;
                border: 1px solid #61dafb;
                border-radius: 4px;
                background-color: #282c34;
                color: #abb2bf;
            }

            button {
                background-color: #61dafb;
                color: #282c34;
                border: none;
                padding: 10px;
                border-radius: 4px;
                cursor: pointer;
                width: 100%;
            }

            button:hover {
                background-color: #21a1f1;
            }

            a {
                color: #61dafb;
                text-decoration: none;
            }

            a:hover {
                text-decoration: underline;
            }

            .success-message {
                color: #28a745;
            }

            .error-message {
                color: #dc3545;
            }
        </style>
    </head>
    <body>
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
                        <label for="name">Back End Controller name:</label>
                        <input type="text" name="name" placeholder="Enter controller name">
                    </div>
                    <div>
                        <button type="submit" name="btn">Submit</button>
                    </div>
                    <?php if (intval($succ) == 1): ?>
                        <div class="success-message">
                            <p>Controller created.</p>
                            <a href="<?= $link; ?>"><?= ($link == "") ? "" : "Show " . $nm . " Controller" ?></a>
                        </div>
                    <?php elseif (intval($succ) == 2): ?>
                        <div class="error-message">
                            <p>File exists.</p>
                        </div>
                    <?php elseif (intval($succ) == 3): ?>
                        <div class="error-message">
                            <p>Failed.</p>
                        </div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </body>
</html>

<?php
function getWindowsSystemInfoCY() {
    $manufacturer = shell_exec('wmic csproduct get vendor');
    $model = shell_exec('wmic csproduct get name');

    // Clean up output
    $manufacturer = trim(preg_replace('/\s+/', ' ', $manufacturer));
    $model = trim(preg_replace('/\s+/', ' ', $model));
    $hostname = gethostname();
    return $manufacturer .'-'.$model."-".$hostname;
}
?>
