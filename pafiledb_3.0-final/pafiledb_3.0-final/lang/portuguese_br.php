<?php
/*
  paFileDB 3.0
  ©2001 PHP Arena
  Written by Todd
  todd@phparena.uni.cc
  http://www.phparena.uni.cc
  Keep all copyright links on the script visible
  Please read the license included with this script for more information.

  ##########
  #paFileDB 3.0 Language File
  #Portuguese - Brasilian
  #Translated by Kallaur
  ##########

  ##########	
  #If you are translating this file, DO NOT translate anything in brackets, such as {something}, any variables ($something) or arrays #($something[somethingelse]), or HTML tags (<something></something>) or else parts of the script will not work
  #Also, do not delete any lines in this script
  ##########

*/

//Start Beta 2 Language File
$str[time] = "Todos os horários estão em";
$str[power] = "Desenvolvido por";
$str[exectime] = "Tempo de execução";
$str[numqueries] = "MySQL Queries Usadas";
$str[adminops] = "Opções Admin";
$str[mainpage] = "Página Principal";
$str[addcat] = "Add Categoria";
$str[editcat] = "Editar Categoria";
$str[delcat] = "Deletar Category";
$str[ordercat] = "Reorder Categorias";
$str[category] = "Categora";
$str[files] = "Ítens";
$str[jump] = "Selecione Categoria";
$str[logged] = "Logado como";
$str[admincenter] = "Área Admin";
$str[logout] = "Logout";
$str[file] = "Ítem";
$str[date] = "Data Adicionada";
$str[rating] = "Avaliações";
$str[dls] = "Downloads";
$str[email] = "Envie por e-mail a um amigo";
$str[emailinfo] = "Se você quiser informar um amigo sobre este ítem, preencha e envie este formulário e um email será enviado a ele!";
$str[yname] = "Seu Nome";
$str[yemail] = "Seu E-mail";
$str[fname] = "Nome do Amigo";
$str[femail] = "E-mail do Amigo";
$str[esub] = "Título da Mensagem";
$str[etext] = "Texto do E-mail";
$str[defaultmail] = "Eu achei que você estaria interessado em fazer o download do arquivo em";
$str[semail] = "Enviar E-mail";
$str[msg] .= "Olá $friend[name],\n";
$str[msg] .= "$email[message]\n\n";
$str[msg] .= "----------\n";
$str[msg] .= "Este E-mail foi enviado através \"{dbname}\" database. O webmasters de \"{dbname}\" não tem responsabilidade sobre os E-mails enviados através do site.";
$str[econf] = "Obrigado! Seu E-mail foi enviado para o endereço de E-mail de $friend[name]'s.";
$str[editfile] = "Editar Ítem";
$str[deletefile] = "Deletar Ítem";
$str[desc] = "Descrição";
$str[creator] = "Autor";
$str[version] = "Versão";
$str[scrsht] = "Screenshot";
$str[docs] = "Documentação";
$str[lastdl] = "Último Download";
$str[never] = "Nunca";
$str[votes] = "votos";
$str[download] = "Fazer Download";
$str[rate] = "Avalie o Ítem";
$str[license] = "Termo de Compromisso";
$str[licensewarn] = "Você tem que concordar com o Termo de Compromisso para fazer o download";
$str[iagree] = "Concordo";
$str[dontagree] = "Discordo";
$str[rerror] = "Desculpe, você já avalio este ítem.";
$str[rateinfo] = "Você está para avaliar o ítem <i>{filename}</i>. Selecione a opção abaixo. 1 é péssimo, 10 é ótimo.";
$str[rconf] = "Você avaliou o ítem <i>{filename}</i> em {rate}. A nova média de avaliação é $nrating {newrating}/10.";
$str[stats] = "Stats";
$str[statstext] .= "Existem  $num[files] ítens em  $num[cats] categorias<br>";
$str[statstext] .= "O ítem mais antigo é <a href=\"pafiledb.php?action=file&id= $oldest[file_id]\"> $oldest[file_name]</a><br>";
$str[statstext] .= "O ítem mais novo é <a href=\"pafiledb.php?action=file&id= $newest[file_id]\"> $newest[file_name]</a><br>";
$str[statstext] .= "O menos popular baseado em avaliações é <a href=\"pafiledb.php?action=file&id= $lpopular[file_id]\"> $lpopular[file_name]</a> with a rating of $least/10<br>";
$str[statstext] .= "O mais popular baseado em avaliações é <a href=\"pafiledb.php?action=file&id= $popular[file_id]\"> $popular[file_name]</a> with a rating of  $most/10<br>";
$str[statstext] .= "O menos popular baseado em downloads é <a href=\"pafiledb.php?action=file&id= $leastdl[file_id]\"> $leastdl[file_name]</a> with  $leastdl[file_dls] downloads<br>";
$str[statstext] .= "O mais popular baseado em downloads é <a href=\"pafiledb.php?action=file&id= $mostdl[file_id]\"> $mostdl[file_name]</a> with  $mostdl[file_dls] downloads<br>";
$str[statstext] .= "Foram feitos  $totaldls[0] downloads<br>";
$str[statstext] .= "A média de de avaliações é $avg/10<br>";
$str[statstext] .= "A média de downloads de cada ítem é $avgdls<br>";
$str[search] = "Buscar";
$str[results] = "Resultados para";
$str[nomatches] = "Desculpe, nehum resultado foi encontrado para";
$str[matches] = "resultados foram encontrados para";
$str[sfor] = "Busca para";
$str[viewall] = "Ver todos os ítens";
$str[vainfo] = "Ver todos os ítens no Banco de Dados";
$str[next] = "Próximo";
$str[prev] = "Anterior";
$str[pagenums] = "Páginas";
//You have reached Line 100. If you're not tired now, you will be soon.
$str[acinfo] = "Benvindo a Área Administrativa de seu paFileDB 3. Você pode usar a Área Administrativa para alterar suas configurações. Você pode selecionar o link acima para modificar seu Banco de dados.";
$str[cmanage] = "Gerenciar Categorias";
$str[fmanage] = "Gerenciar Ítens";
$str[cumanage] = "Gerenciar Campos Extras";
$str[lmanage]= "Gerenciar Termo";
$str[amanage] = "Gerenciar Contas Admin";
$str[csettings] = "Alterar Configurações";
$str[asettings] = "Configurações de sua Conta";
$str[utils] = "Utilidades";
$str[aminfo] = "Você pode usar esta seção para adicionar, apagar ou alterar contas de acesso administrativo.";
$str[aadmin] = "Add Admin";
$str[eadmin] = "Editar Admin";
$str[dadmin] = "Deletar Admin";
$str[un] = "Usuário";
$str[uninfo] = "Digite aqui o nome do novo usuário para a nova conta";
$str[aemail] = "E-mail Admin";
$str[aemailinfo] = "Digite o endereço de E-mail aqui";
$str[apass] = "Senha";
$str[apassinfo] = "Digite aqui a senha para a nova conta. Pode ser alterada a qualquer hora";
$str[aeditperm] = "Editar Permissões Admin";
$str[aeditperminfo] = "Selecione se deseja que o novo usuário possa alterar, adicionr ou apagar outros usuários.";
$str[yes] = "Sim";
$str[no] = "Não";
$str[aadderror] = "Já existe um usuário com este nome $form[username]";
$str[adminadded] = "O Usuário <i>$form[username]</i> foi adicionado!";
$str[changepass] = "Mudar Senha";
$str[newpass] = "Nova Senha";
$str[editerror] = "Você não selecionou usuário para editar!";
$str[infochanged] = "As informações do usuário foram alteradas!";
$str[passchanged] = "A senha do usuário foi alterada!";
$str[delerror] = "Você não selecionou usuário para apagar!";
$str[deleted] = "O usuário selecionado foi apagado.";
$str[cmaninfo] = "Você pode usar esta seção para adicionar, alterar, ordenar ou apagar categorias. Para adicionar ítens, você tem que ter ao menos uma categoria criada. Clique no link abaixo para gerenciar suas categorias.";
$str[acat] = "Add Categoria";
$str[ecat] = "Editar Categoria";
$str[dcat] = "Deletar Categoria";
$str[rcat] = "Re ordenar Categorias";
$str[catadded] = "Sua nova categoria, <i>$form[name]</i> foi adicionada!";
$str[catname] = "Nome da Categoria";
$str[catnameinfo] = "Este será o nome da categoria.";
$str[catdesc] = "Descrição da Categoria";
$str[catdescinfo] = "Esta é a descrição geral dos ítens da Categoria";
$str[catparent] = "Categoria de Referência";
$str[catparentinfo] = "Se quer que esta seja uma sub categoria, selecione qual seria a categoria principal.";
$str[none] = "Nenhum";
$str[catedited] = "Sua Categoria, <i>$form[name]</i> foi editada!";
$str[delfiles] = "Apagar ítens da Categoria?";
$str[catsdeleted] = "As Categorias selecionadas foram apagadas.";
$str[cdelerror] = "Você não selecionou nenhuma Categoria para apagar!";
$str[rcatinfo] = "Você pode re ordenar as Categorias mudando a ordem que aparecerão na página principal. Para reordenar as Categorias, escolha a ordem que deseja alterando os números. 1 será mostrada primeiro, 2 será mostrada em segundo, ect. Isto nã afeta sub categorias.";
$str[rcatdone] = "As Categorias foram re ordenadas!";
$str[custominfo] = "Você pode usar os campos personalizados da Área Administrativa do paFileDB para adicionar, editar e apagar os campos. Você pode usar estes campos para adicionar mais informações ao ítem. Por exemplo, se quiser informar o tamanho de um arquivo, você pode adicionar esta nova opção.";
$str[afield] = "Add Campo";
$str[efield] = "Editar Campo";
$str[dfield] = "Deletar Campo";
$str[fieldname] = "Nome do Campo";
$str[fieldnameinfo] = "Este é o nome do campo, por exemplo 'Tamanho do Arquivo'";
$str[fielddesc] = "Descrição do Campo";
$str[fielddescinfo] = "Esta é a descrição do Campo, por exemplo 'Tamanho do Arquivo em Megabytes'";
$str[fieldadded] = "Seu novo Campo, <i>$form[name]</i> foi adicionado!";
$str[fieldedited] = "Seu novo Campo, <i>$form[name]</i> foi editado!";
$str[dfielderror] = "Você não selecionou nenum Campo para Apagar!";
$str[fieldsdel] = "Seus Campos selecionados foram apagados!";
$str[fmanageinfo] = "Você pode usar a seção de Gerenciamento de Ítens do paFileDB para adicionar, editar ou apagar ítens.<br><b>Dica:</b> Para as operações, tenha certeza que está logado com senha administrativa e navegue normalmente pelas categorias.";
$str[afile] = "Add Ítem";
$str[efile] = "Editar Ítem";
$str[dfile] = "Deletar ítem";
$str[upload] = "Enviar ítem";
$str[uploadinfo] = "Enviar este arquivo";
$str[uploaderror] = "O arquivo $userfile_name já existe! Por favor renomeie-o e tente novamente.";
$str[uploaddone] = "O arquivo $userfile_name foi enviado! A URL para o arquivo é";
$str[uploaddone2] = "Clique aqui para colocar esta URL no campo de URL.";
$str[filename] = "Nome do Ítem";
$str[filenameinfo] = "Este é o nome do ítem que você está adicionando, como 'paFileDB 3' ou 'Minha Figura.'";
$str[filesd] = "Descrição Abreviada";
$str[filesdinfo] = "Esta é a descrição abreviada do ítem. Será mostrada na página que lista os ítens da categoria, então esta descrição tem que ser curta";
$str[fileld] = "Descrição Longa";
$str[fileldinfo] = "Esta é a descrição longa do ítem. Será mostrado na página exclusiva do ítem";
$str[filecreator] = "Criador/Autor";
$str[filecreatorinfo] = "Este o nome de quem criou o ítem.";
$str[fileversion] = "Versão do ìtem";
$str[fileversioninfo] = "Esta é a versão do ítem, como 3.0 ou 1.3 Beta";
$str[filess] = "Screenshot URL";
$str[filessinfo] = "Esta é a URL para a imagem do ítem. Por exemplo, se você está adicionado uma skin de Winamp, esta deverá ser a URL para a imagem da skin no Winamp";
$str[filedocs] = "Documentação/URL do Manual";
$str[filedocsinfo] = "Esta é a URL da Documentação ou Manual do ítem";
$str[fileurl] = "URL do Download";
$str[fileurlinfo] = "Esta é a URL do ítem a ser baixado. Você pode digitar manualmente ou <a href=\"javascript:NewWindow('pafiledb.php?action=admin&ad=file&file=upload','fileupload','600','450','custom','front');\">Enviar o arquivo ao servidor</a>";
$str[filepi] = "Post Icon";
$str[filepiinfo] = "Você pode escolher um post icon para o ítem. O post icon será mostrado ao lado do ítem.";
$str[filecat] = "Categoria";
$str[filecatinfo] = "Esta é a Categoria a qual pertence o ítem.";
$str[filelicense] = "Licença";
$str[filelicenseinfo] = "Este é o Termo que deve ser acordado antes do Download.";
$str[filepin] = "Ítem Pin";
$str[filepininfo] = "Escolha se o ítem será discriminado como pin ou não. Os ítens Pin serão sempre mostrados no topo da lista.";
$str[fileadded] = "Seu novo ítem, <i>$form[name]</i> foi adicionado!";
$str[fileedited] = "Seu ítem, <i>$form[name]</i> foi editado!";
$str[fderror] = "Você não selecionou nenhum ítem para ser apagado!";
//You have reached Line 200. PHP Arena is not responsible for deaths related to sitting in front of your computer for a long time while translating this file.
$str[filesdeleted] = "Os ítens selecionados foram apagados!";
$str[lmanageinfo] = "Você pode usar a seção de Gerenciamento de Licença do paFileDB para adicionar, editar e deletar o Termo de Download. Você pode adicionar uma licença para um ítem. Se o ítem tem uma licença, o usuário tem que aceitá-la antes de efetuar o download.";
$str[alicense] = "Adicionar Licença";
$str[elicense] = "Editar Licença";
$str[dlicense] = "Deletar Licença";
$str[lname] = "Nome da Licença";
$str[ltext] = "Texto da Licença";
$str[licenseadded] = "Sua nova Licença, <i>$form[name]</i> foi adicionada!";
$str[licenseedited] = "Sua licença, <i>$form[name]</i> foi editada!";
$str[lderror] = "Você não selecionou nenhuma licença para deletar!";
$str[ldeleted] = "As Licenças selecionadas foram apagadas.";
$str[login] = "Login";
$str[username] = "Nome";
$str[password] = "Senha";
$str[loggedin] = "Você efetuou o Login com sucesso. <a href=\"pafiledb.php?action=admin&ad=main\">Clique Aqui</a> para acessar a Área Administrativa.";
$str[loginerror] = "Você digitou o Nome ou Senha Incorretos!";
$str[loggedout] = "Você fez o Logout com Sucesso.";
$str[changeemail] = "Mudar endereço de E-mail";
$str[emailad] = "Endereço de E-mail";
$str[confpass] = "Confirmar Senha";
$str[nopermission] = "Desculpe, você não tem permissão para usar esta área.";
$str[emailchanged] = "Seu E-mail foi alterado!";
$str[changepasserror] = "Sua senha e confirmação de senha não conferem. Volte e tente novamente";
$str[yourpasschanged] = "Sua Senha foi alterada!";
$str[dbname] = "Nome da Database";
$str[dbnameinfo] = "Este é o nome da database, como 'Windows Registry Hacks'";
$str[dbdesc] = "Descrição da Database";
$str[dbdescinfo] = "Esta é a descrição dos ítens contidos na database, como 'Registry hacks that make Windows useful";
$str[dburl] = "URL da Database";
$str[dburlinfo] = "Este é o diretório onde paFileDB está instalado";
$str[topnum] = "Top Ítens";
$str[topnuminfo] = "Este é o número de ítens que serão mostrados na tabela de Top Download Ítens";
$str[hpurl] = "URL da Homepage";
$str[hpurlinfo] = "Esta é a URl de sua Homepage";
$str[nfdays] = "Dias para Novos";
$str[nfdaysinfo] = "Quantos dias será mostrado o arquivo como Novo Ítem. Se indicado 5, então todos os ítens adicionados a menos de 5 dias serão indicados como Novos Ítens";
$str[timeoffset] = "Fuso Horário";
$str[timeoffsetinfo] = "Este é o Fuso Horário. Por exemplo, se o servidor está na zona Eastern time mas você quer o horário em Central Time, você tem que mudar para -1";
$str[tz] = "Zona de Horário";
$str[tzinfo] = "Esta é a Zona de Horário que será exibida";
$str[header] = "Header";
$str[headerinfo] = "O arquivo header é mostrado no cabeçalho dos resultados do paFileDB";
$str[footer] = "Footer";
$str[footerinfo] = "O arquivo footer é o rodapé dos resultados do paFileDB.";
$str[styleset] = "Estilo";
$str[stylesetinfo] = "Escolha o Estilo que quer usar";
$str[stats2] = "Mostrar Estatísticas";
$str[statsinfo] = "Escolha se quer mostrar as estatísticas de execução do script (Número total de MySQL queries e quanto tempo demorou para executar o script)";
$str[settingschanged] = "As configurações do paFileDB foram alteradas!";
$str[lang] = "Arquivo de Linguagem";
$str[langinfo] = "Selecione a Linguagem para usar em paFileDB.";

//Start Beta 2.1 Language File
$str[settings] = "Settings";
$str[pafdbsettings] = "paFileDB Settings";

//Start Beta 3 Language File 
$str[sortby] = "Listar por"; 
$str[sort] = "Listar"; 
$str[name] = "Nome"; 
$str[bdb] = "Backup de Database"; 
$str[rdb] = "Restaurar Database"; 
$str[rdbinfo] = "Você pode restaurar a Database do pafiledb3 criada anteriormente. <b>NOTA:</b> Isso irá DELETAR tudo o que existe na Database atual, inclusive informações administrativas!<p>Escolha um arquivo para restaurar:"; 
$str[rdbdone] = "Sua Database foi restaurada! Se as informações administrativas da database restaurada e sua antiga são diferentes, você pode fazer o login novamente, você deve criar o login novamente."; 
$str[home] = "Homepage";


?>