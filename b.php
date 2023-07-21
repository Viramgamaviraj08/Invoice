<?php
// Database connection details
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the descriptions from the "bill_info" table
$sql = "SELECT description, rate FROM bill_info";
$result = $conn->query($sql);

// Display the fetched data
if ($result->num_rows > 0) {
    echo "Description:";
    echo "<select name='description'>";
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row["rate"] . "'>" . $row["description"] . "</option>";
    }
    echo "</select>";

    // Prompt the user to input the quantity
    echo "<form method='POST'>";
    echo "Quantity: <input type='number' name='quantity' required>";
    echo "<input type='submit' value='Calculate'>";
    echo "</form>";

    echo "<br>";

    // Calculate the total price based on user input
    if (isset($_POST["quantity"]) && isset($_POST["description"])) {
        $quantity = $_POST["quantity"];
        $rate = $_POST["description"];
        $totalPrice = $rate * $quantity;
        echo "Total Price: " . $totalPrice;
    }
} else {
    echo "No data found in the 'bill_info' table.";
}

// Close the connection
$conn->close();
?>