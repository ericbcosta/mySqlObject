<?php
class Especializacao extends Crud
{
    protected $tabela = 'Especialidade';
    private $idEsp;
    private $nomeEsp;

    
	/**
	 * @return mixed
	 */
	public function inserir() {
        $nome = $this->getNomeEsp();

        $sqlInsert = "INSERT INTO $this->tabela (nomeEsp) VALUES('$nome')";

        if (Conexao::query($sqlInsert)) {
            header('location: Especializacoes.php');
        }
	}
	
	/**
	 *
	 * @param mixed $campo
	 * @param mixed $id
	 * @return mixed
	 */
	public function atualizar($campo, $id) {
        $nome = $this->getNomeEsp();

        $sqAtualizar = "UPDATE $this->tabela SET  nomeEsp = '$nome'";

        if (Conexao::query($sqAtualizar)) {
            header('location: Especializacoes.php');
        }

	}

	/**
	 * @return mixed
	 */
	public function getTabela() {
		return $this->tabela;
	}
	
	/**
	 * @param mixed $tabela 
	 * @return self
	 */
	public function setTabela($tabela): self {
		$this->tabela = $tabela;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getIdEsp() {
		return $this->idEsp;
	}
	
	/**
	 * @param mixed $idEsp 
	 * @return self
	 */
	public function setIdEsp($idEsp): self {
		$this->idEsp = $idEsp;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getNomeEsp() {
		return $this->nomeEsp;
	}
	
	/**
	 * @param mixed $nomeEsp 
	 * @return self
	 */
	public function setNomeEsp($nomeEsp): self {
		$this->nomeEsp = $nomeEsp;
		return $this;
	}
}