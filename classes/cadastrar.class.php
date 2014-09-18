<?php

class cadastro 
    { 
        protected $tabela;
        protected $dados; 
        
        public function insert_rows( $tabela, $dados = array() )
            {
                $implode   = implode( ',', $dados );
                $sql_query = "INSERT INTO $tabela VALUES( $implode );";
                $run_query = mysql_query( $sql_query );
                
                if( $run_query == true)
                    {
                        $sucesso = array( 'sucesso' => 'sucesso' );
                        echo json_encode( $sucesso );
                    }
                else
                    { 
                        $erros = array( 'erros' => 'Ops! Houve uma falha grave. Contacte o desenvolvedor.+duplicou' );
                        echo json_encode( $erros );
                    }
            }
    }
