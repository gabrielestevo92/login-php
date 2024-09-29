<?php

namespace app\database;

use PDO;

$endereco = 'localhost';
$banco = 'gabriel';
$usuario = 'postgres';


// class Connection{

//     public function connect(){
//         return new PDO("pgsql:host=localhost;dbname=gabriel","postgresql","",[
//             PDO::ATTR_DEFALT_FETCH_MODE => PDO::FETCH_OBJ
//         ]);
//     }
// }

try {
    $pdo = new PDO("pgsql:host=$endereço;port:5432;dbname=$banco",$usuario,"",[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    );
    echo "Conectado ao Banco de dados";
} catch (PDOException $e) {
    echo "Falha ao conectar ao banco de dados";
}
