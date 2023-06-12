<!DOCTYPE html>
<html>
<head>
    <title>Resultados da Pesquisa de CEP</title>
    <link rel="stylesheet" type="text/css" href="css/pesquisa_cep.css">
</head>
<body>
    <h1>Resultados da Pesquisa de CEP</h1>
    <div class="container">
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cep = $_POST['cep'];

        if (preg_match('/^[0-9]{5}-?[0-9]{3}$/', $cep)) {
            
            $url = "https://viacep.com.br/ws/$cep/json/";
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);

            if ($response !== false) {
               
                $data = json_decode($response, true);

                if (isset($data['cep'])) {
                    $logradouro = $data['logradouro'];
                    $bairro = $data['bairro'];
                    $localidade = $data['localidade'];
                    $uf = $data['uf'];

                    echo "<p>CEP: $cep</p>";
                    echo "<p>Logradouro: $logradouro</p>";
                    echo "<p>Bairro: $bairro</p>";
                    echo "<p>Localidade: $localidade</p>";
                    echo "<p>UF: $uf</p>";
                } else {
                    echo "<p>O CEP digitado não foi encontrado.</p>";
                }
            } else {
                echo "<p>Ocorreu um erro ao processar a requisição.</p>";
            }
        } else {
            echo "<p>O CEP digitado é inválido.</p>";
        }
    }
    ?>
    </div>
</body>
</html>
