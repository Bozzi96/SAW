<?php

echo "[";

    foreach ($_POST as $key => $value){
        switch ($key){
            case "name":
                $name = trim($_POST['name']);
                if(preg_match("/^[a-zA-Z'ìòàù]{3,40}$/", $name))
                    echo '{"name" : "'.$key.'", "value" : "'.$value.'", "status":"ok"}';
                else{
                    echo '{"name" : "'.$key.'", "value" : "'.$value.'", "status":"ko"}';
                }
                break;

            case "surname":
                $surname = trim($_POST['surname']);
                if(preg_match("/^[a-zA-Z]{3,40}$/", $surname))
                    echo '{"name" : "'.$key.'", "value" : "'.$value.'", "status":"ok"}';
                else{
                    echo '{"name" : "'.$key.'", "value" : "'.$value.'", "status":"ko"}';
                }
                break;

            case "city":
                $citta = trim($_POST['city']);
                if(preg_match("/^[\w\s']{3,40}$/", $citta))
                    echo '{"name" : "'.$key.'", "value" : "'.$value.'", "status":"ok"}';
                else{
                    echo '{"name" : "'.$key.'", "value" : "'.$value.'", "status":"ko"}';
                }
                break;

            case "province":
                $provincia = trim($_POST['province']);
                if(preg_match("/^[A-Z]{2,2}$/", $provincia))
                    echo '{"name" : "'.$key.'", "value" : "'.$value.'", "status":"ok"}';
                else{
                    echo '{"name" : "'.$key.'", "value" : "'.$value.'", "status":"ko"}';
                }
                break;

            case "CAP":
                $CAP = trim($_POST['CAP']);
                if(preg_match("/^[0-9]{5}$/", $CAP))
                    echo '{"name" : "'.$key.'", "value" : "'.$value.'", "status":"ok"}';
                else{
                    echo '{"name" : "'.$key.'", "value" : "'.$value.'", "status":"ko"}';
                }
                break;

            case "email":
                $email = trim($_POST['email']);
                if(preg_match("/[A-z0-9\.\+_-]+@[A-z0-9\._-]+\.[A-z]{2,6}$/", $email))
                    echo '{"name" : "'.$key.'", "value" : "'.$value.'", "status":"ok"}';
                else{
                    echo '{"name" : "'.$key.'", "value" : "'.$value.'", "status":"ko"}';
                }
                break;

            case "password":
                $password = trim($_POST['password']);
                if(preg_match("/[\w\.\+_-]{8,40}$/", $password))
                    echo '{"name" : "'.$key.'", "value" : "'.$value.'", "status":"ok"}';
                else{
                    echo '{"name" : "'.$key.'", "value" : "'.$value.'", "status":"ko"}';
                }
                break;

                default:
                    echo '{"status":"ko"}';
        }
    }


echo "]";