<?php
class paciente extends Crud
{
    protected $tabela = 'Paciente';
    private $idPac;
    private $nomePac;
    private $enderecoPac;
    private $bairropac;
    private $cidadePac;
    private $estadoPac;
    private $cepPac;
    private $nascimentopac;
    private $emailPac;
    private $celularpac;
    private $fotoPac;


    /**
     * @return mixed
     */
    public function getIdPac()
    {
        return $this->idPac;
    }

    /**
     * @param mixed $idPac 
     * @return self
     */
    public function setIdPac($idPac): self
    {
        $this->idPac = $idPac;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNomePac()
    {
        return $this->nomePac;
    }

    /**
     * @param mixed $nomePac 
     * @return self
     */
    public function setNomePac($nomePac): self
    {
        $this->nomePac = $nomePac;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEnderecoPac()
    {
        return $this->enderecoPac;
    }

    /**
     * @param mixed $enderecoPac 
     * @return self
     */
    public function setEnderecoPac($enderecoPac): self
    {
        $this->enderecoPac = $enderecoPac;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBairropac()
    {
        return $this->bairropac;
    }

    /**
     * @param mixed $bairropac 
     * @return self
     */
    public function setBairropac($bairropac): self
    {
        $this->bairropac = $bairropac;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCidadePac()
    {
        return $this->cidadePac;
    }

    /**
     * @param mixed $cidadePac 
     * @return self
     */
    public function setCidadePac($cidadePac): self
    {
        $this->cidadePac = $cidadePac;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEstadoPac()
    {
        return $this->estadoPac;
    }

    /**
     * @param mixed $estadoPac 
     * @return self
     */
    public function setEstadoPac($estadoPac): self
    {
        $this->estadoPac = $estadoPac;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCepPac()
    {
        return $this->cepPac;
    }

    /**
     * @param mixed $cepPac 
     * @return self
     */
    public function setCepPac($cepPac): self
    {
        $this->cepPac = $cepPac;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNascimentopac()
    {
        return $this->nascimentopac;
    }

    /**
     * @param mixed $nascimentopac 
     * @return self
     */
    public function setNascimentopac($nascimentopac): self
    {
        $this->nascimentopac = $nascimentopac;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmailPac()
    {
        return $this->emailPac;
    }

    /**
     * @param mixed $emailPac 
     * @return self
     */
    public function setEmailPac($emailPac): self
    {
        $this->emailPac = $emailPac;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCelularpac()
    {
        return $this->celularpac;
    }

    /**
     * @param mixed $celularpac 
     * @return self
     */
    public function setCelularpac($celularpac): self
    {
        $this->celularpac = $celularpac;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFotoPac()
    {
        return $this->fotoPac;
    }

    /**
     * @param mixed $fotoPac 
     * @return self
     */
    public function setFotoPac($fotoPac): self
    {
        $this->fotoPac = $fotoPac;
        return $this;
    }
    /**
     * @return mixed
     */
    public function inserir()
    {
        $nome = $this->getNomePac();
        $endereco = $this->getEnderecoPac();
        $bairro = $this->getBairroPac();
        $cidade = $this->getCidadePac();
        $estado = $this->getEstadoPac();
        $cep = $this->getCepPac();
        $nascimento = $this->getNascimentoPac();
        $email = $this->getEmailPac();
        $celular = $this->getCelularPac();
        $foto = $this->getFotoPac();

        $sqlInsert = "INSERT INTO $this->tabela (nomePac,enderecoPac,bairroPac,cidadePac,estadoPac,cepPac,nascimentoPac,emailPac,celularPac,fotoPac) VALUES('$nome','$endereco',
'$bairro','$cidade','$estado','$cep','$nascimento','$email','$celular','$foto')";

        if (Conexao::query($sqlInsert)) {
            header('location: pacientes.php');
        }
    }

    /**
     *
     * @param mixed $campo
     * @param mixed $id
     * @return mixed
     */
    public function atualizar($campo, $id)
    {
        $nome = $this->getNomePac();
        $endereco = $this->getEnderecoPac();
        $bairro = $this->getBairroPac();
        $cidade = $this->getCidadePac();
        $estado = $this->getEstadoPac();
        $cep = $this->getCepPac();
        $nascimento = $this->getNascimentoPac();
        $email = $this->getEmailPac();
        $celular = $this->getCelularPac();
        $foto = $this->getFotoPac();

        $sqlAtualizar = "UPDATE $this->tabela SET  nomePac = '$nome', enderecoPac = '$endereco', bairroPac = '$bairro', cidadePac = '$cidade', estadoPac = '$estado', cepPac = '$cep', nascimentoPac = '$nascimento', emailPac = '$email', celularPac = '$celular', fotoPac = '$foto' WHERE $campo = {$id}";
        if (Conexao::query($sqlAtualizar)) {
            header('location: pacientes.php');
        }
    }
}
