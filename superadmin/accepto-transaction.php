<center>
<?php 

// Connect DB
     include 'config.php';

// Get ID from DB

if (isset($_GET['accept_id'])) {
	
  

// Execute query

  if (mysqli_query($con,"UPDATE transaction SET status='completed' where transaction_id=" .$_GET['accept_id'])) {
    header("refresh:1; url=otransactions.php");
        
              echo 'Transaction, Completed';
        
            header("refresh:1;url=otransaction.php");
  
}

}

?>
</center>


