<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST["name"];
    $message = $_POST["message"];
    $attendance = $_POST["attendance"];

    // Get the current time with GMT +7
    $timezone = new DateTimeZone('Asia/Jakarta');
    $datetime = new DateTime('now', $timezone);
    $time = $datetime->format('Y-m-d H:i:s');

    // Prepare the data array
    $data = array(
        "name" => $name,
        "message" => $message,
        "attendance" => $attendance,
        "time" => $time
    );

    // Read the existing JSON file data
    $jsonData = file_get_contents('data.json');
    $existingData = json_decode($jsonData, true);

    // Generate a unique ID for the new entry
    $id = uniqid();

    // Add the new entry to the existing data with the generated ID
    $existingData[$id] = $data;

    // Encode the updated data array as JSON
    $updatedData = json_encode($existingData, JSON_PRETTY_PRINT);

    // Save the updated JSON data back to the file
    file_put_contents('data.json', $updatedData);

    // Redirect back to the index page with success message
    header("Location: index.php?message=success");
    exit();
}
