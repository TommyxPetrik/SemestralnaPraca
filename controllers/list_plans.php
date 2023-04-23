<?php
require_once 'config.php';
$users[] = '';


echo '<table class="table">
  <thead>
    <tr>
      <th scope="col"><strong>ID:</strong></th>
      <th scope="col"><strong> Name: </strong></th>
      <th scope="col"><strong> Price: </strong></th>
      <th scope="col"><strong> Space: </strong></th>
      <th scope="col"><strong> Bandwidth: </strong></th>
      <th scope="col"><strong> Websites: </strong></th>
      <th scope="col"><strong> Customization: </strong></th>
      <th scope="col"><strong> Integration: </strong></th>
      <th scope="col"><strong> Support: </strong></th>
      <th scope="col"><strong>  </strong></th>
    </tr>
  </thead>  <tbody>';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $usernamedb, $passworddb);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM plans");
    $stmt->execute();


    $stmt->setFetchMode(PDO::FETCH_OBJ);


    while ($row = $stmt->fetch()) {
        echo '    <tr>
      <td>'. $row->plan_index . '</td>
      <td>'. $row->name .'</td>
      <td>'. $row->price .'</td>
      <td>'. $row->space .'</td>
      <td>'. $row->bandwidth .'</td>
      <td>'. $row->websites .'</td>
      <td>'. $row->customization .'</td>
      <td>'. $row->integration .'</td>
      <td>'. $row->support .'</td>
      ';
        echo '<td><button class="btn btn-primary " ><a style="color: black" href="../controllers/find_plan.php?plan_index='. $row->plan_index .'">Edit</a></button></td>
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