<?php
session_start();
if (isset($_SESSION['type'])) {
  if($_SESSION['type'] == '1' || $_SESSION['type'] == '3'  || $_SESSION['type'] == '5' ){
  
  }
  else{
    header("Location: ../welcome");
  
  }
} else {
  header("Location: ../login");
}

define('TITLE', "وصل اقساط");

include  'get_pay_student.php';
include '../assets/layouts/header.php';
check_verified();

?>


<main role="main">
<?php 





?>

    <section class="jumbotron text-center py-5">
        <div class="container">
            <h1 class="jumbotron-heading mb-4"> </h1>
            <p class="text-muted">
            </div>
            <form>
<?php
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {

        ?>
<h3>
    <div class="form-row">
    <div class="form-group col-md-6" text-align: center >
    <p class="text-right">  
    <label for="name">الاسم الرباعي الكامل : </label>
       <?php echo ($row['name'] );?> </p>
      
    </div>
    <div class="form-group col-md-4">
  
       
      
    </div>
    <div class="form-group col-md-2">
  
       
      
    </div>
    <input type="hidden" id="id" value= <?php echo $row['id_s'] ?>
       name="id">

    
  </div>

  <div class="form-row">
  <div class="form-group col-md-5">
  <p class="text-right">
      <label for="college">اسم القسم : </label>
     <?php echo $row['college'] ?></p>
      
      </div>
      <div class="form-group col-md-4">
    
         
        
      </div>
      <div class="form-group col-md-2">
    
         
        
      </div>
  </div>

  
      <div class="form-group col-md-4">
    
         
        
      </div>
      <div class="form-group col-md-2">
    
         
        
      </div>
  </div>

  <div class="form-row">
  <div class="form-group col-md-5">
  <p class="text-right">
  <label for="dis"> التاريخ : </label>
      <?php echo substr($row['c_date'],0,10)  ?></p>
      
      </div>
      <div class="form-group col-md-4">
    
         
        
      </div>
      <div class="form-group col-md-2">
    
         
        
      </div>
  </div>

  <div class="form-row">
  <div class="form-group col-md-4">
  <p class="text-right">
  <label for="pay"> المبلغ : </label>
  <?php 
        echo number_format( $row['pay'] ) ;?>
      
    </div>
    <div class="form-group col-md-4">
  <label for="tab">   </label>
       
      
    </div>
    <div class="form-group col-md-4">
  <label for="sin"> التوقيع : </label>
       
      
    </div>
  </div>


 
<hr>

<div class="form-row">
    <div class="form-group col-md-6" text-align: center >
    <p class="text-right">  
    <label for="name">الاسم الرباعي الكامل : </label>
       <?php echo ($row['name'] );?> </p>
      
    </div>
    <div class="form-group col-md-4">
  
       
      
    </div>
    <div class="form-group col-md-2">
  
       
      
    </div>
    <input type="hidden" id="id" value= <?php echo $row['id_s'] ?>
       name="id">

    
  </div>

  <div class="form-row">
  <div class="form-group col-md-5">
  <p class="text-right">
      <label for="college">اسم القسم : </label>
     <?php echo $row['college'] ?></p>
      
      </div>
      <div class="form-group col-md-4">
    
         
        
      </div>
      <div class="form-group col-md-2">
    
         
        
      </div>
  </div>

  <div class="form-row">
  <div class="form-group col-md-5">
  <p class="text-right">
  <label for="money">التسلسل :  </label>
     <?php echo $row['id_s'] ?></p>
      
      </div>
      <div class="form-group col-md-4">
    
         
        
      </div>
      <div class="form-group col-md-2">
    
         
        
      </div>
  </div>

  <div class="form-row">
  <div class="form-group col-md-5">
  <p class="text-right">
  <label for="dis"> التاريخ : </label>
      <?php echo substr($row['c_date'],0,10)  ?></p>
      
      </div>
      <div class="form-group col-md-4">
    
         
        
      </div>
      <div class="form-group col-md-2">
    
         
        
      </div>
  </div>

  <div class="form-row">
  <div class="form-group col-md-4">
  <p class="text-right">
  <label for="pay"> المبلغ : </label>

  
       <?php 
        echo number_format( $row['pay'] ) ;?>
      
    </div>
    <div class="form-group col-md-4">
  <label for="tab">   </label>
       
      
    </div>
    <div class="form-group col-md-4">
  <label for="sin"> التوقيع : </label>
       
      
    </div>
  </div>


    </h3>
    <?php
}
} else {
    echo "0 results";
}
?>



 
  






</form>
</main>






    <?php

include '../assets/layouts/footer.php'

?>
