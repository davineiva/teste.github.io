<?php /*
$nome = $_POST['nome'];
$contact = $_POST['contact'];
$confirmationText = $_POST['confirmationText'];
$data_envio = date('d/m/Y');
$hora_envio = date('H:i:s');
print "Nome do usuário ". $nome;   
print "<br />";   
print "E-mail do usuário ". $contact;   
print "<br />";
print "Mensagem " . $confirmationText;   
*/

//PREENCHA OS DADOS DE CONEXÃO A SEGUIR:

$host= 'localhost';
$userbd = 'root';
$senha = 'root'; 
$bd= 'testando';
// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !
$nome = $_POST['nome'];
$contact = $_POST['contact'];
$confirmationText = $_POST['confirmationText'];
$data_envio = date('d/m/Y');
$hora_envio = date('H:i:s');
//Gravando no banco de dados !




//conectando com o localhost - mysql
$conexao = new mysqli($host,$userbd,$senha,$bd);
if ($conexao->connect_error)
{
	die ("erro de conexao: {$conexao->connect_error}");
}
//conectando com a tabela do banco de dados


$query ="INSERT into Testando ( nome , email , mensagem , data_envio , horario_envio) 
VALUES ('".$nome."', '".$contact."', '".$confirmationText."', '".$data_envio."', '".$hora_envio."')";

echo $query;

$out= $conexao->query($query);

if($out==TRUE)
{
	echo "Seu cadastro foi realizado com sucesso!<br>Agradecemos a atenção.";
}else
{
	echo "Erro". $conexao->error;
}





/* Compo E-mail
$arquivo = 
<style type='text/css'>
	body {
		margin:0px;
		font-family:Verdane;
		font-size:12px;
		color: #666666;
	}
	a{
		color: #666666;
		text-decoration: none;
	}
	a:hover {
		color: #FF0000;
		text-decoration: none;
	}
</style>
<html>
<table width='510' border='1' cellpadding='1' cellspacing='1' bgcolor='#CCCCCC'>
	<tr>
		<td>
			<tr>
				<td width='500'>Nome:$nome</td>
			</tr>
			<tr>
				<td width='320'>E-mail:<b>$contact</b></td>
			</tr>
			<tr>
				<td width='320'>Mensagem:$confirmationText</td>
			</tr>
		</td>
	</tr>  
	<tr>
		<td>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></td>
	</tr>
</table>
</html>
";

//enviar

// emails para quem será enviado o formulário
$emailenviar = "davi_neiva@hotmail.com";
$destino = $emailenviar;
$assunto = "Contato pelo Site";

  // É necessário indicar que o formato do e-mail é html
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: $nome <$email>';
  //$headers .= "Bcc: $EmailPadrao\r\n";

$enviaremail = mail($destino, $assunto, $arquivo, $headers);
if($enviaremail){
	$mgm = "E-MAIL ENVIADO COM SUCESSO! <br> O link será enviado para o e-mail fornecido no formulário";
	echo " <meta http-equiv='refresh' content='10;URL=contato.php'>";
} else {
	$mgm = "ERRO AO ENVIAR E-MAIL!";
	echo "";
}*/


?>






