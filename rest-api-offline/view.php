<?php
global $connects;
require_once('connect.php');

if (empty($_GET)) {
    $sql = 'SELECT * FROM members';
    $query = mysqli_query($connects, $sql);

    $result = array();
    while ($row = mysqli_fetch_array($query)) {
        $result[] = array(
            'id' => $row['id'],
            'title' => $row['title'],
            'image' => $row['image'],
            'summary' => $row['summary'],
            'release_at' => $row['release_at']
        );
    }

    echo json_encode(
        array('result' => $result)
    );
} else {
    $sql = "SELECT * FROM members WHERE id =" . $_GET['id'];
    $query = mysqli_query($connects, $sql);

    $result = array();
    while ($row = $query->fetch_assoc()) {
        $result = array(
            'id' => $row['id'],
            'title' => $row['title'],
            'image' => $row['image'],
            'summary' => $row['summary'],
            'release_at' => $row['release_at']
        );

        echo json_encode($result);
    }
}

mysqli_close($connects);
?>