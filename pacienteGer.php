<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Paciente</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">IFRO Clínica</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/pwII/mySqlObject/pacienteGer.php">Paciente</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/pwII/mySqlObject/EspecializacaoGer.php">Especialização</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/pwII/mySqlObject/Especializacoes.php">Especializações</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/pwII/mySqlObject/pacientes.php">Pacientes</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container" style="margin-top: 20px;">
            <?php
            spl_autoload_register(function ($class) {
                require_once "./Classes/{$class}.class.php";
            });

            if (filter_has_var(INPUT_POST, 'btnGravar')) {
                if (isset($_FILES['filFoto'])) {
                    $ext = strtolower(substr($_FILES['filFoto']['name'], -4));
                    $nomeArq = md5(date("Y.m.d-H.i.s")) . $ext;
                    $local = "imagesPac/";
                    move_uploaded_file($_FILES['filFoto']['tmp_name'], $local . $nomeArq);

                    $paciente = new Paciente();
                    $paciente->setNomePac(filter_input(INPUT_POST, 'txtNome'));
                    $paciente->setEnderecoPac(filter_input(INPUT_POST, 'txtEndereco'));
                    $paciente->setBairroPac(filter_input(INPUT_POST, 'txtBairro'));
                    $paciente->setCidadePac(filter_input(INPUT_POST, 'txtCidade'));
                    $paciente->setEstadoPac(filter_input(INPUT_POST, 'txtEstado'));
                    $paciente->setCepPac(filter_input(INPUT_POST, 'txtCep'));
                    $paciente->setNascimentoPac(filter_input(INPUT_POST, 'txtNascimento'));
                    $paciente->setCelularpac(filter_input(INPUT_POST, 'txtCelular'));
                    $paciente->setEmailPac(filter_input(INPUT_POST, 'txtEmail'));
                    $paciente->setFotoPac($nomeArq);
                    $paciente->inserir();
                }
            }

            ?>
            <form class="row g-3" action="<?php echo
                                            htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">


                <div class="col-12">
                    <label for="txtNome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="txtNome" placeholder="Digite seu nome..." name="txtNome">
                </div>
                <div class="col-12">
                    <label for="txtEndereco" class="form-label">Endereço</label>
                    <input type="text" class="form-control" id="txtEndereco" placeholder="Digite seu endereço..." name="txtEndereco">
                </div>

                <div class="col-12">
                    <label for="txtBairro" class="form-label">Bairro</label>
                    <input type="text" class="form-control" id="txtBairro" placeholder="Digite seu bairro..." name="txtBairro">
                </div>
                <div class="col-md-6">
                    <label for="txtCidade" class="form-label">Cidade</label>
                    <input type="text" class="form-control" id="txtCidade" placeholder="Digite sua cidade..." name="txtCidade">
                </div>
                <div class="col-md-4">
                    <label for="sltEstado" class="form-label">Estado</label>
                    <select id="sltEstado" class="form-select" name="sltEstado">
                        <option value="" selected hidden>Escolha...</option>

                    </select>
                </div>
                <div class="col-md-2">
                    <label for="txtCep" class="form-label">Cep</label>
                    <input type="text" class="form-control" id="txtCep" name="txtCep">
                </div>
                <div class="col-12">
                    <label for="txtEmail" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="txtEmail" placeholder="Digite seu email..." name="txtEmail">
                </div>
                <div class="col-md-6">
                    <label for="txtNascimento" class="form-label">Nascimento</label>
                    <input type="date" class="form-control" id="txtNascimento" name="txtNascimento">
                </div>
                <div class="col-md-6">
                    <label for="txtCelular" class="form-label">Celular</label>
                    <input type="text" class="form-control" id="txtCelular" name="txtCelular">
                </div>
                <div class="col-12">
                    <label for="filFoto" class="form-label">Adicione sua Foto</label>
                    <input class="form-control" type="file" id="filFoto" name="filFoto">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary" style="margin-top: 10px;" name="btnGravar">Gravar</button>
                </div>
            </form>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>

</html>