<?
    $acao = 'read';
    require_once 'sistema/controller.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel='stylesheet' href='css/style.css'>
    <script>
        function apagar(id){
            location.href = 'index.php?acao=del&id='+id;
        }
        function editar(id,txt){
            let nota = document.getElementById("nota_"+id)
            let form = document.createElement("form");
            form.method = 'post';
            form.action = 'sistema/controller.php?acao=update&id='+id;
            form.classList = 'form';
            let textarea = document.createElement("textarea");
            textarea.type = 'text';
            textarea.value = txt;
            textarea.name = 'nota';
            textarea.cols = '30';
            textarea.rows = '10';
            textarea.classList = 'uptade'
            textarea.style = 'resize:none;'
            let btn = document.createElement('button');
            btn.type = 'submit';
            btn.innerHTML = 'Salvar';
            btn.classList = 'btn salvar'
            let inputId = document.createElement("input");
            inputId.type = 'hidden'
            inputId.value = id;

            form.appendChild(textarea);
            form.appendChild(btn);
            form.appendChild(inputId);
            nota.innerHTML = ''
            nota.insertBefore(form,nota[0])
        }
    </script>
    <title>Bloco de Notas</title>
</head>
<body>
    <nav>
        <h2>
            Bloco de Notas
        </h2>
        <label for="block"><i class="fas fa-plus"></i></label>
        <input type="checkbox" name="" id="block">
        <form action="sistema/controller.php?acao=create" method="post" class="block">
            <textarea name="nota" id="" cols="30" rows="10" style='resize:none;' placeholder="Escreva algo..."></textarea>
            <button type="submit">Salvar</button>
        </form>
    </nav>
    <div class="container">
    <? foreach($notas as $key => $value){?>
        <div class="nota">
            <div class="text" id='nota_<?echo $value->id?>'>
                <p><?= $value->nota?></p>
            </div>
            <div class="button">
                <button class='btn apagar' onclick="apagar(<?= $value->id?>)">Apagar</button>
                <button class='btn editar' onclick="editar(<?= $value->id?>,'<?= $value->nota?>')">Editar</button>
            </div>
        </div>
    <?}?>
    </div><!-- container -->
</body>
</html>