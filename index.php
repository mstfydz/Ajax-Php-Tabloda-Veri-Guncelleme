<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Veri Güncelleme</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<style>
		a {
			text-decoration: none;
		}
	</style>
</head>
<body>
	<?php require 'setting.php';?>
	 <div class="container pt-5 pb-5"> 	   
      <table class="table"> 
       <thead>
       	<th>başlık</th>
       	<th>açıklama</th>
       	<th>İşlemler</th>
       </thead>
       <tbody>
       	  <?php 
     
        $query = $db->query('SELECT * FROM konular ORDER BY id DESC',PDO::FETCH_ASSOC);

          foreach($query as  $row){
      
            ?>
            <tr id="<?=$row['id']?>">
            	<td data-target="baslik"><?=$row['konu_baslik']?></td>
            	<td data-target="aciklama" ><?=$row['konu_aciklama']?></td>
            	<td><a data-role="update" data-id="<?=$row['id']?>" href="#">Düzenle</a></td>
            </tr>
            <?php

          }  
  
       	  ?>

       </tbody>
      </table>

	 </div>




<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Güncelle</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Başlık:</label>
            <input id="baslik" type="text" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Açıklama:</label>
            <textarea id="aciklama" class="form-control" id="message-text"></textarea>
          </div>
          <input type="hidden" id="konu_id" name="">
        </form>
      </div>
      <div class="modal-footer">
      	<a href="" id="save" class="btn btn-primary pull-right">Güncelle</a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
  
   <script>
   	  
   	  $(function(){

       // burda duzenle linkine tıkladığımızda click işlemi yapıyoruz
   
      $(document).on('click','a[data-role=update]',function(e){
       
       // konunun idsini çekiyoruz
       var id = $(this).data('id');  
       
       //hangi konuya aitse value değerlerini alıyoruz
    
       var baslik   = $('#'+id).children('td[data-target=baslik]').text();
       var aciklama = $('#'+id).children('td[data-target=aciklama]').text();
        
        // içindeki değerleri yeni değerler ile değişiyoruz..
       
       $('#baslik').val(baslik);
       $('#aciklama').val(aciklama);
       $('#konu_id').val(id);
       $('.modal').modal('toggle');
     
     // bu kod sayfa yenilemeyi engelliyor
     e.preventDefault();

      });
  
     $('#save').click(function(e){

       // burda kayıt ederken value değerlerini alıyoruz..	
      
      var id       =  $('#konu_id').val();    
      var baslik   =  $('#baslik').val();
      var aciklama =  $('#aciklama').val();
        
        // ajax ile değerleri gönderiyoruz..
   
       $.ajax({
   
         url    : 'ajax.php',
         method : 'post',
         data   : {baslik : baslik, aciklama : aciklama, id : 
         	id},
         success: function(e){

         	// işlemi başarılıysa list ekranında değerlerin değişmiş hali gözükmesi aşağıdaki kodları yazıyoruz idsi eşit olan değeri düzenleme işlemi yapıyoruz..

         	$('#'+id).children('td[data-target=baslik]').text(baslik);
         	$('#'+id).children('td[data-target=aciklama]').text(aciklama);
         	 $('.modal').modal('toggle');

         }

       });
    // burda da aynı şekilde sayfa yenilenmeyi engelledik
e.preventDefault();
      
     });


   	  });

   </script>
 

</body>
</html>


 