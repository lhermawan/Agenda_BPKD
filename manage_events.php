<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agenda_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eventName = $_POST["eventName"];
    $eventKategori = $_POST["eventKategori"];
    $eventLokasi = $_POST["eventLokasi"];
    $eventPerson = $_POST["eventPerson"];
    $eventDatetime = $_POST["eventDatetime"];

    $sql = "INSERT INTO events (event_name,event_person,event_lokasi, kategori, event_datetime) VALUES ('$eventName','$eventPerson','$eventLokasi','$eventKategori', '$eventDatetime')";

    if ($conn->query($sql) === TRUE) {
        echo "Acara berhasil ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $sql = "SELECT * FROM events ORDER BY event_datetime ASC";
    $result = $conn->query($sql);

    $events = array();
    while($row = $result->fetch_assoc()) {
        $events[] = $row;
    }

    echo json_encode($events);
}

$conn->close();
?>
