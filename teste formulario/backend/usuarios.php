<?php
//-------CONEXAO------
try{
    $pdo = new PDO("mysql:dbname=meu_banco;host=localhost","root","");


} 
catch (PDOException $e){
    echo "Erro com banco de dados: ".$e-> getMessage();
}
catch(Exception $e){
    echo "Erro generico: ".$e-> getMessage();
}



    

$cpf = $_POST['inputCpf'];
$nome = $_POST['inputNome'];
$email = $_POST['inputEmail'];
$data = $_POST['inputData'];
$cep = $_POST['inputCep'];
$logradouro = $_POST['inputRua'];
$numero = $_POST['inputNum'];
$bairro = $_POST['inputBairro'];
$cidade = $_POST['inputCidade'];
$estado = $_POST['inputEstado'];



//--------INSERT------
 
$res = $pdo->prepare("INSERT INTO usuarios(cpf, nome, email, nascimento, cep, logradouro, numero, bairro, cidade, estado)
 VALUES (:cpf, :n, :e, :d, :c, :l, :num, :b, :cid, :est )");
$res->bindValue(":cpf", $cpf);
$res->bindValue(':n', $nome);
$res->bindValue("e", $email);
$res->bindValue(":d", $data);
$res->bindValue(":c", $cep);
$res->bindValue(":l", $logradouro);
$res->bindValue(":num", $numero);
$res->bindValue(":b", $bairro);
$res->bindValue(":cid", $cidade);
$res->bindValue(":est", $estado);


if($res->execute()) {
    echo "Dados inseridos com sucesso";
} else{
    echo "Falha ao tentar inserir dados";
}


/*$cmd = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
$id = 10;
$cmd->bindValue(":id",$id);
$cmd->execute();
*/

$cmd = $pdo->prepare("UPDATE usuarios SET email = :e WHERE id =
:id");
$cmd->bindValue(":e", "pedro.henrique@neris.com");
$cmd->bindValue(":id",11);
$cmd->execute();


?>

