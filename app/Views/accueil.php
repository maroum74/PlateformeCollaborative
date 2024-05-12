<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Page d'Accueil</title>
</head>
<br><br><br>

<body>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Tâches</title>
</head>
<body>
    <h1>Mes Tâches</h1>

    <h2>Tâches attribuées :</h2>
    <ul>
        <?php foreach ($tasks as $task) : ?>
            <li><?= $task['task'] ?> - <?= $task['deadline'] ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Tâches attribuées à d'autres utilisateurs :</h2>
    <ul>
        <?php foreach ($assignedTasks as $assignedTask) : ?>
            <li><?= $assignedTask['task'] ?> - <?= $assignedTask['deadline'] ?> (Créé par <?= $assignedTask['name'] ?>)</li>
        <?php endforeach; ?>
    </ul>
</body>
</html>

</body>

</html>