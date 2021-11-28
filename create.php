<?php
/*
- title = req & string
- content = req & length >50
- image = req & file
**/
require 'class.php';
require 'valid.php';
// $obj1 =new validation();
// $obj1 ->addRow();
  

if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
  
  #create object
  $validate = new validator;
  
  #clean inputs
  $title   = $validate->Clean($_POST['title']);
  $content = $validate->Clean($_POST['content']);

  # Image File Data  .... 
  $file_tmp  =  $_FILES['image']['tmp_name'];
  $file_name =  $_FILES['image']['name'];  
  $file_size =  $_FILES['image']['size'];
  $file_type =  $_FILES['image']['type']; 

  $file_ex   = explode('.',$file_name);
  $updated_ex = strtolower(end($file_ex));
  
  #validate inputs

  $errors = [];


  if (!$validate->validate($title , 1)) {
    $errors['title'] = "Field Required";
  }elseif(!$validate->validate($title,3)){
    $errors['title'] = "Invalid ";
  }  
  


  if (!$validate->validate($content , 1)) {
    $errors['content'] = "Field Required";
  }elseif(!$validate->validate($content,2)){
    $errors['content'] = "must be at least more than 50 char";
  }  

  if(!$validate->validate($file_name,1)){
    $errors['Image'] = "Field Required";
  }elseif(!$validate->validate($updated_ex,4)){
    $errors['Image'] = "Invalid image type";
  }
  
  if(count($errors) > 0){
    foreach ($errors as $key => $error) {
      echo "* " . $key . " : " . $error . "<br>";
    } 
  }else{

    # Upload Image ..... 
    $finalName = rand().time().'.'.$updated_ex;

    $disPath = './uploads/'.$finalName;

    #db
    $db     = new dbcon;
    $sql    = "INSERT into blog ( title , content , image) VALUES ('$title' , '$content' , '$finalName')"; 
    $result = $db->doQuery($sql);

    if($result){
      echo 'Raw Inserted';
    }else{
      echo'Error Try Again';
    }

  }

}





?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title> crud-blog</title>
  </head>
  <body>


<div class="container">

                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post"  enctype="multipart/form-data">



                    <div class="form-group">
                        <label for="exampleInputName">title</label>
                        <input type="text" class="form-control" name="title" id="exampleInputName" aria-describedby=""
                            placeholder="Enter Name">
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail"> content</label>
                        <input type="text" class="form-control" name="content" id=""
                            aria-describedby="" placeholder=" content">
                    </div>


                    <div class="form-group">
                        <label for="exampleInputName">Image</label> <br>
                        <input type="file" name="image">
                    </div>

                    <button type="submit" class="btn btn-primary" namr="submit">Save</button>
                </form>
            </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -
  </body>
</html>
