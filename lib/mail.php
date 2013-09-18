<?php
/* FUNCTIONS */

function fnValidateEmail($email)
{
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    return filter_var($email, FILTER_SANITIZE_EMAIL);
}

function fnValidateTelefone($tel)
{
    if (!preg_match('/[2-9][0-9]{3}[0-9]{4}/',$tel)){return '';}
    else {return $tel;}
}


/*************/


session_start();

$dados = array(
		'nome'     =>                    trim(strip_tags($_REQUEST['nome'])),
		'email'    =>    fnValidateEmail(trim(strip_tags($_REQUEST['email']))),
		'ddd'      =>                                    $_REQUEST['ddd'],
		'telefone' => fnValidateTelefone(trim(strip_tags($_REQUEST['telefone']))),
		'mensagem' =>       trim(htmlentities(strip_tags($_REQUEST['mensagem'])))
	      );

foreach($dados as $key => $value)
{
    if($value == null || $value == '' || sizeof($value) < 1 )
    {
	$dados[errors][] = $key;
	$dados[error] = 'validation';
    }
}


$_SESSION['dados'] = $dados;
if(!isset($dados[error]))
{
    // set here
    $subject = "Site Dualconect: Contato";
    $to = 'forsureitsme@gmail.com';
    
    $body = trim(wordwrap("Nome: ".$dados[nome]." \nTelefone: ".$dados[ddd].$dados[telefone]." \nE-mail: ".$dados[email]." \n\n".$dados[mensagem]));
       
    // send the email
    if(mail($to, $subject, $body) == true)
    {
	session_unset();
	$_SESSION["success"] = true;
    }
    else
    {
	$_SESSION['dados'][error] = 'mail';
    }
}

header('Location:http://www.dualconect.com.br/contato.php');