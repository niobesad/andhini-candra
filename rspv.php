<?php
// Function to generate the HTML for attendance status
function getAttendanceHTML($attendance) {
    if ($attendance === "Hadir") {
        return '<div class="attendance"><i class="fa fa-check check-icon"></i><span>Hadir</span></div>';
    } else if ($attendance === "Tidak Hadir") {
        return '<div class="attendance"><i class="fa fa-times cross-icon"></i><span>Tidak Hadir</span></div>';
    }
}

// Function to calculate the time ago
function timeago($timestamp) {
    date_default_timezone_set('Asia/Jakarta'); // Set the timezone as needed

    $current_time = time();
    $timestamp = strtotime($timestamp);

    $difference = $current_time - $timestamp;
    $seconds = $difference;
    $minutes = round($difference / 60);
    $hours = round($difference / 3600);
    $days = round($difference / 86400);
    $weeks = round($difference / 604800);
    $months = round($difference / 2419200);
    $years = round($difference / 29030400);

    if ($seconds <= 60) {
        return 'baru saja';
    } elseif ($minutes <= 60) {
        return $minutes . ' menit yang lalu';
    } elseif ($hours <= 24) {
        return $hours . ' jam yang lalu';
    } elseif ($days <= 7) {
        return $days . ' hari yang lalu';
    } elseif ($weeks <= 4) {
        return $weeks . ' minggu yang lalu';
    } elseif ($months <= 12) {
        return $months . ' bulan yang lalu';
    } else {
        return $years . ' tahun yang lalu';
    }
}

// Function to generate the comment HTML
function generateCommentHTML($entry) {
    $attendanceHTML = getAttendanceHTML($entry["attendance"]);
    $timeAgo = timeago($entry["time"]);

    $html = '<div class="comment-container">';
    $html .= '<div class="comment">';
    $html .= '<span class="name">' . ucwords($entry["name"]) . '</span>';
    $html .= $attendanceHTML;
    $html .= '<div class="message">' . $entry["message"] . '</div>';
    $html .= '<span class="time">' . $timeAgo . '</span>';
    $html .= '</div>';
    $html .= '</div>';

    return $html;
}

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

    // Prepare the response data
    $response = array(
        'status' => 'success',
        'message' => 'Ucapan berhasil dikirim!',
        'entry' => array(
            'name' => $name,
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

// Function to get the updated data from data.json
function getUpdatedData() {
    if (file_exists('data.json')) {
        $jsonData = file_get_contents('data.json');
        $data = json_decode($jsonData, true);

        // Sort the data array based on the 'time' field in descending order
        usort($data, function($a, $b) {
            return strtotime($b['time']) - strtotime($a['time']);
        });

        return $data;
    }

    return array();
}

// Initial data retrieval
$data = getUpdatedData();

// HTML generation for the comments
$commentHTML = '';
foreach ($data as $id => $entry) {
    $commentHTML .= generateCommentHTML($entry);
}
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
      <button type="submit" class="btn-odd">Kirim</button>
    </form>
    <!-- <div class="column is-12 prolog">
        <h5 class="has-text-centered title-odd">Ucapan</h5>
    </div> -->
    <div id="data-container">
        <?= $commentHTML ?>
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

    // Function to update the comments
    function updateComments() {
        $.ajax({
          url: 'data.json',
          type: 'GET',
          dataType: 'json',
          success: function(response) {
              var data = response; // Modify variable name to match response
              var commentHTML = '';
              for (var i = 0; i < dataArray.length; i++) {
                  var entry = dataArray[i].entry;
                  // entry.timestamp = Math.floor(Date.parse(entry.time) / 1000); // Update the timestamp value
                  commentHTML += generateCommentHTML(entry);
              }
              $('#data-container').html(commentHTML);
          },
          error: function() {
              console.log('Failed to retrieve updated data.');
          }
        });
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

        // Polling for updates every 5 seconds
        setInterval(updateComments, 5000);
    });
  </script>
</body>
</html>
