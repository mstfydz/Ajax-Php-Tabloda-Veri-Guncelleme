<?php 
  
  require 'setting.php';
  
   
if ( isset( $_POST[ 'baslik' ] ) ) {
	
   	  $id =  $_POST['id']; 
      $baslik  = $_POST['baslik'];
      $aciklama = $_POST['aciklama'];

      $query = $db->prepare('update konular set 
  
         konu_baslik = :baslik,
         konu_aciklama = :aciklama where id = :id

      	');

     $ok =  $query->execute([
          'baslik' => $baslik,
          'aciklama' => $aciklama,
          'id' => $id
      ]); 

      if($ok){
      	echo 'güncelleme başarılı';
      }else {
   
        echo 'güncelleme hatası';

      }    
}

?>