<?php 
    function convertRestultToJSON($result)
    {
        $facts = [];
        while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $facts[] = $row;
        }
        return json_encode($facts);
    }
?>