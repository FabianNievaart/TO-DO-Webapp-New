<?php
require_once 'core/init.php';
if(Input::exists()) {
    if (Token::check(Input::get('token'))) {

        $validate = new validate();
        $validation = $validate->check($_POST, array(
            'todo' => array(
                'required' => true,
                'min' => 2,
                'max' => 50,
                'unique' => 'todo'
            )
        ));

        if ($validation->passed()) {
            $record = new record();
            try{
                $record->create(array(
                   'todo' => Input::get('todo')
                ));

            }catch (Exception $e){
                die($e->getMessage());
            }

            Session::flash('success', 'New record created successfully');
            Redirect::to('index.php');
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
        <input type="text" name="todo" id="todo" value="<?php echo escape(Input::get('todo')); ?>" autocomplete="off">
    </div>

    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
    <input type="submit" value="Submit">
</form>

<a href="index.php"><button>Back to table</button></a>
