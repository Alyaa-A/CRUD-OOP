<?php

class dbcon{

    public $config;

    public function __construct(){
        $this->config = mysqli_connect('localhost','root','','task');
        if(mysqli_connect_error()){
            die("Connection Failed");
        }
    }

    function doQuery($sql){

        $result =   mysqli_query($this->config,$sql);
        return $result; 
    }
  ///==========
    // function select($table){
    //    $sql = "select * from `$table`";
    //    $q = mysqli_query($this->config,$sql);
    // }

}

// $db = new dbcon();
// echo $db->db_con();


// class validation{
//    public $title  ;
//   public  $content  ;
//   public $image;
  

//     public  function __construct($val1,$val2,$val3){

//       $this->title     = $val1;
//       $this->content    = $val2;
//      $this -> image =$val3;
//     }


   
//  public function addRow(){
//         // code .... 
      
// # Create Obj ... 
// $validate = new validator;
   
// # Clean Inputs .... 
// $title     = $validate->Clean($this->title);
// $content    = $validate->Clean( $this->content );



// # Array Errors ... 
// $errors = [];


// if(!$validate->validate($title,1)){
//    $errors['title'] = "Field Required";
// }elseif(!$validate->validate($title,3)){
//     $errors['title'] = "only characters";
// }


// if(!$validate->validate($content,1)){
//  $errors['content'] = "Field Required";
//  } elseif(!$validate->validate($content,2)){
//      $errors['content'] = "must be at least more than 50 char";
//  }



//   if(count($errors) > 0){

//      foreach($errors as $key => $error){
//          echo "* ".$key." : ".$error."<br>";
//      }

//   }else{    
//     $finalName = rand().time().'.'.$updated_ex;
//     $disPath = './uploads/'.$finalName;
//     if(move_uploaded_file($file_tmp,$disPath)){

//         $db = new dbcon();

//         $sql = "insert into blog (title,content,image) values ('$this->title','$this->content','$this->file_name')";

//         $result = $db->doQuery($sql);

//           if($result){
//               echo "Raw Inserted";
//           }else{
//               echo "Error Try Again";
//           }

//         }
//         echo " error in image";

//     }


//     }
  
      
  

// }

?>

