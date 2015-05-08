<?php

class Database
{
    /**
     * @var object $db_connection The database connection
     */
    private $db_connection            = null;
    /**
     * @var array collection of error messages
     */
    public  $errors                   = array();
    /**
     * @var array collection of success / neutral messages
     */
    public  $messages                 = array();
    
    /**
     * the function "__construct()" automatically starts whenever an object of this class is created
     */
    public function __construct()
    {
        //session_start();

        // insert into longform_stories database
        if (isset($_POST["insert"])) {
            $this->insertData($_POST['p2p_slug'], $_POST['main_head'],$_POST['sub_head'],$_POST['author_1'],$_POST['author_1_email'],
                              $_POST['author_2'],$_POST['author_2_email'],$_POST['photographer'],$_POST['photographer_email'],
                              $_POST['videographer'],$_POST['videographer_email'],$_POST['subhead_1'],$_POST['caption_1'], 
                              $_POST['subhead_2'], $_POST['caption_2'],$_POST['subhead_3'], $_POST['caption_3'],$_POST['subhead_4'], $_POST['caption_4'],
                              $_POST['subhead_5'], $_POST['caption_5'],$_POST['subhead_6'], $_POST['caption_6'],$_POST['subhead_7'], $_POST['caption_7'],
                              $_POST['subhead_8'], $_POST['caption_8'],$_POST['subhead_9'], $_POST['caption_9'],$_POST['subhead_10'], $_POST['caption_10'],
                              $_POST['subhead_11'], $_POST['caption_11'],$_POST['subhead_12'], $_POST['caption_12'],$_POST['subhead_13'], $_POST['caption_13'],
                              $_POST['subhead_14'], $_POST['caption_14'], $_POST['subhead_15'], $_POST['caption_15'], $_POST['subhead_16'], $_POST['caption_16'],
                              $_POST['subhead_17'], $_POST['caption_17'],$_POST['subhead_18'], $_POST['caption_18']);
        }
        // update longform_stories database
        if (isset($_POST["update"])) {
            $this->updateData($_POST['p2p_slug'], $_POST['main_head'],$_POST['sub_head'],$_POST['author_1'],$_POST['author_1_email'],
                              $_POST['author_2'],$_POST['author_2_email'],$_POST['photographer'],$_POST['photographer_email'],
                              $_POST['videographer'],$_POST['videographer_email'],$_POST['subhead_1'],$_POST['caption_1'], 
                              $_POST['subhead_2'], $_POST['caption_2'],$_POST['subhead_3'], $_POST['caption_3'],$_POST['subhead_4'], $_POST['caption_4'],
                              $_POST['subhead_5'], $_POST['caption_5'],$_POST['subhead_6'], $_POST['caption_6'],$_POST['subhead_7'], $_POST['caption_7'],
                              $_POST['subhead_8'], $_POST['caption_8'],$_POST['subhead_9'], $_POST['caption_9'],$_POST['subhead_10'], $_POST['caption_10'],
                              $_POST['subhead_11'], $_POST['caption_11'],$_POST['subhead_12'], $_POST['caption_12'],$_POST['subhead_13'], $_POST['caption_13'],
                              $_POST['subhead_14'], $_POST['caption_14'], $_POST['subhead_15'], $_POST['caption_15'], $_POST['subhead_16'], $_POST['caption_16'],
                              $_POST['subhead_17'], $_POST['caption_17'],$_POST['subhead_18'], $_POST['caption_18']);
        }
    }

    /**
     * Checks if database connection is opened and open it if not
     */
    private function databaseConnection()
    {
        // connection already opened
        if ($this->db_connection != null) {
            return true;
        } else {
            // create a database connection, using the constants from config/config.php
            try {
                // Generate a database connection, using the PDO connector
                $this->db_connection = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
                return true;
            // If an error is catched, database connection failed
            } catch (PDOException $e) {
                $this->errors[] = MESSAGE_DATABASE_ERROR;
                return false;
            }
        }
    }
    /*
     * Inserts new story into longform_stories database
     * UPDATE PARAMS FOR INIT INSERT!!!!!!!!!!!!!!!!!!
     */
    public function insertData($p2p_slug, $main_head,$sub_head,$author_1,$author_1_email,$author_2,$author_2_email,$photographer,$photographer_email,$videographer,$videographer_email,$subhead_1){
        if($this->databaseConnection()) {
            $query_update_data = $this->db_connection->prepare('INSERT into longform_stories (main_head, sub_head, author_1, author_1_email, author_2, author_2_email, photographer, photographer_email, videographer, videographer_email) VALUES (:main_head,:sub_head,:author_1,:author_1_email,:author_2,:author_2_email,:photographer,:photographer_email,:videographer,:videographer_email)');
            $query_update_data->bindValue(':main_head', $main_head, PDO::PARAM_STR);
            $query_update_data->bindValue(':sub_head', $sub_head, PDO::PARAM_STR);
            $query_update_data->bindValue(':author_1', $author_1, PDO::PARAM_STR);
            $query_update_data->bindValue(':author_1_email', $author_1_email, PDO::PARAM_STR);
            $query_update_data->bindValue(':author_2', $author_2, PDO::PARAM_STR);
            $query_update_data->bindValue(':author_2_email', $author_2_email, PDO::PARAM_STR);
            $query_update_data->bindValue(':photographer', $photographer, PDO::PARAM_STR);
            $query_update_data->bindValue(':photographer_email', $photographer_email, PDO::PARAM_STR);
            $query_update_data->bindValue(':videographer', $videographer, PDO::PARAM_STR);
            $query_update_data->bindValue(':videographer_email', $videographer_email, PDO::PARAM_STR);
            $query_update_data->bindValue(':p2p_slug', $p2p_slug, PDO::PARAM_STR);

            $query_update_data->execute();

            if($query_update_data){
                $this->messages[] = "Thank you. The file was successfully updated.";
            }
            else{
                $this->errors[] = "There was a problem with your update, please try again.";
            } 
        }
        return $object_array;
    }
    /*
     * Updates story in longform_stories database
     */
    public function updateData($p2p_slug,$main_head,$sub_head,$author_1,$author_1_email,$author_2,$author_2_email,$photographer,$photographer_email,$videographer,$videographer_email,
                               $subhead_1,$caption_1,$subhead_2,$caption_2,$subhead_3,$caption_3,$subhead_4,$caption_4,$subhead_5,$caption_5,$subhead_6,$caption_6,
                               $subhead_7,$caption_7,$subhead_8,$caption_8,$subhead_9,$caption_9,$subhead_10,$caption_10,$subhead_11,$caption_11,$subhead_12,$caption_12,
                               $subhead_13,$caption_13,$subhead_14,$caption_14,$subhead_15,$caption_15,$subhead_16,$caption_16,$subhead_17,$caption_17,$subhead_18,$caption_18){
        if($this->databaseConnection()) {
            $query_update_data = $this->db_connection->prepare('UPDATE longform_stories SET p2p_slug = :p2p_slug, main_head = :main_head, sub_head = :sub_head, author_1 = :author_1, author_1_email = :author_1_email, author_2 = :author_2, author_2_email = :author_2_email, 
                                                                                            photographer = :photographer, photographer_email = :photographer_email, videographer = :videographer, videographer_email = :videographer_email, 
                                                                                            subhead_1 = :subhead_1, caption_1 = :caption_1, subhead_2 = :subhead_2, caption_2 = :caption_2, subhead_3 = :subhead_3, caption_3 = :caption_3,
                                                                                            subhead_4 = :subhead_4, caption_4 = :caption_4, subhead_5 = :subhead_5, caption_5 = :caption_5, subhead_6 = :subhead_6, caption_6 = :caption_6,
                                                                                            subhead_7 = :subhead_7, caption_7 = :caption_7, subhead_8 = :subhead_8, caption_8 = :caption_8, subhead_9 = :subhead_9, caption_9 = :caption_9,
                                                                                            subhead_10 = :subhead_10, caption_10 = :caption_10, subhead_11 = :subhead_11, caption_11 = :caption_11, subhead_12 = :subhead_12, caption_12 = :caption_12,
                                                                                            subhead_13 = :subhead_13, caption_13 = :caption_13, subhead_14 = :subhead_14, caption_14 = :caption_14, subhead_15 = :subhead_15, caption_15 = :caption_15,
                                                                                            subhead_16 = :subhead_16, caption_16 = :caption_16, subhead_17 = :subhead_17, caption_17 = :caption_17, subhead_18 = :subhead_18, caption_18 = :caption_18 WHERE p2p_slug = :p2p_slug');
            $query_update_data->bindValue(':p2p_slug', $p2p_slug, PDO::PARAM_STR);
            $query_update_data->bindValue(':main_head', $main_head, PDO::PARAM_STR);
            $query_update_data->bindValue(':sub_head', $sub_head, PDO::PARAM_STR);
            $query_update_data->bindValue(':author_1', $author_1, PDO::PARAM_STR);
            $query_update_data->bindValue(':author_1_email', $author_1_email, PDO::PARAM_STR);
            $query_update_data->bindValue(':author_2', $author_2, PDO::PARAM_STR);
            $query_update_data->bindValue(':author_2_email', $author_2_email, PDO::PARAM_STR);
            $query_update_data->bindValue(':photographer', $photographer, PDO::PARAM_STR);
            $query_update_data->bindValue(':photographer_email', $photographer_email, PDO::PARAM_STR);
            $query_update_data->bindValue(':videographer', $videographer, PDO::PARAM_STR);
            $query_update_data->bindValue(':videographer_email', $videographer_email, PDO::PARAM_STR);
            $query_update_data->bindValue(':subhead_1', $subhead_1, PDO::PARAM_STR);
            $query_update_data->bindValue(':caption_1', $caption_1, PDO::PARAM_STR);
            $query_update_data->bindValue(':subhead_2', $subhead_2, PDO::PARAM_STR);
            $query_update_data->bindValue(':caption_2', $caption_2, PDO::PARAM_STR);
            $query_update_data->bindValue(':subhead_3', $subhead_3, PDO::PARAM_STR);
            $query_update_data->bindValue(':caption_3', $caption_3, PDO::PARAM_STR);
            $query_update_data->bindValue(':subhead_4', $subhead_4, PDO::PARAM_STR);
            $query_update_data->bindValue(':caption_4', $caption_4, PDO::PARAM_STR);
            $query_update_data->bindValue(':subhead_5', $subhead_5, PDO::PARAM_STR);
            $query_update_data->bindValue(':caption_5', $caption_5, PDO::PARAM_STR);
            $query_update_data->bindValue(':subhead_6', $subhead_6, PDO::PARAM_STR);
            $query_update_data->bindValue(':caption_6', $caption_6, PDO::PARAM_STR);
            $query_update_data->bindValue(':subhead_7', $subhead_7, PDO::PARAM_STR);
            $query_update_data->bindValue(':caption_7', $caption_7, PDO::PARAM_STR);
            $query_update_data->bindValue(':subhead_8', $subhead_8, PDO::PARAM_STR);
            $query_update_data->bindValue(':caption_8', $caption_8, PDO::PARAM_STR);
            $query_update_data->bindValue(':subhead_9', $subhead_9, PDO::PARAM_STR);
            $query_update_data->bindValue(':caption_9', $caption_9, PDO::PARAM_STR);
            $query_update_data->bindValue(':subhead_10', $subhead_10, PDO::PARAM_STR);
            $query_update_data->bindValue(':caption_10', $caption_10, PDO::PARAM_STR);
            $query_update_data->bindValue(':subhead_11', $subhead_11, PDO::PARAM_STR);
            $query_update_data->bindValue(':caption_11', $caption_11, PDO::PARAM_STR);
            $query_update_data->bindValue(':subhead_12', $subhead_12, PDO::PARAM_STR);
            $query_update_data->bindValue(':caption_12', $caption_12, PDO::PARAM_STR);
            $query_update_data->bindValue(':subhead_13', $subhead_13, PDO::PARAM_STR);
            $query_update_data->bindValue(':caption_13', $caption_13, PDO::PARAM_STR);
            $query_update_data->bindValue(':subhead_14', $subhead_14, PDO::PARAM_STR);
            $query_update_data->bindValue(':caption_14', $caption_14, PDO::PARAM_STR);
            $query_update_data->bindValue(':subhead_15', $subhead_15, PDO::PARAM_STR);
            $query_update_data->bindValue(':caption_15', $caption_15, PDO::PARAM_STR);
            $query_update_data->bindValue(':subhead_16', $subhead_16, PDO::PARAM_STR);
            $query_update_data->bindValue(':caption_16', $caption_16, PDO::PARAM_STR);
            $query_update_data->bindValue(':subhead_17', $subhead_17, PDO::PARAM_STR);
            $query_update_data->bindValue(':caption_17', $caption_17, PDO::PARAM_STR);
            $query_update_data->bindValue(':subhead_18', $subhead_18, PDO::PARAM_STR);
            $query_update_data->bindValue(':caption_18', $caption_18, PDO::PARAM_STR);

            $query_update_data->execute();

            if($query_update_data){
                $this->messages[] = "Thank you. The file was successfully updated.";
            }
            else{
                $this->errors[] = "There was a problem with your update, please try again.";
            } 
        }
        return $object_array;
    }
    /*
     * Get all of the snowfall totals
     * @return $object_array all of the snowfall totals
     */
    public function getData($sql){
        if($this->databaseConnection()) {
            // database query, getting all the info of the selected user
            $query_get_data = $this->db_connection->prepare($sql);
            $query_get_data->execute();
            // get result row (as an object)
            $object_array = $query_get_data->fetchAll();
        }
        return $object_array;
    }
}
