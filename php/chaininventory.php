<?php
    include "../db/database.php";
    function add() {
        $playerID = $_POST['playerID'];
        $words = [];
        for ($i = 1; $i <= 7; $i++) {
            $post_key = "word" . strval($i);
            push($words, $_POST[$post_key]);
        }
        insertChain($playerID, $words);
    }

    function update() {
        $chainID = $_POST['chainID'];
        $words = [];
        for ($i = 1; $i <= 7; $i++) {
            $post_key = "word" . strval($i);
            push($words, $_POST[$post_key]);
        }
        $updates = [];
        $update_data = $POST["update"];
        $update_array = str_split($update_data);
        foreach ($update_array as $update_bit) {
            if ($update_bit == "1") {
                push($updates, true);
            } else {
                push($updates, false);
            }
        }
        updateChain($chainID, $words, $updates);
    }

    function remove() {
        $chainID = $_POST['chainID'];
        removeChain
    }

    function doAction($action) {
        if ($action == "add") {
            add();
        } else if ($action == "update") {
            update();
        } else if ($action == "remove") {
            delete();
        }
    }

    $action = $_POST['action'];
    doAction($action);
?>