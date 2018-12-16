<center>
<?php 

// Connect DB
     include 'config.php';

// Get ID from DB

if (isset($_GET['accept_id'])) {
	
  

// Execute query

  if (mysqli_query($con,"UPDATE transaction SET status='ongoing' where transaction_id=" .$_GET['accept_id'])) {
    header("refresh:1; url=ptransactions.php");
        
              echo 'Transaction Accepted, Moved to Ongoing';
        
            header("refresh:1;url=ptransaction.php");
  
}

}

?>
</center>


