<?php

    class Artigo
    {
        private $mysql;

        public function __construct(mysqli $mysql)
        {
            $this->mysql = $mysql;
            
        }

        public function adicionar (string $titulo, string $conteudo): void
        {
            $insereArtigo = $this->mysql->prepare('INSERT INTO artigos (titulo, conteudo) VALUES (?,?);');
            $insereArtigo->bind_param('ss', $titulo, $conteudo);
            $insereArtigo->execute();
        }

        public function remover (string $id): void
        {
            $removerArtigo = $this->mysql->prepare('DELETE FROM artigos WHERE id = ?');
            $removerArtigo->bind_param('s', $id);
            $removerArtigo->execute();
        }

        public function exibirTodos(): array
        {
            /* --query: consulta no banco-- */
            $resultado = $this->mysql->query('SELECT conteudo, id, titulo FROM artigos');

            /* --MYSQLI_ASSOC: para retornar um array associativo-- */
            $artigos = $resultado->fetch_all(MYSQLI_ASSOC);

            return $artigos;
        }

        public function econtrarPorId(string $id): array
        {
            $selecionaArtigo =  $this->mysql->prepare("SELECT id, titulo, conteudo FROM artigos WHERE id = ?");

            $selecionaArtigo->bind_param('s', $id);

            $selecionaArtigo->execute();

            $artigo = $selecionaArtigo->get_result()->fetch_assoc();

            return $artigo;

        }
    }    