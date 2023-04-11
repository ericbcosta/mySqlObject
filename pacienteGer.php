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

            if (filter_has_var(INPUT_GET, "id")) {
                $id = filter_input(INPUT_GET, 'id');
                $paciente = new Paciente();
                $editPac = $paciente->buscar('idPac', $id);
            }

            if (filter_has_var(INPUT_POST, 'btnGravar')) {
                if (isset($_FILES['filFoto'])) {
                    $ext = strtolower(substr($_FILES['filFoto']['name'], PATHINFO_EXTENSION));
                    $nomeArq = filter_input(INPUT_POST, 'nomeAntigo');
                    if (empty($nomeArq)) {
                        $nomeArq = md5(date("Y.m.d-H.i.s")) . $ext;
                    }
                    $local = "imagesPac/";
                    move_uploaded_file($_FILES['filFoto']['tmp_name'], $local . $nomeArq);

                    $paciente = new Paciente();
                    $id = filter_input(INPUT_POST, 'txtId');
                    $paciente->setNomePac(filter_input(INPUT_POST, 'txtNome'));
                    $paciente->setEnderecoPac(filter_input(INPUT_POST, 'txtEndereco'));
                    $paciente->setBairroPac(filter_input(INPUT_POST, 'txtBairro'));
                    $paciente->setCidadePac(filter_input(INPUT_POST, 'txtCidade'));
                    $paciente->setEstadoPac(filter_input(INPUT_POST, 'sltEstado'));
                    $paciente->setCepPac(filter_input(INPUT_POST, 'txtCep'));
                    $paciente->setNascimentoPac(filter_input(INPUT_POST, 'txtNascimento'));
                    $paciente->setCelularpac(filter_input(INPUT_POST, 'txtCelular'));
                    $paciente->setEmailPac(filter_input(INPUT_POST, 'txtEmail'));
                    $paciente->setFotoPac($nomeArq);

                    if (empty($id)) {
                        $paciente->inserir();
                    } else {
                        $paciente->atualizar('idPac', $id);
                    }
                }
            }

            ?>
            <form class="row g-3" action="<?php echo
                                            htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">

                <input type="hidden" id="txId" name="txtId" value="<?php echo isset($editPac->idPac) ? $editPac->idPac : null; ?>">
                <input type="hidden" id="txId" name="nomeAntigo" value="<?php echo isset($editPac->fotoPac) ? $editPac->fotoPac : null; ?>">
                <div class="col-12">
                    <label for="txtNome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="txtNome" placeholder="Digite seu nome..." name="txtNome" value="<?php echo isset($editPac->nomePac) ? $editPac->nomePac : null; ?>">
                </div>
                <div class="col-12">
                    <label for="txtEndereco" class="form-label">Endereço</label>
                    <input type="text" class="form-control" id="txtEndereco" placeholder="Digite seu endereço..." name="txtEndereco" value="<?php echo isset($editPac->enderecoPac) ? $editPac->enderecoPac : null; ?>">
                </div>

                <div class="col-12">
                    <label for="txtBairro" class="form-label">Bairro</label>
                    <input type="text" class="form-control" id="txtBairro" placeholder="Digite seu bairro..." name="txtBairro" value="<?php echo isset($editPac->bairroPac) ? $editPac->bairroPac : null; ?>">
                </div>
                <div class="col-md-6">
                    <label for="txtCidade" class="form-label">Cidade</label>
                    <input type="text" class="form-control" id="txtCidade" placeholder="Digite sua cidade..." name="txtCidade" value="<?php echo isset($editPac->cidadePac) ? $editPac->cidadePac : null; ?>">
                </div>
                <div class="col-md-4">
                    <label for="sltEstado" class="form-label">Estado</label>
                    <?php $selectEstado = isset($editPac->estadoPac) ? $editPac->estadoPac : null; ?>
                    <select id="sltEstado" class="form-select" name="sltEstado">
                        <option value="">Selecione um estado</option>
                        <option value="AC" <?php if ($selectEstado == "AC") {
                                                echo 'selected';
                                            } ?>>Acre</option>
                        <option value="AL" <?php if ($selectEstado == "AL") {
                                                echo 'selected';
                                            } ?>>Alagoas</option>
                        <option value="AP" <?php if ($selectEstado == "AP") {
                                                echo 'selected';
                                            } ?>>Amapá</option>
                        <option value="AM" <?php if ($selectEstado == "AM") {
                                                echo 'selected';
                                            } ?>>Amazonas</option>
                        <option value="BA" <?php if ($selectEstado == "BA") {
                                                echo 'selected';
                                            } ?>>Bahia</option>
                        <option value="CE" <?php if ($selectEstado == "CE") {
                                                echo 'selected';
                                            } ?>>Ceará</option>
                        <option value="DF" <?php if ($selectEstado == "DF") {
                                                echo 'selected';
                                            } ?>>Distrito Federal</option>
                        <option value="ES" <?php if ($selectEstado == "ES") {
                                                echo 'selected';
                                            } ?>>Espírito Santo</option>
                        <option value="GO" <?php if ($selectEstado == "GO") {
                                                echo 'selected';
                                            } ?>>Goiás</option>
                        <option value="MA" <?php if ($selectEstado == "MA") {
                                                echo 'selected';
                                            } ?>>Maranhão</option>
                        <option value="MT" <?php if ($selectEstado == "MT") {
                                                echo 'selected';
                                            } ?>>Mato Grosso</option>
                        <option value="MS" <?php if ($selectEstado == "MS") {
                                                echo 'selected';
                                            } ?>>Mato Grosso do Sul</option>
                        <option value="MG" <?php if ($selectEstado == "MG") {
                                                echo 'selected';
                                            } ?>>Minas Gerais</option>
                        <option value="PA" <?php if ($selectEstado == "PA") {
                                                echo 'selected';
                                            } ?>>Pará</option>
                        <option value="PB" <?php if ($selectEstado == "PB") {
                                                echo 'selected';
                                            } ?>>Paraíba</option>
                        <option value="PR" <?php if ($selectEstado == "PR") {
                                                echo 'selected';
                                            } ?>>Paraná</option>
                        <option value="PE" <?php if ($selectEstado == "PE") {
                                                echo 'selected';
                                            } ?>>Pernambuco</option>
                        <option value="PI" <?php if ($selectEstado == "PI") {
                                                echo 'selected';
                                            } ?>>Piauí</option>
                        <option value="RJ" <?php if ($selectEstado == "RJ") {
                                                echo 'selected';
                                            } ?>>Rio de Janeiro</option>
                        <option value="RN" <?php if ($selectEstado == "RN") {
                                                echo 'selected';
                                            } ?>>Rio Grande do Norte</option>
                        <option value="RS" <?php if ($selectEstado == "RS") {
                                                echo 'selected';
                                            } ?>>Rio Grande do Sul</option>
                        <option value="RO" <?php if ($selectEstado == "RO") {
                                                echo 'selected';
                                            } ?>>Rondônia</option>
                        <option value="RR" <?php if ($selectEstado == "RR") {
                                                echo 'selected';
                                            } ?>>Roraima</option>
                        <option value="SC" <?php if ($selectEstado == "SC") {
                                                echo 'selected';
                                            } ?>>Santa Catarina</option>
                        <option value="SP" <?php if ($selectEstado == "SP") {
                                                echo 'selected';
                                            } ?>>São Paulo</option>
                        <option value="SE" <?php if ($selectEstado == "SE") {
                                                echo 'selected';
                                            } ?>>Sergipe</option>
                        <option value="TO" <?php if ($selectEstado == "TO") {
                                                echo 'selected';
                                            } ?>>Tocantins</option>

                    </select>
                </div>
                <div class="col-md-2">
                    <label for="txtCep" class="form-label">Cep</label>
                    <input type="text" class="form-control" id="txtCep" name="txtCep" value="<?php echo isset($editPac->cepPac) ? $editPac->cepPac : null; ?>">
                </div>
                <div class="col-12">
                    <label for="txtEmail" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="txtEmail" placeholder="Digite seu email..." name="txtEmail" value="<?php echo isset($editPac->emailPac) ? $editPac->emailPac : null; ?>">
                </div>
                <div class="col-md-6">
                    <label for="txtNascimento" class="form-label">Nascimento</label>
                    <input type="date" class="form-control" id="txtNascimento" name="txtNascimento" value="<?php echo isset($editPac->nascimentoPac) ? $editPac->nascimentoPac : null; ?>">
                </div>
                <div class="col-md-6">
                    <label for="txtCelular" class="form-label">Celular</label>
                    <input type="text" class="form-control" id="txtCelular" name="txtCelular" value="<?php echo isset($editPac->celularPac) ? $editPac->celularPac : null; ?>">
                </div>
                <div class="col-12">
                    <label for="filFoto" class="form-label">Adicione sua Foto</label>
                    <input class="form-control" type="file" id="filFoto" name="filFoto" value="<?php echo isset($editPac->fotoPac) ? $editPac->fotoPac : null; ?>">
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