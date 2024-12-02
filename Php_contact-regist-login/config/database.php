<?php
      $servername = "localhost";
      $username = "root";
      $password = "Chakib1983";

      $conn = mysqli_connect($servername, $username, $password);
      // Connection checkin with creating DB & Tables
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
      
      // Creating Database
      $dbname = "CREATE DATABASE IF NOT EXISTS static_Website";      
      if ($conn->query($dbname) === FALSE) {
        echo "Database Failed!" . mysqli_connect_error();
      } else {
        $conn->query("USE static_Website");        
      }

      // Creating Tables
      $contactMail_tb = "CREATE TABLE IF NOT EXISTS mails (
            sender_id INT(20) AUTO_INCREMENT PRIMARY KEY,
            sender_name VARCHAR(50),
            sender_email VARCHAR(50),
            sender_request TEXT,
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        if ($conn->query($contactMail_tb) === FALSE) {            
            echo "Creating Contact Mails table has been failed! Check server_connection or database_name";
        }

        $registerLogin_tb = "CREATE TABLE IF NOT EXISTS registerLogin (
            user_id INT(20) AUTO_INCREMENT PRIMARY KEY,
            user_name VARCHAR(50),
            user_email VARCHAR(50),
            user_password VARCHAR(255),
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
          )";
        if ($conn->query($registerLogin_tb) === FALSE) {            
          echo "Creating Contact Mails table has been failed! Check server_connection or database_name";
        }

        // Inserting fake data fakeData.php
        //include "fakeData.php";
?>