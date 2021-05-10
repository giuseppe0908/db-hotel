<?php
  include_once _DIR_.'/../db.php';
  header('Content-Type: application/json');

  if (!empty($_GET)&& $_GET['id']) {
    $id =$_GET['id'];
    $result = [];

    $stmt = $conn->prepare("SELECT * FROM stanze WHERE id = ?"); //query
    $stmt->bind_param("i", $id);

    $stmt->execute();
    $rows = $stmt->get_result();
    while ($row = $rows->fetch_assoc()) { // trasforma in array associativo
      $result[] = $row;
    }
    echo json_encode($result);
  }else {
    $query = "SELECT * FROM stanze";
    $rows = $conn->query($query);

    $result = [];

    if ($rows && $rows->num_rows > 0) {
      while ($row = $rows->fetch_assoc()) {
        $result[] = $row;
      }
    }
    echo json_encode($result);
  }
  $conn->close();
 ?>
