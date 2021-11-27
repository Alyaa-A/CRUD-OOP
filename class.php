<?php
require './valid.php';
class dbcon{

    public $config;

    public function __construct(){
        $this->config = mysqli_connect('localhost','root','','task');
        if(mysqli_connect_error()){
            die("Connection Failed");
        }
    }

    function doQuery($sql){

        $result =   mysqli_query($this->con,$sql);
        return $result; 
    }

}

// $db = new dbcon();
// echo $db->db_con();


class validation{
   public $title     = $_POST['title'];
  public  $content   = $_POST['content'];

  
  
    # Image File Data  .... 
  public  $file_tmp  =  $_FILES['image']['tmp_name'];
  public  $file_name =  $_FILES['image']['name'];  
  public  $file_size =  $_FILES['image']['size'];
 public   $file_type =  $_FILES['image']['type'];   
  
  public  $file_ex   = explode('.',$file_name);
  public  $updated_ex = strtolower(end($file_ex));

    public  function __construct($val1,$val2,$val3,$val4){

      $this->title     = $val1;
      $this->content    = $val2;
      $this->file_name = $val3;
      $this->updated_ex = $val4;
    }


   
 public function addRow(){
        // code .... 
      
# Create Obj ... 
$validate = new validator;
   
# Clean Inputs .... 
$title     = $validate->Clean($this->title);
$content    = $validate->Clean( $this->content );
$file_name = $validate;
$updated_ex =$validate;


# Array Errors ... 
$errors = [];


if(!$validate->validate($title,1)){
   $errors['title'] = "Field Required";
}elseif(!$validate->validate($title,3)){
    $errors['title'] = "only characters";
}


if(!$validate->validate($content,1)){
 $errors['content'] = "Field Required";
 } elseif(!$validate->validate($content,2)){
     $errors['content'] = "must be at least more than 50 char";
 }

 
 if(!$validate->validate($file_name,1)){
     $errors['image'] = "Field Required";
  }elseif(!$validate->validate($updated_ex,4)){
    $errors['Image'] = "Invalid Extension";
}

  if(count($errors) > 0){

     foreach($errors as $key => $error){
         echo "* ".$key." : ".$error."<br>";
     }

  }else{    
    $finalName = rand().time().'.'.$updated_ex;
    $disPath = './uploads/'.$finalName;
    if(move_uploaded_file($file_tmp,$disPath)){

        $db = new dbcon();

        $sql = "insert into blog (title,content,image) values ('$this->title','$this->content','$this->file_name')";

        $result = $db->doQuery($sql);

          if($result){
              echo "Raw Inserted";
          }else{
              echo "Error Try Again";
          }

        }
        echo " error in image";

    }


    }
  
      
  
  

}

?>

