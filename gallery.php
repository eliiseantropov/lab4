<?php include("config.php"); ?>
<?php include("header.php"); ?>


<div class="wrap">
<?php

@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    echo("<br><a href=index.php>Return to home page </a>");
    exit();
}

$userNAME = "userNAME";
$userPASSWORD = "userPASSWORD";

if (isset($_POST) && !empty($_POST)) {
# Get data from form
    $userNAME = trim($_POST['userNAME']);
    $userPASSWORD = trim($_POST['userPASSWORD']);
}

$userNAME = addslashes($userNAME);
$userPASSWORD = addslashes($userPASSWORD);


if (isset($_POST['userNAME'], $_POST['userPASSWORD'])) {
    #with statement under we're making it SQL Injection-proof
    $userNAME = mysqli_real_escape_string($db, $_POST['userNAME']);
    
    #without function, so here you can try to implement the SQL injection
    #various types to do it, either add ' -- to the end of a username, which will comment out
    #or simply use 
    #' OR '1'='1' #
    #$uname = $_POST['username'];
    
    #here we hash the password, and we want to have it hashed in the database as well
    #optimally when you create a user (through code) you simply send a hash
    #hasing can be done using different methods, MD5, SHA1 etc.
    
    $userPASSWORD = sha1($_POST['userPASSWORD']);
    
    #just to see what we are selecting, and we can use it to test in phpmyadmin/heidisql
    
 //echo "SELECT * FROM Users WHERE userNAME = '{$userNAME}' AND userPASSWORD = '{$userPASSWORD}'";
    
    $query = ("SELECT * FROM Users WHERE userNAME = '{$userNAME}' "."AND userPASSWORD = '{$userPASSWORD}'");
       
    
    $stmt = $db->prepare($query);
    $stmt->execute();
    $stmt->store_result(); 
    
    #here we create a new variable 'totalcount' just to check if there's at least
    #one user with the right combination. If there is, we later on print out "access granted"
    $totalcount = $stmt->num_rows();
}
?>





<h3>Log in to your account</h3>

<?php
        if (isset($totalcount)) {
            if ($totalcount == 0) {
                echo '<p>Your username or password is incorrect.</p>';
            } else {
                echo "<div id='fileupload-div'><a href='fileUpload.php'><p id='back'>Welcome! Click here to upload your image.</p></a></div>";
            }
        }
?>



<form action="gallery.php" method="POST" accept-charset="UTF-8">

   Username
   <input class="style-upload" type='text' name='userNAME' id='userNAME'/>
   Password
   <input class="style-upload" type='password' name='userPASSWORD' id='userPASSWORD'/>
   <input class="style-submit" type='submit' name='Submit' value='Submit' />

</form>  


<div id="gallery">
<?php

//https://stackoverflow.com/questions/11903289/pull-all-images-from-a-specified-directory-and-then-display-them

     $files = glob("uploadedfiles/*.*");
     for ($i=0; $i<count($files); $i++)
      {
        $image = $files[$i];
        $supported_file = array(
                'gif',
                'jpg',
                'jpeg',
                'png'
         );

         if ($supported_file) {
            
             echo '<img src="'.$image .'" alt="Random image" />'."<br /><br />";
            } else {
                continue;
            }
          }
       ?>
</div>
</div>
<?php include("footer.php"); ?>