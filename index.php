<?php 
 include_once 'classes/caixa.classe.php'; 
 
 // Instancia os objetos
 $conecta = new database();
 $conta   = new Conta();
 
 // Chama o método da conexão com o BD
 $conecta->connectionDB();
 $saldo_atual = $conta->getSaldo();
 
 $sql_get_saldo = " SELECT * FROM caixa WHERE id = 1";
 $run_get_saldo = mysql_query( $sql_get_saldo );
 $row_get_saldo = mysql_num_rows( $run_get_saldo );
 
 if( $row_get_saldo > 0 )
 {
     $linha_get_saldo = mysql_fetch_object( $run_get_saldo );
     $saldo_em_conta  = $linha_get_saldo->saldo;
 }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Testando Orientação à objetos - Manipular valores em caixa</title>
        <link rel="stylesheet" media="screen" href="css/style.css" />
    </head>
    <body>
        <div class="container">
            <header class="header">
                <h1>Gerenciando o saldo em caixa da empresa</h1>
                <h2>Inserir e abater crédito do saldo atual em conta</h2>
            </header>
            <section class="nav">
                <form name="send_caixa" id="send-caixa" method="post">
                    <label>
                        <strong>Saldo atual</strong>
                        <input type="text" value="<?php echo $saldo_atual; ?>" readonly disabled />
                    </label>
                    <label>
                        <strong>Abater saldo</strong>
                        <input type="text" name="descontar" id="descontar" />
                    </label>
                    <label>
                        <strong>Inserir crédito</strong>
                        <input type="text" name="credito" id="credito" />
                    </label>
                    <button type="submit" name="action">Enviar</button>
                </form>            
            </section>
            <footer class="footer">
                <p>&copy; Todos os direitos reservados - 2014</p>
            </footer>
        </div>
    </body>
</html>

<?php 
 if( isset( $_POST[ 'action' ] ) )
 {
    if( !empty( $_POST[ 'credito' ] ) )
    {
        $conta->depositar( $_POST[ 'credito' ], $saldo_em_conta );  
    }
    if( !empty( $_POST[ 'descontar' ] ) )
    {
        $conta->sacar( $_POST[ 'descontar' ], $saldo_em_conta );
    }
 }
?>