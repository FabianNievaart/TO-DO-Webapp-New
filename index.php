<?php
require_once 'core/init.php';

$item = db::getInstance()->query("SELECT * FROM todo");

echo "<a href='add.php'>Add new to do</a><br>
      <table style='border: solid 1px black;'>
        <thead>
            <tr>
                <th>Id</th>
                <th>To do</th>
                <th>Action</th>
            </tr> 
        </thead>
        <tbody>";

if(!$item->count()){
    echo 'error';
} else {
    foreach ($item->results() as $item) {
        echo "<tr>
        <td style='width:150px;border:1px solid black;'>" . $item->id . "</td>
        <td style='width:150px;border:1px solid black;'>" . $item->todo . "</td>
        <td style='width:150px;border:1px solid black;'><a href='delete.php?id=" . $item->id . "'>Delete</a></td>
      </tr>";
    }
}
echo "</tbody>
      </table>"
?>

</body>
</html>