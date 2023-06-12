<?php
use PHPUnit\Framework\TestCase;
use seduc\DigitalCep\Search;

class SearchTest extends TestCase {
    /**
     * @dataProvider dadosTeste
     */
    public function testGetAddressFromZipcodeDefaultUsage(string $input, array $esperado){
        $resultado = new Search;
        $resultado = $resultado->getAddressFromZipcode($input);

        $this->assertEquals($esperado, $resultado);
    }

    public function dadosTeste(){
        return [
            "Distrido Werneck"=> [
                "25860000",
                    [
                        "cep" => "25860-000",
                        "logradouro" => "",
                        "complemento" => "",
                        "bairro" => "Werneck",
                        "localidade" => "Paraíba do Sul",
                        "uf" => "RJ",
                        "ibge" => "3303708",
                        "gia" => "",
                        "ddd" => "24",
                        "siafi" => "5873",
                    ]
                ],
                "Paraiba do Sul"=> [
                    "25850000",
                    [
                        "cep" => "25850-000",
                        "logradouro" => "",
                        "complemento" => "",
                        "bairro" => "",
                        "localidade" => "Paraíba do Sul",
                        "uf" => "RJ",
                        "ibge" => "3303708",
                        "gia" => "",
                        "ddd" => "24",
                        "siafi" => "5873"
                    ]
                ]
        ];
    }
}