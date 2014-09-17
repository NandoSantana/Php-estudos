<?php
 // Conexão com o banco de dados
 include_once 'conexao.classe.php';     
     
 class Conta
 {
    // Atributos
    private $saldo;

    /* Métodos */
    // Pegar saldo em conta no caixa
    public function getSaldo()
    {
        $sql_get_saldo = " SELECT * FROM caixa WHERE id = 1";
        $run_get_saldo = mysql_query( $sql_get_saldo );
        $row_get_saldo = mysql_num_rows( $run_get_saldo );

        if( $row_get_saldo > 0 )
        {
            $linha_get_saldo = mysql_fetch_object( $run_get_saldo );
            $saldo_em_conta  = $linha_get_saldo->saldo;
            $this->saldo     = $saldo_em_conta;
            
            return $this->saldo;
        }
    }
    
    // Depósitos
    public function depositar( $valor, $saldo_atual )
    { 
        if( $valor != 0 )
        {
            $new_saldo     = $valor + $saldo_atual;
            $sql_upd_saldo = " UPDATE caixa SET saldo = '$new_saldo' WHERE id = 1";
            $run_upd_saldo = mysql_query( $sql_upd_saldo );
            
            if( $run_upd_saldo == true )
            {
                echo '<p class="escopo">Crédito inserido com suceso!</p>';
                echo '<script>setTimeout( function() { window.location.href = window.location.href; },2000);</script>';
            }
        }
        else
        {
            echo '<p class="erros">O valor não pode ser igual à zero!</p>';
        }
    }
    
    // Saques
    public function sacar( $valor, $saldo_atual )
    {
        if( $saldo_atual >= $valor && $saldo_atual != 0 )
        {
            $new_saldo     = $saldo_atual - $valor;
            $sql_upd_saldo = " UPDATE caixa SET saldo = '$new_saldo' WHERE id = 1";
            $run_upd_saldo = mysql_query( $sql_upd_saldo );
            
            if( $run_upd_saldo == true )
            {
                echo '<p class="escopo">Saldo abatido com suceso!</p>';
                echo '<script>setTimeout( function() { window.location.href = window.location.href; },2000);</script>';
            }
        }
        else 
        {
            echo '<p class="erros">Sem crédito em conta!</p>';
        }
    }
    /* Fim Métodos */
}