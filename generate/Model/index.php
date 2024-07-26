<?php
$succ = 0;
$link = "";
$nm = "";
$hostnameCY = getWindowsSystemInfoCY();
if(isset($_POST['btn'])){
    $name = $_POST['name'];
    $nm = $name;
    $phpFile = "../../Front_End/application/models/".$name.".php";
    $phpFile1 = "../../Front_End/application/controllers/".$name.".php"; // Name of the PHP file to be created
    $link = "../../../".$name;

    $guide_cy = "\$this->{$name}->getName();";

    $phpContent = <<<EOT
    <?php
        defined('BASEPATH') OR exit('No direct script access allowed');

        class $name extends CY_Model {//created by: $hostnameCY

            public function __construct() {
                parent::__construct();
                /**
                 * in your controller. add this model
                 * CY_USE_MODEL('$name');   or   \$this->load->model('$name');
                 */
            }

            
            public function getTableName(){ //Sample function, you can delete or replace this.
                return "CodeYRO";
            } // to call this function: $guide_cy
        
            
            //add functions here...






            

        }
    ?>
    EOT;
    
    if (file_exists($phpFile)||file_exists($phpFile1)) {
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
                background-color: #000;
                color: #0f0;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }

            .card-form {
                background-color: #222;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 255, 0, 0.2);
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
                color: #0f0;
            }

            .small small {
                color: #0f0;
            }

            input[type=text] {
                width: 100%;
                padding: 10px;
                margin: 10px 0;
                border: 1px solid #0f0;
                border-radius: 4px;
                background-color: #000;
                color: #0f0;
            }

            button {
                background-color: #0f0;
                color: #000;
                border: none;
                padding: 10px;
                border-radius: 4px;
                cursor: pointer;
                width: 100%;
            }

            button:hover {
                background-color: #0b0;
            }

            a {
                color: #0f0;
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
                        <small>ADD MODEL</small>
                    </div>
                </div>
                <form action="" method="post">
                    <div>
                        <label for="name">Model name:</label>
                        <input type="text" name="name" placeholder="Enter model name">
                    </div>
                    <div>
                        <button type="submit" name="btn">Submit</button>
                    </div>
                    <?php if (intval($succ) == 1): ?>
                        <div class="success-message">
                            <p>Model created.</p>
                        </div>
                    <?php elseif (intval($succ) == 2): ?>
                        <div class="error-message">
                            <p>Filename exists.</p>
                        </div>
                    <?php elseif (intval($succ) == 3): ?>
                        <div class="error-message">
                            <p>Failed.</p>
                        </div>
                    <?php endif; ?>
                </form>
            </div>
            <div align='center' style="padding-top: 20px;">
                <?php if(intval($succ)==2): ?>
                    <span style="color: red;">File name should not be the same with any controller or model names</span>
                <?php endif; ?>
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
