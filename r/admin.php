<?php

@include 'config.php';

session_start();

$feedback = [];
$contacts = [];


$feedback_query = "SELECT * FROM admin_db";
$feedback_result = mysqli_query($conn, $feedback_query);

if ($feedback_result && mysqli_num_rows($feedback_result) > 0) {

    $feedback = mysqli_fetch_all($feedback_result, MYSQLI_ASSOC);
} else {
    echo "No feedback data found or error fetching feedback data: " . mysqli_error($conn);
}


$contact_query = "SELECT * FROM contacts";
$contact_result = mysqli_query($conn, $contact_query);

if ($contact_result && mysqli_num_rows($contact_result) > 0) {

    $contacts = mysqli_fetch_all($contact_result, MYSQLI_ASSOC);
} else {
    echo "No contact data found or error fetching contact data: " . mysqli_error($conn);
}
?>
       
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>

<h2>Feedback Data</h2>
<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Feedback</th>
        <th>Submitted At</th>
    </tr>
    <?php
    // Display feedback data
    if (!empty($feedback)) {
        foreach ($feedback as $fb) {
            echo "<tr>
                    <td>{$fb['name']}</td>
                    <td>{$fb['email']}</td>
                    <td>{$fb['feedback_text']}</td>
                    <td>{$fb['submitted_at']}</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No feedback available.</td></tr>";
    }
    ?>
</table>

<h2>Contact Information</h2>
<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Submitted At</th>
    </tr>
    <?php
    // Display contact data
    if (!empty($contacts)) {
        foreach ($contacts as $contact) {
            echo "<tr>
                    <td>{$contact['name']}</td>
                    <td>{$contact['email']}</td>
                    <td>{$contact['phone']}</td>
                    <td>{$contact['created_at']}</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No contact information available.</td></tr>";
    }
    ?>
</table>

</body>
</html>

