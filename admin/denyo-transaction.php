<center>
<?php 

// Connect DB
     include 'config.php';

// Get ID from DB

if (isset($_GET['deny_id'])) {
	
  

// Execute query

  if (mysqli_query($con,"UPDATE transaction SET status='denied' where transaction_id=" .$_GET['deny_id'])) {
    header("refresh:1; url=otransactions.php");
        
              echo 'Transaction, Denied';
        
            header("refresh:1;url=otransaction.php");
  
}

}

?>
</center>


