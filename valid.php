<?php 


 class validator{


    public function  Clean($input){
      
        $value = trim($input);
        $value = htmlspecialchars($value);
        $value = stripcslashes($value);
        return $value;  
      
    } 
   
  
  
   public  function validate($input,$flag,$length = 50){
     
      $status = true;
  
       switch ($flag) {
           case 1:
               if(empty($input)){
                  $status = false;
               }
               break;

        
          case 2: 
              if(strlen($input) < $length){
                  $status = false;
              }        
              break;
     
          case 3: 
              if(!filter_var($input,FILTER_VALIDATE_INT)){
                  $status = false;
              }
              break;
          
         
         case 4 : 
          $allowed_ex = ["png","jpg"];
          if(!in_array($input, $allowed_ex)){
             $status = false;
          }
           break;
  
       }
  
       return $status;
    }
    
   
    
 
  

 }


?>