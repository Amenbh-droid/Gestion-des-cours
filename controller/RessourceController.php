<?php
require_once('../model/Course.php');
include('../model/Ressource.php');
require_once '../db.php';


class RessourceController
{
    // Create resource
    function addRessource($ressource)
    {
        $sql = "INSERT INTO ressource (course_id, type, url, created_at) 
                VALUES (:course_id, :type, :url, :created_at)";

        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'course_id' => $ressource->getCourseId(),
                'type' => $ressource->getType(),
                'url' => $ressource->getUrl(),
                'created_at' => (new DateTime())->format('Y-m-d H:i:s'),
                
            ]);

            echo "Resource added successfully!";
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    // List resources
    public function listRessource()
    {
        $sql = "SELECT * FROM ressource";
        $db = config::getConnexion();

        try {
            $ressource = $db->query($sql);
            return $ressource;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            return [];
        }
    }

    // Update resource
    public function updateRessource($ressource, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE ressource SET 
                   course_id = :course_id,
                   type = :type,
                   url = :url
                WHERE id = :id'
            );
            $query->execute([
                'id' => $id,
                'course_id' => $ressource->getCourseId(),
                'type' => $ressource->getType(),
                'url' => $ressource->getUrl()
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // Delete resource
    public function deleteRessource($id)
    {
        $sql = "DELETE FROM ressource WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindvalue(':id', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    // Show resource by ID
    function showRessource($id)
    {
        $sql = "SELECT * FROM ressource WHERE id = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['id' => $id]);

            $ressource = $query->fetch();
            return $ressource;
        } catch (Exception $e) {
            echo 'Error: '. $e->getMessage();
        }
    }
    
    public function getResourcesByCourse($course_id) {
        $db = config::getConnexion();
        $sql = "SELECT ressource.*, course.title AS course_name 
                FROM ressource
                JOIN course ON ressource.course_id = course.id
                WHERE course.id = :course_id";
        $query = $db->prepare($sql);
        $query->execute(['course_id' => $course_id]);
        return $query->fetchAll();
    }

}