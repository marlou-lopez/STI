<?php
   require_once 'core/init.php';
   include 'templates/header.php';
   if(Input::exists()){
      if(Token::check(Input::get('token'))){
         $validate = new Validate();
         $validation = $validate->check($_POST, array(
            'username' => array(
               'required' => true,
               'min' => 2,
               'max' => 20,
               'unique' => 'users'
            ),
            'password' => array(
               'required' => true,
               'min' => 6,
            ),
            'password_again' => array(
               'required' => true,
               'matches' => 'password'
            ),
            'name' => array(
               'required' => true,
               'min' => '2',
               'max' => '50'
            )
         ));

         if($validation->passed()){
            $user = new User();
            $salt = Hash::salt(16);
            try{
               $user->create(array(
                  'username' => Input::get('username'),
                  'password' => Hash::make(Input::get('password'), $salt),
                  'salt' => $salt,
                  'name' => Input::get('name'),
                  'joined' => date('Y-m-d H:i:s'),
                  'group' => 1
               ));

               Session::flash('home','You have been registered and can now log in!');
               Redirect::to('index.php');
            }catch(Exception $e){
               die($e->getMessage());
            }
         }else{
            foreach($validation->errors() as $error){
               echo $error,'</br>';
            }
         }
      }
   }
   
?>

<div class="container">
   <div class="row">
      <div class="col-lg-4"></div>
      <div class="col-lg-4">
         <div class="jumbotron">
            <h1>Register</h1>
            <form action="" method="post">
               <div class="form-group">
                  <label for="username">Username:</label>
                  <input type="text" class="form-control" name="username" id="username" value="<?php echo escape(Input::get('username')); ?>"
                     autocomplete="off" minlength="2" maxlength="20" required>
               </div>
               <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" minlength="6" required>
               </div>
               <div class="form-group">
                  <label for="password_again">Confirm Password</label>
                  <input type="password" class="form-control" name="password_again" id="password_again" required>
               </div>
               <div class="form-group">
                  <label for="name">Name:</label>
                  <input type="text" class="form-control" name="name" id="name" value="<?php echo escape(Input::get('name')); ?>"
                     minlength="2" maxlength="50" required>
               </div>

               <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
               <input type="submit" class="form-control btn btn-primary" value="Register">
            </form>
         </div>
      </div>
      <div class="col-lg-4"></div>
   </div>
</div>

<?php 
   include 'templates/footer.php';
?>