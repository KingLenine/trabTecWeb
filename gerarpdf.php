<?php	

	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
    require_once("dompdf/autoload.inc.php");
    
    $servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "site";
	
	//Criar a conexão
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	if(!$conn){
		die("Falha na conexao: " . mysqli_connect_error());
	}else{
		//echo "Conexao realizada com sucesso";
	}
	
	
	$result_usuario = "SELECT * FROM usuarios ORDER BY id DESC LIMIT 1";
	$resultado_usuario = mysqli_query($conn, $result_usuario);	
	$row_usuario = mysqli_fetch_assoc($resultado_usuario);	
	

	//Criando a Instancia
	$dompdf = new DOMPDF();

	// Carrega seu HTML
	$dompdf->load_html("<html>
    <body>
        <h1>Relatório</h1>
        Id: ".$row_usuario['id']."<br>
        Nome: ".$row_usuario['nome']."<br>
        Data: ".$row_usuario['data']."<br>
        Caracteristicas: ".$row_usuario['caract']."<br>
        
      </body>
</html>
");

	
	$dompdf->setPaper('A4', 'portrait');
	
	//Renderizar o html
	$dompdf->render();
	

	//Exibibir a página
	$dompdf->stream(
		"relatorio.pdf", 
		array(
			"Attachment" => true //Para realizar o download somente alterar para true
		)
	);
?>