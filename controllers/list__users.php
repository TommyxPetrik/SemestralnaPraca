<?php
require_once 'config.php';
$users[] = '';

echo '<table class="table">
  <thead>
    <tr>
      <th scope="col"><strong>ID:</strong></th>
      <th scope="col"><strong> Name: </strong></th>
      <th scope="col"><strong> Email: </strong></th>
      <th scope="col"><strong> Country: </strong></th>
      <th scope="col"><strong> Trial: </strong></th>
      <th scope="col"><strong> Plan: </strong></th>
      <th scope="col"><strong> Edit: </strong></th>
    </tr>
  </thead>  <tbody>';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $usernamedb, $passworddb);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM customers");
    $stmt->execute();


    $stmt->setFetchMode(PDO::FETCH_OBJ);


    while ($row = $stmt->fetch()) {
        echo '    <tr>
      <td>'. $row->user_index . '</td>
      <td>'. $row->name .'</td>
      <td>'. $row->email .'</td>
      <td>'. $row->country .'</td>
      <td>'. $row->trial .'</td>
      <td>'. $row->plan .'</td>
      <td><button class="btn btn-primary">Edit</button></td>
    </tr>';



    }

    echo "</table>";

} catch (PDOException $e) {
    echo "Chyba" . $e->getMessage();
}



//    <tr>
//      <th scope="row">1</th>
//      <td>Mark</td>
//      <td>Otto</td>
//      <td>@mdo</td>
//    </tr>
//    <tr>
//      <th scope="row">2</th>
//      <td>Jacob</td>
//      <td>Thornton</td>
//      <td>@fat</td>
//    </tr>
//    <tr>
//      <th scope="row">3</th>
//      <td colspan="2">Larry the Bird</td>
//      <td>@twitter</td>
//    </tr>
//  </tbody>
//</table>