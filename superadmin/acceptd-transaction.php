<center>
<?php 

// Connect DB
     include 'config.php';

// Get ID from DB

if (isset($_GET['accept_id'])) {
	
  

// Execute query

  if (mysqli_query($con,"UPDATE transaction SET status='ongoing' where transaction_id=" .$_GET['accept_id'])) {
    header("refresh:1; url=dtransactions.php");
        
              echo 'Transaction, Moved to Ongoing';
        
            header("refresh:1;url=dtransaction.php");
  
}

}

?>
</center>


