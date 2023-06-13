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
        "name" => ucwords($name),
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

    // Prepare the response data
    $response = array(
        'status' => 'success',
        'message' => 'Ucapan berhasil dikirim!',
        'entry' => array(
            'name' => ucwords($name),
            'attendance' => $attendance,
            'message' => $message,
            'time' => strtotime($time)
        )
    );

    // Return the response as JSON
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}

// Get the current page number from the query parameter
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/menikah.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="container">
        <div id="message-container"></div>
        <form id="save-form">
            <div class="form-group">
                <input type="text" class="form-control" id="name" name="name" placeholder="Nama" required>
            </div>
            <div class="form-group">
                <textarea class="form-control" id="message" name="message" placeholder="Tulis Ucapan & Doa" required></textarea>
            </div>
            <div class="form-group">
                <select class="form-control" id="attendance" name="attendance" required>
                    <option value="" disabled selected>Konfirmasi Kehadiran</option>
                    <option value="Hadir">Hadir</option>
                    <option value="Tidak Hadir">Tidak Hadir</option>
                </select>
            </div>
        </form>
        <div class="has-text-centered" id="send-button">
                <button type="submit" class="btn-odd"><i class="fa fa-paper-plane"></i>&nbsp;&nbsp;Kirim</button>
        </div>
        <div id="data-container">
        <?php
            include 'get-data.php';
        ?>
        </div>
        <div id="pagination-container">
            <?php 
            $hal = isset($_GET['page']) ? intval($_GET['page']) : 1;
            // Use the updated $page value in your code

            $totalItems = count($data);
            $totalPages = ceil($totalItems / 5);
            // $currentPage = 1;
            $currentPage = $hal;
            $paginationHtml = '';
            // echo "<script>console.log(" . $hal . ");</script>";

            // Generate the pagination link numbers
            for ($i = 1; $i <= $totalPages; $i++) {
                // $activeClass = ($i == $currentPage) ? 'active' : '';
                // $paginationHtml .= '<li class="page-item ' . $activeClass . '">';
                $paginationHtml .= '<a class="page-link" href="?page=' . $i . '">' . $i . '</a>';
                $paginationHtml .= '</li>';  
                
            }
            
            // Include the pagination HTML in the initial response within the pagination container div
            echo '<div id="pagination-container">';
            echo '<nav aria-label="Page navigation">';
            echo '<ul class="pagination justify-content-center mt-4">';
            echo $paginationHtml;
            echo '</ul>';
            echo '</nav>';
            echo '</div>';

            ?>
        </div>
    </div>

  <script>
    // Function to generate the HTML for attendance status
    function getAttendanceHTML(attendance) {
        if (attendance === "Hadir") {
            return '<div class="attendance"><i class="fa fa-check check-icon"></i><span>Hadir</span></div>';
        } else if (attendance === "Tidak Hadir") {
            return '<div class="attendance"><i class="fa fa-times cross-icon"></i><span>Tidak Hadir</span></div>';
        }
    }

    // Function to calculate the time ago
    function timeago(timestamp) {
        var currentTime = Math.floor(Date.now() / 1000); // Convert to seconds
        var difference = currentTime - timestamp;
        var seconds = difference;
        var minutes = Math.round(difference / 60);
        var hours = Math.round(difference / 3600);
        var days = Math.round(difference / 86400);
        var weeks = Math.round(difference / 604800);
        var months = Math.round(difference / 2419200);
        var years = Math.round(difference / 29030400);

        if (seconds <= 60) {
            return 'baru saja';
        } else if (minutes <= 60) {
            return minutes + ' menit yang lalu';
        } else if (hours <= 24) {
            return hours + ' jam yang lalu';
        } else if (days <= 7) {
            return days + ' hari yang lalu';
        } else if (weeks <= 4) {
            return weeks + ' minggu yang lalu';
        } else if (months <= 12) {
            return months + ' bulan yang lalu';
        } else {
            return years + ' tahun yang lalu';
        }
    }

    // Function to generate the comment HTML
    function generateCommentHTML(entry) {
        var attendanceHTML = getAttendanceHTML(entry.attendance);
        var timeAgo = timeago(entry.time);

        var html = '<div class="comment-container">';
        html += '<div class="comment">';
        html += '<span class="name">' + entry.name + '</span>';
        html += attendanceHTML;
        html += '<div class="message">' + entry.message + '</div>';
        html += '<span class="time">' + timeAgo + '</span>';
        html += '</div>';
        html += '</div>';

        return html;
    }

    $(document).ready(function() {
        // Handle form submission with AJAX
        $('#save-form').submit(function(event) {
            event.preventDefault();

            // Get form data
            var name = $('#name').val();
            var message = $('#message').val();
            var attendance = $('#attendance').val();

            // Send form data using AJAX
            $.ajax({
                url: 'rspv.php',
                type: 'POST',
                data: {
                    name: name,
                    message: message,
                    attendance: attendance
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        // Clear form fields
                        $('#name').val('');
                        $('#message').val('');
                        $('#attendance').val('');

                        // Append new entry to the data container
                        var entry = response.entry;
                        var html = generateCommentHTML(entry);
                        $('#data-container').prepend(html);

                        // Show success message
                        var messageHtml = '<div class="alert alert-success" role="alert">' + response.message + '</div>';
                        $('#message-container').html(messageHtml);
                        
                    }
                },
                error: function() {
                    // Show error message
                    var messageHtml = '<div class="alert alert-danger" role="alert">Gagal mengirim ucapan, mohon coba lagi.</div>';
                    $('#message-container').html(messageHtml);
                }
            });
        });

        $(document).on('click', '#pagination-container .page-link', function(e) {
                e.preventDefault(); // Prevent default link behavior (page reload)

                // Get the target page number from the clicked link's href attribute
                var targetPageVal = $(this).attr('href').split('=')[1];
                var targetPage = $(this).attr('href');

                // Perform AJAX request to fetch new content
                $.ajax({
                    url: 'get-data.php'+targetPage, // Modify the URL to the actual PHP file handling pagination
                    type: 'GET',
                    // data: { page: targetPage }, // Pass the target page number as a query parameter
                    dataType: 'html',
                    success: function(response) {
                        // Update the current pagination container with the fetched pagination content
                        $('#data-container').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(error); // Handle error if necessary
                    }
                });

                // $.ajax({
                //     url: 'rspv.php'+targetPage, // Modify the URL to the actual PHP file handling pagination
                //     type: 'GET',
                //     success: function(e){
                //         console.log('rspv.php'+targetPage+e);
                //     }
                // });

                
            });
    });
    
  </script>
</body>
</html>
