<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liste des Tâches</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
function ajouterTache() {
    var title = document.getElementById('title').value;
    var description = document.getElementById('description').value;
    var role_id = document.getElementById('role_id').value;
    var deadline = document.getElementById('deadline').value;
    var created_by = 2;
    // Effectuer une requête AJAX pour ajouter une nouvelle tâche
    $.ajax({
        url: '/ajouter-tache', // Endpoint pour ajouter une nouvelle tâche
        type: 'POST',
        data: {
            title: title,
            description: description,
            role_id: role_id,
            deadline: deadline
        },
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
}
</script>

</head>

<body>

  <br><br>
  <div class="container">
    <div class="container">
      <div class="row">

        <!-- Modal Ajouter-->
        <h2>Tâches de l'utilisateur id = <?php echo $userId; ?></h2>
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
                <tr>
                  <td><?php echo $assignedTask['name']; ?></td>
                  <td><?php echo $assignedTask['role_name']; ?></td>
                  <td><?php echo $assignedTask['title']; ?></td>
                  <td><?php echo $assignedTask['deadline']; ?></td>
                  <td>
                    <button type="button" class="btn btn-success btn-sm" onclick="validerTache()">Valider la Tâche</button>
                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Détails</button>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
      </div>
      </ul>

      <h2>Tâches attribuées à d'autres utilisateurs par id = <?php echo $userId; ?></h2>
      <div class="col text-end">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#Modal">
          Ajouter
        </button>
      </div>
      <ul>
        <?php foreach ($assignedTasks as $assignedTask) : ?>
          <li><?php echo $assignedTask['title']; ?> - Deadline: <?php echo $assignedTask['deadline']; ?> - Créé par: <?php echo $assignedTask['name']; ?></li>
        <?php endforeach; ?>
      </ul>
      <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ajouter une tâche</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="addUserForm">
                <div class="mb-3">
                  <label for="name" class="form-label">Titre de la tâche</label>
                  <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="mb-3">
                  <label for="last_name" class="form-label">Détails</label>
                  <input type="text" class="form-control" id="description" name="description">
                </div>
                <div class="mb-3">
                  <label for="deadline" class="form-label">Deadline</label>
                  <input type="date" class="form-control" id="deadline" name="deadline">
                </div>
                <div class="mb-3">
                <div class="mb-3">
                  <label for="role_id" class="form-label">À qui attribuez-vous cette tâche ?</label>
                  <select class="form-select" aria-label="Default select example" class="form-control" id="role_id" name="role_id">
                    <option selected>Choisir la personne</option>
                    <?php foreach ($users as $user) : ?>
        <option value="<?php echo $user['id']; ?>"><?php echo $user['name'] . ' ' . $user['last_name'] . ' - ' . $user['role_id']; ?></option>
    <?php endforeach; ?>
                  </select>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
              <button type="button" class="btn btn-success" onclick="ajouterTache()">Valider</button>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <!-- Modal -->
        <?php foreach ($assignedTasks as $assignedTask) : ?>
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

        </tbody>
        </table>
</body>

</html>