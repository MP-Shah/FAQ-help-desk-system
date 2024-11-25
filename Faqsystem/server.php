<?php
include 'db.php';
session_start();
$_SESSION['success_login'] = false;
$errors=array();
// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    if (count($errors) == 0) {
       // $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($conn, $query);
// Check for query execution failure
if (!$results) {
    die("Query failed: " . mysqli_error($conn)); // Provides detailed error info if the query fails
}
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['success_login'] = true;
            header('location: index.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}
// Check if the search query is set
if (isset($_GET['query'])) {
    $search = $_GET['query'];

    // Use prepared statements to avoid SQL injection
    $stmt = $conn->prepare("SELECT * FROM your_table_name WHERE your_column_name LIKE ?");
    $searchTerm = "%" . $search . "%"; // Wildcards for LIKE search
    $stmt->bind_param("s", $searchTerm);
    
    // Execute the statement
    $stmt->execute();
    
    // Get the result
    $result = $stmt->get_result();


// Output the search results in a table
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>ID</th>"; // Change as per your table structure
        echo "<th>Your Column</th>"; // Change as per your table structure
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
echo "<td>" . htmlspecialchars($row['your_column_name']) . "</td>"; // Display your_column_name
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p>No results found</p>";
    }
    
    // Close the statement
    $stmt->close();
} 


?>
