<?php 
    include 'convert_result_to_json.php';
    include 'get_body.php';
    include 'get_params.php';

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    
    $mysqli = new mysqli("db", "user", "password", "appDB");

    $body = getBody();
    $params = getParams();

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            $result = $mysqli->query("SELECT * FROM interesting_facts");
        
            echo convertRestultToJSON($result);
            break;
        case 'POST':
            $stmt = $mysqli->prepare("INSERT INTO interesting_facts (title, text, url_video) VALUES (?, ?, ?)");
            $res = $stmt->bind_param('sss', $body['title'], $body['text'], $body['url_video']);
            $stmt->execute();

            echo 1;
            break;
        case 'PUT':
            $stmt = $mysqli->prepare("UPDATE interesting_facts SET title=?, text=?, url_video=? WHERE ID=?");
            $res = $stmt->bind_param('sssi', $body['title'], $body['text'], $body['url_video'], $body['ID']);
            $stmt->execute();

            break;
        case 'DELETE':
            $stmt = $mysqli->prepare("DELETE FROM `interesting_facts` WHERE `ID`=?");
            $res = $stmt->bind_param('i', $params['ID']);
            $stmt->execute();

            echo 1;
            break;
        default:
            header("HTTP/1.1 404 Not Found");
            break;
    }
?>
