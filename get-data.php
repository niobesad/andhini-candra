<?php

// Function to generate the HTML for attendance status
function getAttendanceHTML($attendance)
{
    if ($attendance === "Hadir") {
        return '<div class="attendance"><i class="fa fa-check check-icon"></i><span>Hadir</span></div>';
    } else if ($attendance === "Tidak Hadir") {
        return '<div class="attendance"><i class="fa fa-times cross-icon"></i><span>Tidak Hadir</span></div>';
    }
}

// Function to calculate the time ago
function timeago($timestamp)
{
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
function generateCommentHTML($entry)
{
    $attendanceHTML = getAttendanceHTML($entry["attendance"]);
    $timeAgo = timeago($entry["time"]);

    $html = '<div class="comment-container">';
    $html .= '<div class="comment">';
    $html .= '<span class="name">' . $entry["name"] . '</span>';
    $html .= $attendanceHTML;
    $html .= '<div class="message">' . $entry["message"] . '</div>';
    $html .= '<span class="time">' . $timeAgo . '</span>';
    $html .= '</div>';
    $html .= '</div>';

    return $html;
}

function getUpdatedData()
{
    if (file_exists('data.json')) {
        $jsonData = file_get_contents('data.json');
        $data = json_decode($jsonData, true);

        // Sort the data array based on the 'time' field in descending order
        usort($data, function ($a, $b) {
            return strtotime($b['time']) - strtotime($a['time']);
        });

        return $data;
    }

    return array();
}

// Function to paginate the data
function paginateData($data, $page = 1, $limit = 5)
{
    $totalItems = count($data);
    $totalPages = ceil($totalItems / $limit);
    $currentPage = max($page, 1);
    $currentPage = min($currentPage, $totalPages);

    $startIndex = ($currentPage - 1) * $limit;
    $slicedData = array_slice($data, $startIndex, $limit);

    return array(
        'data' => $slicedData,
        'totalPages' => $totalPages,
        'currentPage' => $currentPage
    );
}

// Initial data retrieval
$data = getUpdatedData();

// Get the current page number from the query parameter
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
// echo "<script>console.log(" . $page . ");</script>";

// Paginate the data
$pagination = paginateData($data, $page, 5);
$commentHTML = '';
foreach ($pagination['data'] as $id => $entry) {
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
    <div id="data-container">
        <?= $commentHTML ?>
    </div>
</body>
</html>