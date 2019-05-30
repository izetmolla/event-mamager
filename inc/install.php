<?php
$link = '';
require_once('config.php');
$message = '';
if(!$_GET['steps']){header("Location: install.php?steps=1");}
if(isset($_POST['submit'])){
    if($_POST['dbhost']){
        $dbhost = $_POST['dbhost'];
        $dbusername = $_POST['dbusername'];
        $dbname = $_POST['dbname'];
        $dbpass = $_POST['dbpass'];

        // Create connection
        $conn = new mysqli($dbhost, $dbusername, $dbpass, $dbname);
        // Check connection
        if ($conn->connect_error) {
            $message = 'Please Check Database Information';
        }else{
            $message = '';
            $gezim = '<?php
            define("DB_SERVER", "'.$dbhost.'");
            define("DB_USERNAME", "'.$dbusername.'");
            define("DB_PASSWORD", "'.$dbpass.'");
            define("DB_NAME", "'.$dbname.'");
            define("ROOT_DIR", realpath(dirname(__FILE__)) .DIRECTORY_SEPARATOR);

            /* Attempt to connect to MySQL database */
            $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

            // Check connection
            if($link === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }';
            $myfile = fopen("config.php", "w") or die("Unable to open file!");
            fwrite($myfile, $gezim);
            fclose($myfile);
            if($myfile){
                                // sql to create table
            $filename = 'db.sql';
            $handle = fopen($filename, 'r+');
            $contents = fread($handle, filesize($filename));
            $sql = explode(";", $contents);
            foreach ($sql as $query) {
                $result = mysqli_query($conn, $query);
                if ($result) {
                    header("Location: install.php?steps=2");
                }
            }

            fclose($handle);

                
                
               
            }
        } 
    }
}


if(isset($_POST['register_admin'])){
    echo 'Admin';
}
?><!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="/assets/lib/bootstrap/css/bootstrap.css" rel="stylesheet">
    <title>Install</title>
      <style>
          body{
              background-color: beige;
          }
          .install-form{
              max-width: 500px;
              background: white;
              border: 1px solid black;
              border-radius: 20px;
              min-height: 250px;
              margin: auto;
             margin-top: 50px;
          }
          .install-form form{
              padding: 15px;
          }
      
      
      </style>
  </head>
  <body>
<?php if(!$link){ ?>
    <div class="container">
        
    <?php if($_GET['steps'] == '1'){ ?>
            <div class="install-form">
                <form method="post" action="/inc/install.php">
                    <center class="text-red"><?php echo $message; ?></center>
                    <div class="row p-2">
                        <div class="col-6 text-right"><b>Db Host: </b></div>
                        <div class="col-6 text-left"><input type="text" name="dbhost" required=""></div>
                    </div>
                    <div class="row p-2">
                        <div class="col-6 text-right"><b>Db Name: </b></div>
                        <div class="col-6 text-left"><input type="text" name="dbname" required=""></div>
                    </div>
                    <div class="row p-2">
                        <div class="col-6 text-right"><b>Db Username: </b></div>
                        <div class="col-6 text-left"><input type="text" name="dbusername" required=""></div>
                    </div>
                    <div class="row p-2">
                        <div class="col-6 text-right"><b>Db Password: </b></div>
                        <div class="col-6 text-left"><input type="text" name="dbpass"></div>
                    </div>
                    <div class="row">
                        <div class="col-6"><button type="submit" name="submit">Install</button></div>
                    </div>
                </form>
            </div>
    <?php }elseif($_GET['steps'] == '2'){?>
            <div class="install-form">
                <form>
                    <div class="row p-2">
                        <div class="col-6 text-right"><b>Username: </b></div>
                        <div class="col-6 text-left">admin</div>
                    </div>
                    <div class="row p-2">
                        <div class="col-6 text-right"><b>Password: </b></div>
                        <div class="col-6 text-left">admin123</div>
                    </div>
                    <div class="row p-2">
                        <h2><center style="text-align:center;"><a href="/login/">Login To Admin</a></center></h2>
                    </div>
                </form>
            </div>
    <?php } ?>
        
    <?php }elseif($_GET['steps'] == '2'){?>
            <div class="install-form">
                <form>
                    <div class="row p-2">
                        <div class="col-6 text-right"><b>Username: </b></div>
                        <div class="col-6 text-left">admin</div>
                    </div>
                    <div class="row p-2">
                        <div class="col-6 text-right"><b>Password: </b></div>
                        <div class="col-6 text-left">admin123</div>
                    </div>
                    <div class="row p-2">
                        <h2><center style="text-align:center;"><a href="/login/">Login To Admin</a></center></h2>
                    </div>
                </form>
            </div>
<?php }else{?>
        <h1>Installed DB</h1>
<?php } ?>
    </div>
  </body>
</html>