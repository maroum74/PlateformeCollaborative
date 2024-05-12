<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liste des Tâches</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
function validerTache(taskId) {
    // Afficher une boîte de dialogue de confirmation
    if (confirm("Êtes-vous sûr de vouloir valider cette tâche ?")) {
        $.ajax({
            url: '/update-task-status', // Endpoint pour mettre à jour le statut de la tâche
            type: 'POST',
            data: { task_id: taskId, new_status: 1 }, // Envoyer l'identifiant de la tâche et le nouveau statut
            success: function(response) {
                // Gérer la réponse du serveur
                console.log(response);
                // Actualiser la page ou effectuer d'autres actions si nécessaire
                location.reload();
            },
            error: function(xhr, status, error) {
                // Gérer les erreurs de la requête AJAX
                console.error(xhr.responseText);
            }
        });
    } else {
        // L'utilisateur a annulé l'action
        console.log("Validation de la tâche annulée.");
    }
}
</script>


</head>

<body>

<br><br>
  <div class="container">
    <div class="container">
      <div class="row">
      
        <!-- Modal Ajouter--><h2>Tâches de l'utilisateur id = <?php echo $userId; ?></h2>
        <ul>
          <br>
          <table id="user_table" class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>Nom</th>
        <th>Rôle</th>
        <th>Nom de la Tâche</th>
        <th>Deadline</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($assignedTasks as $assignedTask) : ?>
        <?php if ($assignedTask['status'] == 2) : ?>
        <tr>
          <td><?php echo $assignedTask['name']; ?></td>
          <td><?php echo $assignedTask['role_name']; ?></td>
          <td><?php echo $assignedTask['title']; ?></td>
          <td><?php echo $assignedTask['deadline']; ?></td>
          <td>
            <button type="button" class="btn btn-success btn-sm" onclick="validerTache(<?php echo $assignedTask['id']; ?>)">Valider la Tâche</button>
            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Détails</button>
          </td>
        </tr>
        <?php endif; ?>
      <?php endforeach; ?>
    </tbody>
  </table>
    </tbody>
    </table>
    <div class="container">
    <!-- Modal --><?php foreach ($assignedTasks as $assignedTask) : ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Détails</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          
          <?php echo $assignedTask['description']; ?>
          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          </div>
        </div>
      </div>
    </div><?php endforeach; ?>
    </td>
    </tr>
</body>

</html>