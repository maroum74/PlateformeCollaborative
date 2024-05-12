<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liste des Utilisateurs</title>
    <!-- Autres balises meta et liens -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.js"></script>
</head>

<body>
  <div class="container">
    <!-- Button trigger modal -->
    <div class="card-body">
      <div class="table-responsive">
        <table id="sample_table" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Gender</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>

</body>

</html>

<script>

//$(document).ready(function(){
//  $('#sample_table').DataTable({
//    "order":[],
//    "serverSide":true,
//    "ajax":{
//      url:"<?php //echo base_url('AjaxCrud/fetch_all'); ?>",
//      type:'POST'
//    }
//  });
//});
$(document).ready(function(){
    $('#sample_table').DataTable();
} );
//let table = new DataTable('#sample_table', {
//    "order": [],
//    "serverSide": true,
//    "ajax": {
//        "url": "<?php // echo base_url('AjaxCrud/fetch_all'); ?>",
//        "type": 'POST'
//    }
//});


</script>