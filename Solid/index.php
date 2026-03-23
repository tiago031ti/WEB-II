<?php

Class DataBase
{
    public function conectar();
}

class MySQL implements DataBase {
    public function conectar () {}
}
class PostgreSQL implements Database {
    public function conectar() {}
}

class Pedido
{
    private $tipoCliente;
    private $valor;
      private $db;

    public function _construct(Database $db) {
        $this->db = $db;
    }

    public function __construct($tipoCliente, $valor)
    {
        $this->tipoCliente = $tipoCliente;
        $this->valor = $valor;

    }

    public function processarPedido()
    {
        $desconto = 0;

        interface TipoClientes {
            public function Calcular();
            }
        }

        class Vip implements TipoClientes {
            public function calcular() {
                return 0.2;
            }
        }
        class Regular implements TipoClientes {
            public function calcular() {
                return 0.1;
            }
        }

        $valorFinal = $this->valor - $desconto;

        $this->db->salvarPedido($valorFinal);

        $email = new Email();
        $email->enviar("Pedido no valor de {$valorFinal} processado");
    }

class MySQL
{
    public function salvarPedido($valor)
    {
        echo "Salvando pedido no MySQL com valor {$valor} <br>";
    }
}

class Email
{
    public function enviar($mensagem)
    {
        echo "Enviando email: {$mensagem} <br>";
    }
}
?>