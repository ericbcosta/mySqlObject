<div class="container">
<form class="row g-3" action="<?php echo
htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
enctype="multipart/form-data">
</form>
</div>

<div class="col-12">
 <label for="txtNome" class="form-label">Nome</label>
 <input type="text" class="form-control" id="txtNome"
placeholder="Digite seu nome..." name="txtNome">
</div>
<div class="col-12">
 <label for="txtEndereco" class="form-label">Endereço</label>
 <input type="text" class="form-control" id="txtEndereco"
placeholder="Digite seu endereço..." name="txtEndereco">
</div>

<div class="col-12">
 <label for="txtBairro" class="form-label">Bairro</label>
 <input type="text" class="form-control" id="txtBairro"
placeholder="Digite seu bairro..." name="txtBairro">
</div>
<div class="col-md-6">
 <label for="txtCidade" class="form-label">Cidade</label>
 <input type="text" class="form-control" id="txtCidade"
placeholder="Digite sua cidade..." name="txtCidade">
</div>
<div class="col-md-4">
 <label for="sltEstado" class="form-label">Estado</label>
 <select id="sltEstado" class="form-select" name="sltEstado">
 <option value="" selected hidden>Escolha...</option>

 </select>
</div>
<div class="col-md-2">
 <label for="txtCep" class="form-label">Cep</label>
 <input type="text" class="form-control" id="txtCep"
name="txtCep">
</div>
<div class="col-12">
 <label for="txtEmail" class="form-label">E-mail</label>
 <input type="email" class="form-control" id="txtEmail"
placeholder="Digite seu email..." name="txtEmail">
</div>
<div class="col-md-6">
 <label for="txtNascimento"
class="form-label">Nascimento</label>
 <input type="date" class="form-control" id="txtNascimento"
name="txtNascimento">
</div>
<div class="col-md-6">
 <label for="txtCelular" class="form-label">Celular</label>
 <input type="text" class="form-control" id="txtCelular"
name="txtCelular">
</div>
<div class="col-12">
 <label for="filFoto" class="form-label">Adicione sua Foto</label>
 <input class="form-control" type="file" id="filFoto"
name="filFoto">
</div>
<div class="col-12">
 <button type="submit" class="btn btn-primary"
name="btnGravar">Gravar</button>
</div>