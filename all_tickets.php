<?php
require_once "functions.php";
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
get_all_tickets();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Ticket</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="main.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h4>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h4>
        <h4>All Tickets</h4><a href="logout.php" class="btn btn-danger" style="float:right;margin-top:10px;">Sign Out of Your Account</a>
    </div>
      
    <div class="container">
    <div class="col-sm-12">
    <a class="btn btn-success all-ticket-btn" href="new_ticket.php">Add New Ticket</a>
    <table  class="datatabel table table-bordered table-striped table-responsive table-hover">
          <thead>
              <tr>
                <th>SL No</th>
                <th>TicketNumber</th>
                <th>email</th>
                <th>Subject</th>
                <th>Description</th>
                <th>Status</th>
              </tr>
          </thead>
          <tbody>
          <?php $slno = 0; ?>
          <?php foreach ($output_data as $row): ?>
          <?php $slno = $slno + 1; ?>
          
              <tr>
                <td><?php echo $slno; ?></td>
                <td><?php echo $row['ticketNumber']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['subject']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['status']; ?></td>
              </tr>
          <?php endforeach ?>
          </tbody>
    </table>


    </div>
    </div>
   
</body>
</html>