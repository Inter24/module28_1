<?php

class Parser{

    public static function getPage($params = []){

        if($params){

            if(!empty($params["url"])){

                $url = $params["url"];
                $data["content"] = file_get_contents($url);

                return [
                "data" => $data
                ];

            }
        }

    return false;
    }

}

$html = Parser::getPage([
    "url" => "index.php"
]);

$str = $html["data"]["content"];

if(!empty($html["data"])){

    $str = preg_replace('/<title>(.*)<\/title>/','',$str);

    $str = preg_replace('/<meta name="keywords" (.*)>/','', $str);

    $str = preg_replace('/<meta name="description" (.*)>/','', $str);
    
    echo($str);
}

?>