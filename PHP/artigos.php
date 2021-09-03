<?php

require_once "./Sistema/autoload.php";
require_once "./Sistema/Database/enviaResumo.php"

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monkay Resumos</title>
    <link rel="icon" href="./img/logomamacocortada.png">

    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Editor de BBCode -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
</head>

<body>
    <main style="padding: 10px;">
        <?php
            
        ?>

    <form method="GET" name="form" action=" ">
        <h1>
            Crie seu resumo com o editor abaixo: 
        </h1>
        <br>

        <p>Digite o título da matéria: 
        <input type="text" name="titulo" id="titulo" placeholder="Digite o título aqui..." maxlength="30" required></p>

        <p>Adicione o resumo abaixo:</p>
        <div id="editor" style="height: auto;">

        </div>

        <p>Adicione o link da imagem de fundo abaixo: </p>

        <input type="text" name="urlImagem" id="urlImagem" required>

        <p>Utilize o campo abaixo apenas para verificar se a url da imagem de fundo está correta</p>

        <div id="fundo" style="height: auto;" style="margin-top: 10px;">

        </div>

        <input type="text" id="resumo" name="resumo" style="display: none;">

        <button type="submit" onclick="pedro()" style="margin-top: 10px;">Enviar</button>
    </form>

    <?php
    
        if (empty($_GET['titulo']) || empty($_GET['resumo']) || empty($_GET['urlImagem'])) {
            echo "Vazios";
        } else {
            $clResumo = new Resumo();
            $clResumo->envia($_GET['titulo'], $_GET['resumo'], $_GET['urlImagem']);
        }

    
    ?>
          
    </main>

</body>

<script>
    function hamburguer() {
        var x = document.getElementById("navTopo");
        if (x.className === "topo") {
            x.className += " responsivo";
        } else {
            x.className = "topo";
        }
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/sceditor@3/minified/formats/bbcode.min.js"></script>
<script>
// Replace the textarea #example with SCEditor

var ferramentas= [
    ['bold', 'italic', 'underline', 'strike'],       
    ['blockquote', 'code-block'],

    [{ 'color': [] }, { 'background': [] }],         
    [{ 'font': [] }],
    [{ 'align': [] }],

    ['clean'],                                        
    ['image'] //add image here
];

var apenasImagem = [
    ['image']
]

var quill = new Quill('#editor', {
    theme: 'snow',
    modules: {
        toolbar: {
            container: ferramentas,
            handlers: {
                image: imageHandler
            }
        }
    },
});

var fundao = new Quill('#fundo', {
    theme: 'snow',
    modules: {
        toolbar: {
            container: apenasImagem,
            handlers: {
                image: imageHandler
            }
        }
    },
});

function imageHandler() {
    var range = this.quill.getSelection();
    var value = prompt('Coloque o url da imagem aqui');
    if(value){
        this.quill.insertEmbed(range.index, 'image', value, Quill.sources.USER);
    }
}

function pedro() {
    quill.update();
    fundao.update();
    var innerResumo = quill.root.innerHTML
    var urlImg = document.getElementById('urlImagem').value
    var url = '<img src=" '+ urlImg +' " alt="">'
    urlImg = url

    var editorInp = document.getElementById('resumo');
    editorInp.value = innerResumo
}

</script>

</html>