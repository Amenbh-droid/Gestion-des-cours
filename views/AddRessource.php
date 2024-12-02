<?php
ob_start();
$error = ""; 
include '../controller/RessourceController.php';

// Create an instance of the controller 
$ressourceController = new RessourceController();

if (
    isset($_POST["course_id"], $_POST["type"], $_POST["url"])
) {
    if (
        
        !empty($_POST["course_id"]) &&
        !empty($_POST["type"]) &&
        !empty($_POST["url"])
    ) {
        $ressource = new Ressource(
        
            intval($_POST['course_id']),
            $_POST['type'],
            $_POST['url']
        );
        $ressourceController->addRessource($ressource); 
        header('Location: ListRessource.php');
    
        
        
    } else {
        $error = "All fields are required. Please fill in all fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Ressource</title>
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
        input[type="number"],
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
        <h1><a href="ListRessource.php" style="text-decoration: none; color: white;">Back to Ressource List</a></h1>
    </header>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST" id="addRessourceForm">
        <label for="course_id">Course ID:</label>
        <input type="number" id="course_id" name="course_id" required>
        <span id="course_id_error" style="color: red; font-size: 0.9em;"></span>

        <label for="type">Type:</label>
        <select id="type" name="type" required>
            <option value="">Select a type</option>
            <option value="video">Video</option>
            <option value="text">Text</option>
            <option value="pdf">PDF</option>
            <option value="jpg">Image (JPG)</option>
        </select>
        <span id="type_error" style="color: red; font-size: 0.9em;"></span>

        <label for="url">URL:</label>
        <input type="url" id="url" name="url" required>
        <span id="url_error" style="color: red; font-size: 0.9em;"></span>

        <button type="submit" aria-label="Save Ressource">Save</button>
        <button type="reset" aria-label="Reset Form">Reset</button>
    </form>
</body>

</html>
