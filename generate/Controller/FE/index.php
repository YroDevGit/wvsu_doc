<?php
$succ = 0;
$link = "";
$nm = "";
$hostnameCY = getWindowsSystemInfoCY();
if (isset($_POST['btn'])) {
    if (isset($_POST['addview'])) {
        $at = "false";
        if(isset($_POST['auth'])){
            $at = "true";
        }
        $name = $_POST['name'];
        $nm = $name;
        $phpFile = "../../../Front_End/application/controllers/" . $name . ".php"; // Name of the PHP file to be created
        $link = "../../../" . $name;
        $phpContent = <<<EOT
        <?php 
        defined('BASEPATH') OR exit('No direct script access allowed');
        class $name extends CY_Controller {//Created by: $hostnameCY
        
            public function __construct() {
                parent::__construct();
                AUTHENTICATE_CY_USER($at); // Set to TRUE to make this controller under authentication.
                /**
                 * CodeYRO PHP framework inspired to Laravel and CodeIgniter.
                 *  you can load libraries and files here..
                 * \$this->load->library('session');
                 */
            }
            
            // This is a Front_End controller (Manage User interface and fetch data from Back End to display).
            // You can also directly interact with database using CY_DB. Example: CY_DB_SETQUERY('your query').
    
            public function index() 
            {
                /**
                 * index() function is a class main function.
                 * Example: when you call $name controller, it will find and read the index() function
                 * You can add view here to display front_end view
                 * \$this->load->view('welcome_message'); // will display welcome_message.php
                 */
                //Remove sample code: echo "Hello world - CodeYRO";
                \$this->load->view('$name');
                //This is just a sample text, you can remove comments now.
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

        $viewFile = "../../../Front_End/application/views/" . $name . ".php";
        $viewContent = $phpContent = <<<EOT
            Welcome to CodeYRO
        EOT;

        if (file_exists($viewFile)) {
            $succ = 2;
        } else {
            if (file_put_contents($viewFile, $viewContent) !== false) {
                $succ = 1;
            } else {
                $succ = 3;
            }
        }
    } else {
        $at = "false";
        if(isset($_POST['auth'])){
            $at = "true";
        }
        $name = $_POST['name'];
        $nm = $name;
        $phpFile = "../../../Front_End/application/controllers/" . $name . ".php"; // Name of the PHP file to be created
        $link = "../../../" . $name;
        $phpContent = <<<EOT
        <?php 
        defined('BASEPATH') OR exit('No direct script access allowed');
        class $name extends CY_Controller { //Created by: $hostnameCY
        
            public function __construct() {
                parent::__construct();
                AUTHENTICATE_CY_USER($at);
                /**
                 * CodeYRO PHP framework inspired to Laravel and CodeIgniter.
                 *  you can load libraries and files here..
                 * \$this->load->library('session');
                 */
            }
            
            // This is a Front_End controller (Manage User interface and fetch data from Back End to display).
    
            public function index() 
            {
                /**
                 * index() function is a class main function.
                 * Example: when you call $name controller, it will find and read the index() function
                 * You can add view here to display front_end view
                 * \$this->load->view('welcome_message'); // will display welcome_message.php
                 */
                //Remove sample code: echo "Hello world - CodeYRO";
                echo "Hello world - CodeYRO";
                //This is just a sample text, you can remove comments now.
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
}
?>

<html>
<head>
    <title>CodeYRO</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #141414; 
            color: #e5e5e5; 
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card-form {
            background-color: #333; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            padding: 30px;
            border-radius: 8px;
            text-align: center;
            width: 350px;
        }

        .starting {
            padding-top: 50px;
        }

        .title {
            padding-bottom: 20px;
        }

        .main-title span {
            font-size: 28px;
            font-weight: bold;
            color: #e50914; 
        }

        .small small {
            color: #b3b3b3;
        }

        input[type=text] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #555;
            border-radius: 4px;
            background-color: #222; 
            color: #e5e5e5;
        }

        button {
            background-color: #e50914; 
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #f40612;
        }

        a {
            color: #e50914; 
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .success-message {
            color: #0e76a8; 
        }

        .error-message {
            color: #e50914; 
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
                    <label for="name">Front End Controller name:</label>
                    <input type="text" name="name" placeholder="Enter controller name" required>
                </div>
                <div style="padding-top: 5px; padding-bottom:20px;">
                    <label for="auth" title="If checked, Users should be authenticated or logged in to have access to this controller functions"><input type="checkbox" name="auth" id="auth" checked>Authenticated</label>
                </div>
                <div style="display: none;">
                    <label for="check">
                        <input type="checkbox" id="check" name="addview">Add view
                    </label>
                </div>
                <div>
                    <button type="submit" name="btn">Submit</button>
                </div>
                <?php if (intval($succ) == 1): ?>
                    <div class="success-message">
                        <p>Controller created.</p>
                        <a style="color:#1bdb1b;" href="<?= $link; ?>"><?= ($link == "") ? "" : "Show " . $nm . " Controller" ?></a>
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
