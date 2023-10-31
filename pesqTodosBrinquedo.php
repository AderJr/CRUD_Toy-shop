<?php
    require_once("includes/conectarBD.php");
     //Vai verificar se a nossa sessão esta ativa
     require_once("verificar.php");
          //Função que vai exibir a data completa, dia e ano corrente
     include 'includes/exibirDia.fcn';
?>
<html>
<body>
    <img src="/Prova_A2_30653274_29729165_29921571_31473890_30347807/imagens/toy_shop.png" width="150" height="100"><b>
    <?php
        //Exibirá o nome do usuário que está logado e a data corrente
        echo "O usuário " .$_SESSION['sessaoNome']." está logado no sistema neste momento !!!! Hoje é ".$data;
    ?></b><br/><br/>
    <table width="60%" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
        <td height="60"><div align="center"><font face="Arial" size="4"><b>Gerenciamento de Brinquedos - BIL</b></font></div></td>
    </tr>
    </table><br>
<?php
     //A formatação do campo cliDtInclusao, para retornar a data no formato dd/MM/yyyy
     $sqlBrinquedo = mysqli_query($conexao,"SELECT briID, briNome, briClassificacao FROM brinquedo".
     //Ordena pelo número do código do Brinquedo
     " ORDER BY briID") or die ("Não foi possível realizar a consulta.");
?>
<?php
     //Se encontrar algum registro na tabela
     if(mysqli_num_rows($sqlBrinquedo) > 0)
     {
?>
        <table width="100%" border="0" cellspacing="1" cellpadding="0" align="center">
        <tr>
            <td colspan="15"><div align="center"><font face="Arial" size="2"><b>Brinquedos Cadastrados</font></b></font></div></td>
        <tr>
        <td colspan="15"><div align="center"><font face="Arial" size="2"><b>Utilize as Teclas Ctlr+F para Encontrar o Código ou Nome do Brinquedo</font></b></font></div></td>
        </tr>
        <tr></tr>
        <tr>
            <td width="5%"><div align="center"><b><font face="Arial" size="2">Código do Brinquedo</font></b></div></td>
            <td width="10%"><div align="center"><b><font face="Arial" size="2">Nome do Brinquedo</font></b></div></td>
            <td width="20%"><div align="center"><b><font face="Arial" size="2">Classificação do Brinquedo</font></b></div></td>
        </tr>
     
<?php
        //Lista os dados da tabela enquanto exisitir
        while($arrayBrinquedo = mysqli_fetch_array($sqlBrinquedo))
        {
?>
        <tr>
            <td width="10%" height="25"><div align="center"><b><font face="Arial" size="2"><?php echo $arrayBrinquedo['briID'];?></font></td>
            <td width="20%" height="25"><div align="center"><b><font face="Arial" size="2"><?php echo $arrayBrinquedo['briNome'];?></font></td>
            <td width="10%" height="25"><div align="center"><b><font face="Arial" size="2"><?php echo $arrayBrinquedo['briClassificacao'];?></font></td>
        </tr>
<?php
        //Fecha a execução do comando mysqli_fetch_array
        }
?>
        </table>
<?php
     }//Fecha a execução do comando mysqli_num_rows > 0
     else
     {
         echo "<br><br><div align=center><font face=Arial size=2>Desculpe, mais não foram encontrados nenhum Brinquedo<br><br></font></div>";
     }
?>
     <br><div align="center"><font face="Arial" size="2">
     <b><a href='menuPesquisarBrinquedo.php'><b>Voltar Para o Menu Pesquisar Brinquedos</a><br>     
     <a href='formAlterarBrinquedo.php'><b>Voltar Para Alteração de Brinquedos</a><br>
     <a href='formExcluirBrinquedo.php'><b>Voltar Para Exclusão de Brinquedos</a><br>
     <a href='menuGerBrinquedo.php'><b>Voltar para o menu de Opções Gerenciamento de Brinquedos</a><br>
     <a href='menuOpcoesGeral.php'><b>Voltar para o menu de Opções Geral</a><br>
     <a href='sair.php'><b>Sair do Sistema BIL</a></font></div>
     </body>
</html>
