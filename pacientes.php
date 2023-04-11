<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="css/layout.css">
    <title>Pacientes</title>
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
                            <a class="nav-link" href="/pwII/mySqlObject/pacienteGer.php">Paciente</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/pwII/mySqlObject/EspecializacaoGer.php">Especialização</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/pwII/mySqlObject/Especializacoes.php">Especializações</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/pwII/mySqlObject/pacientes.php">Pacientes</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container" style="margin-top: 24px;">
        <table class="table table-primary table-striped">
            <thead>
                <tr>
                    <th scope="col">Ação</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Celular</th>
                </tr>
            </thead>
            <tbody>
                <?php
                spl_autoload_register(function ($class) {
                    require_once "./Classes/{$class}.class.php";
                });
                $paciente = new Paciente();
                $dadosBanco = $paciente->listar();
                while ($row = $dadosBanco->fetch_object()) {
                ?>
                    <tr>
                        <td>
                            <a href="pacienteGer.php?id=<?php echo $row->idPac ?>" class="btn btn-secundary"><span class="material-symbols-outlined">edit_square</span> </a>
                            <a href="#" class="btn btn-secundary"><span class="material-symbols-outlined">delete</span></a>
                        </td>
                        <td><img src="imagesPac/<?php echo $row->fotoPac; ?> " class="imgred" alt="Foto do Paciente <?php $row->fomePac; ?>"></td>
                        <td><?php echo $row->nomePac; ?> </td>
                        <td><?php echo $row->emailPac; ?> </td>
                        <td><?php echo $row->celularPac; ?> </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="col-12">
            <a href="pacienteGer.php" class="btn btn-primary">
                <span class="material-symbols-outlined">note_add</span>
            </a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>

</html>