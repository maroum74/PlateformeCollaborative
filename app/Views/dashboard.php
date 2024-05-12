<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Page d'Accueil</title>
  <script>
    function deleteUser(userId) {
    // Confirmation de la suppression
    if (confirm("Voulez-vous vraiment supprimer cet utilisateur ?")) {
        // Envoyer une requête AJAX pour supprimer l'utilisateur
        fetch("/UsersController/deleteUser", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                id: userId
            })
        })
        .then(response => {
            if (response.ok) {
                // Actualiser la page après la suppression de l'utilisateur
                location.reload();
            } else {
                // Afficher un message d'erreur en cas d'échec de la suppression
                alert("Une erreur s'est produite lors de la suppression de l'utilisateur. Veuillez réessayer.");
            }
        })
        .catch(error => {
            // Gérer les erreurs
            console.error("Erreur lors de la suppression de l'utilisateur:", error);
            alert("Une erreur s'est produite lors de la suppression de l'utilisateur. Veuillez réessayer.");
        });
    }
}

    function addUser() {
      // Récupérer les données du formulaire
      var formData = new FormData(document.getElementById("addUserForm"));

      // Effectuer une requête AJAX pour ajouter un nouvel utilisateur
      fetch("/UsersController/addUser", {
          method: "POST",
          body: formData
        })
        .then(response => response.json())
        .then(data => {
          // Manipuler la réponse (par exemple, afficher un message de réussite)
          console.log(data);
          alert("Utilisateur ajouté avec succès!");

          // Actualiser la page ou faire d'autres actions nécessaires
          location.reload(); // Actualise la page après l'ajout d'un utilisateur
        })
        .catch(error => {
          // Gérer les erreurs (par exemple, afficher un message d'erreur)
          console.error("Erreur lors de l'ajout de l'utilisateur:", error);
          alert("Une erreur s'est produite lors de l'ajout de l'utilisateur. Veuillez réessayer.");
        });
    }

    function updateUser(userId) {
      console.log("ID de l'utilisateur à mettre à jour : " + userId);
      // Récupérer les données du formulaire
      var formData = new FormData(document.getElementById("updateUserForm"));

      // Ajouter l'ID de l'utilisateur à mettre à jour
      formData.append('id', userId);

      // Envoyer une requête AJAX pour mettre à jour l'utilisateur
      fetch("/UsersController/updateUser", {
          method: "POST",
          body: formData
        })
        .then(response => response.json())
        .then(data => {
          // Manipuler la réponse (par exemple, afficher un message de réussite)
          console.log(data);
          alert("Utilisateur mis à jour avec succès!");

          // Actualiser la page ou faire d'autres actions nécessaires
          location.reload(); // Actualise la page après la mise à jour de l'utilisateur
        })
        .catch(error => {
          // Gérer les erreurs (par exemple, afficher un message d'erreur)
          console.error("Erreur lors de la mise à jour de l'utilisateur:", error);
          alert("Une erreur s'est produite lors de la mise à jour de l'utilisateur. Veuillez réessayer.");
        });
    }
  </script>

</head>
<br><br><br>

<body>
  <div class="container">
    <div class="container">
      <div class="row">
        <div class="col">
          <h2>Liste des employés</h2>
        </div>
        <div class="col text-end">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#Modal">
            Ajouter
          </button>
        </div>
        <!-- Modal Ajouter-->
        <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un utilisateur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form id="addUserForm">
                  <div class="mb-3">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="name" name="name">
                  </div>
                  <div class="mb-3">
                    <label for="last_name" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="last_name" name="last_name">
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password">
                  </div>
                  <div class="mb-3">
                    <label for="role_id" class="form-label">ID du rôle</label>
                    <select class="form-select" aria-label="Default select example" class="form-control" id="role_id" name="role_id">
                      <option selected>Choisir le rôle</option>
                      <option value="1">1 : Directeur</option>
                      <option value="2">2 : Chef de service</option>
                      <option value="3">3 : Médecin-chef</option>
                      <option value="4">4 : Médecin</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="profile_picture" class="form-label">Image de profil</label>
                    <input type="text" class="form-control" id="profile_picture" name="profile_picture">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-success" onclick="addUser()">Valider</button>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th></th>
            <th>Name</th>
            <th>Email</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php if ($users) : ?>
            <?php foreach ($users as $user) : ?>
              <tr>
                <input type="hidden" id="userId" name="id" value="<?php echo $user['id']; ?>">
                <td> <?php echo $user['profile_picture']; ?></td>
                <td> <?php echo $user['name']; ?></td>
                <td> <?php echo $user['email']; ?></td>
                <td>
                  <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#odal">
                    Modifier
                  </button>
                  <button type="button" class="btn btn-danger btn-sm" onclick="deleteUser(<?php echo $user['id']; ?>)">
                    Supprimer
                  </button>
                <td>
                
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Détails
                  </button>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Détails</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          </div>
        </div>
      </div>
    </div>
    </td>
    </tr>

    </tbody>
    </table>
</body>

</html>

<!-- Modal Modifier-->
<div class="modal fade" id="odal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier ou supprimer un utilisateur</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="updateUserForm" onsubmit="updateUser(event)">
          <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>
          <div class="mb-3">
            <label for="last_name" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="last_name" name="last_name">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          <div class="mb-3">
            <label for="role_id" class="form-label">ID du rôle</label>
            <select class="form-select" aria-label="Default select example" class="form-control" id="role_id" name="role_id">
              <option selected>Choisir le rôle</option>
              <option value="1">1 : Directeur</option>
              <option value="2">2 : Chef de service</option>
              <option value="3">3 : Médecin-chef</option>
              <option value="4">4 : Médecin</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="profile_picture" class="form-label">Image de profil</label>
            <input type="text" class="form-control" id="profile_picture" name="profile_picture">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-success" onclick="updateUser()">Valider</button>
      </div>
    </div>
  </div>
</div>
