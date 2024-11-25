<?php
include ("dbconfig.php");
error_reporting(0);

$sql = "SELECT Description, Title, Helpdesk FROM `knowledge base` limit 6";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Title: " . $row["Title"]. " - Description: " . $row["Description"]. " <br>";
  }
} else {
  echo "0 results";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phone Issues</title>
    <link rel="stylesheet" href="popup.css">
    <link rel="stylesheet" href="phone.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #1542b3c4;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
            text-align: left;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
   
</head>
<body>
    <header>
        <h1>Phone Issues</h1>
    </header>

    <section class="content">
        <p>Here, you can troubleshoot common issues with phones, such as spring problems, headset issues, and more.</p>
        <!-- Add phone issue troubleshooting content here -->
          <!-- Search form -->
      
            <input type="text" id="searchQuery" placeholder="Search phone issues..." required>
            <button type="submit">Search</button>
     
        
        <!-- Table for displaying phone issues -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Problem Type</th>
                    <th>Problem</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id='searchResults'>
                <tr>
                    <td>1</td>
                    <td>phone issues</td>
                    <td>headset problem</td>
                <td>  <button id="openModalBtn">Open Modal</button></td>  
                </tr>   
            </tbody>
        </table>
    </section>
    
    <footer>
        <a href="phone.html">Go back to Home</a>
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Pop-Up Modal</h2>
                <img src="images\M.P.-SHAH-Logo.png" alt="MPSHAH Logo" class="logo">
                <P>Headset issue</P>   
                <p>check the spring</p>        
            </div>
        </div>
    </footer>
    <script src="popup.js"></script>
    <script>
        $(document).ready(function() {
            $('#searchButton').click(function() {
                var query = $('#searchQuery').val();
                if (query) {
                    $.ajax({
                        url: 'search.php',
                        type: 'GET',
                        data: { query: query },
                        success: function(response) {
                            $('#searchResults').html(response);
                        },
error: function() {
                            $('#searchResults').html('<p>An error has occurred</p>');
                        }
                    });
                } else {
                    alert('Please enter a search query.');
                }
            });
        });
    </script>
</body>
<img src="images\M.P.-SHAH-Logo.png" alt="MPSHAH Logo" class="logo">
</html>


