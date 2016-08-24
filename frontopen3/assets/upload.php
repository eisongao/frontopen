<?php
   $destination_path = 'content/templates/frontopen3/img/';
   $result = 0;
   $target_path = $destination_path . basename( $_files['myfile']['name']);
   if(@move_uploaded_file($_files['myfile']['tmp_name'], $target_path)) {
      $result = 1;
   }
   echo $target_path;
   sleep(1);
?>
<script language="javascript" type="text/javascript">window.top.window.stopupload(<?php echo $result; ?>,'<?=$target_path?>');</script>