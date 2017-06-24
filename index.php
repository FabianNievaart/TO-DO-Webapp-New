<?php
require_once 'core/init.php';

$item = DB::getInstance()->query("SELECT * FROM todo");

echo "<a href='insert.php'>Add new to do</a><br>
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
    echo 'Table is empty';
} else {
    foreach ($item->results() as $item) {
        echo "<tr>
        <td style='width:150px;border:1px solid black;'>" . $item->id . "</td>
        <td style='width:150px;border:1px solid black;'>" . $item->todo . "</td>
        <td style='width:150px;border:1px solid black;'>
            <form action='delete.php' method='post'>
                <input type='hidden' name='id' value='".$item->id."'>
                <input type='submit' value='delete'>
            </form>
            <form action='update.php' method='post'>
                <input type='hidden' name='id' value='".$item->id."'>
                <input type='hidden' name='todo' value='".$item->todo."'>
                <input type='submit' value='update'>
            </form>
        </td>
      </tr>";
    }
}
echo "</tbody>
      </table>";

if(session::exists('success')){
    echo session::flash('success');
}

?>