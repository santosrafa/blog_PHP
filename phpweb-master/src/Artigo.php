<?php

    class Artigo
    {
        private $mysql;

        public function __construct(mysqli $mysql)
        {
            $this->mysql = $mysql;
            
        }

        public function exibirTodos(): array
        {
            /* --query: consulta no banco-- */
            $resultado = $this->mysql->query('SELECT conteudo, id, titulo FROM artigos');

            /* --MYSQLI_ASSOC: para retornar um array associativo-- */
            $artigos = $resultado->fetch_all(MYSQLI_ASSOC);

            return $artigos;
        }
    }    