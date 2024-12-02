<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>List of Resources</title>
    <style>
        /* styles.css */

        header {
            background-color: #e26e0e;
            padding: 15px;
        }

        body {
            background-image: linear-gradient(to right, hsl(215, 92%, 15%, 0.8), hsl(215, 92%, 15%, 0.7)), url('background.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            color: #f2f2f2;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            color: white;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        h2 a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }

        h2 a:hover {
            text-decoration: underline;
        }

        table {
            border-collapse: collapse;
            width: 70%;
            margin: 20px auto;
            color: #f2f2f2;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: hsl(215, 92%, 15%);
            font-weight: bold;
        }

        tr:hover {
            background-color: #e26e0e;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #03224c;
        }

        a.button {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin: 10px 5px;
        }

        a.button:hover {
            background-color: #03224c;
        }
    </style>
</head>
<body>
    <?php
    include '../controller/RessourceController.php';

    // Instantiate the controller
    $ressourceController = new RessourceController();
    $tab = $ressourceController->listRessource(); // Fetch the list of resources
    ?>

    <center>
        <header>
            <h1>My Resources</h1>
        </header>
        <h2>
            <a href="AddRessource.php">Add Resource</a>
            <a href="ListCourse.php">Course List</a>
        </h2>
    </center>

    <table>
        <thead>
            <tr>
                <th>Resource ID</th>
                <th>Course ID</th>
                <th>Type</th>
                <th>URL</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($tab)): ?>
    <?php foreach ($tab as $ressource): ?>
        <tr>
            <td><?= $ressource['id']; ?></td>
            <td><?= $ressource['course_id']; ?></td>
            <td><?= $ressource['type']; ?></td>
            <td><?= $ressource['url']; ?></td>
            <td align="center">
                <form method="POST" action="UpdateRessource.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value="<?= $ressource['id']; ?>" name="id">
                </form>
            </td>
            <td>
                <a href="DeleteRessource.php?id=<?= $ressource['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="6" style="text-align: center;">No resources found.</td>
    </tr>
<?php endif; ?>

        </tbody>
    </table>
</body>
</html>
