<?php
require_once 'core/init.php';

$record = new Record();

if(Input::exists()) {
    if (Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'todo' => array(
                'required' => true,
                'min' => 2,
                'max' => 50,
                'unique' => 'todo'
            )
        ));

        if ($validation->passed()) {

            try {
                $record->update(array(
                    'todo' => Input::get('todo')),
                    $_POST['id']);

                Session::flash('success', 'Record updated successfully');
                Redirect::to('index.php');

            } catch (Exception $e) {
                die($e->getMessage());
            }

        } else {
            foreach ($validation->errors() as $error) {
                echo $error, '<br>';
            }
        }
    }
}

?>

<form action="" method="post">
    <div class="field">
        <label for="todo">To do:</label>
        <input type="text" name="todo" value="<?php echo $_POST['todo']; ?>">
        <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
    </div>

    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
    <input type="submit" value="update">
</form>

<a href="index.php"><button>Back to table</button></a>