<?php
include '../controller/RessourceController.php';

$error = "";
$ressource = null;

// Create an instance of the controller
$ressourceController = new RessourceController();

// Handle form submission
if (
    isset($_POST["id"], $_POST["name"], $_POST["type"], $_POST["description"], $_POST["url"], $_POST["related_course_id"])
) {
    if (
        !empty($_POST["id"]) &&
        !empty($_POST["name"]) &&
        !empty($_POST["type"]) &&
        !empty($_POST["description"]) &&
        !empty($_POST["url"]) &&
        !empty($_POST["related_course_id"])
    ) {
        // Create a Resource object
        $ressource = new Ressource(
            $_POST['id'],
            $_POST['name'],
            $_POST['type'],
            $_POST['description'],
            $_POST['url'],
            intval($_POST['related_course_id'])
        );

        // Update the resource
        $ressourceController->updateRessource($ressource, $_POST['id']);

        // Redirect to the resource list page
        header('Location: ListRessource.php');
        exit;
    } else {
        $error = "Missing information.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Resource</title>
    <style>
        header {
            background-color: #e26e0e;
            padding: 15px;
            text-align: center;
        }

        body {
            background-image: linear-gradient(to right, hsl(215, 92%, 15%, 0.8), hsl(215, 92%, 15%, 0.7)), url('background.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            color: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 400px;
            background-color: rgba(255, 255, 255, 0.1);
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #f2f2f2;
        }

        input[type="text"],
        input[type="url"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100px;
            height: 35px;
            background-color: #03224c;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #fb470d;
        }

        #error {
            color: red;
            margin-bottom: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <header>
        <h1><a href="ListRessource.php" style="text-decoration: none; color: white;">Back to Resource List</a></h1>
    </header>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <div class="container">
        <form action="" method="POST" id="updateResourceForm">
            <label for="id">Resource ID:</label>
            <input type="text" id="id" name="id" value="<?php echo htmlspecialchars($ressource['id'] ?? ''); ?>" >

            

            <label for="type">Type:</label>
            <select id="type" name="type">
                
                <option value="video" <?php echo (isset($ressource['type']) && $ressource['type'] === 'video') ? 'selected' : ''; ?>>Video</option>
                <option value="link" <?php echo (isset($ressource['type']) && $ressource['type'] === 'text') ? 'selected' : ''; ?>>Link</option>
                <option value="pdf" <?php echo (isset($ressource['type']) && $ressource['type'] === 'pdf') ? 'selected' : ''; ?>>pdf</option>
                <option value="jpg" <?php echo (isset($ressource['type']) && $ressource['type'] === 'jpg') ? 'selected' : ''; ?>>Image (JPG)</option>
            </select>

            

            <label for="url">URL:</label>
            <input type="url" id="url" name="url" value="<?php echo htmlspecialchars($ressource['url'] ?? ''); ?>">

            <label for="related_course_id">Related Course ID:</label>
            <input type="text" id="related_course_id" name="related_course_id" value="<?php echo htmlspecialchars($ressource['related_course_id'] ?? ''); ?>">

            <button type="submit">Save</button>
            <button type="reset">Reset</button>
        </form>
    </div>
</body>

</html>
