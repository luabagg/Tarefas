<?php

final class TarefaVO extends VO
{

    private $nome;
    private $descricao;
    private $abertura;
    private $prazo;
    private $status;
    private $idCategoria;
    private $nomeCategoria;
    private $idResponsavel;
    private $nomeResponsavel;
    private $emailResponsavel;

    public function __construct($id = 0, $nome = "", $descricao = "", $abertura = "", $prazo = "", $status = "", $idCategoria = 0, $nomeCategoria = "", $idResponsavel = 0, $nomeResponsavel = "", $emailResponsavel = "")
    {
        parent::__construct($id);
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->abertura = $abertura;
        $this->prazo = $prazo;
        $this->status = $status;
        $this->idCategoria = $idCategoria;
        $this->nomeCategoria = $nomeCategoria;
        $this->idResponsavel = $idResponsavel;
        $this->nomeResponsavel = $nomeResponsavel;
        $this->emailResponsavel = $emailResponsavel;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getAbertura()
    {
        return $this->abertura;
    }

    public function setAbertura($abertura)
    {
        $this->abertura = $abertura;
    }

    public function getPrazo()
    {
        return $this->prazo;
    }

    public function setPrazo($prazo)
    {
        $this->prazo = $prazo;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    public function setIdCategoria($idCategoria)
    {
        $this->idCategoria = $idCategoria;
    }

    public function getNomeCategoria()
    {
        return $this->nomeCategoria;
    }

    public function setNomeCategoria($nomeCategoria)
    {
        $this->nomeCategoria = $nomeCategoria;
    }

    public function getIdResponsavel()
    {
        return $this->idResponsavel;
    }

    public function setIdResponsavel($idResponsavel)
    {
        $this->idResponsavel = $idResponsavel;
    }

    public function getNomeResponsavel()
    {
        return $this->nomeResponsavel;
    }

    public function setNomeResponsavel($nomeResponsavel)
    {
        $this->nomeResponsavel = $nomeResponsavel;
    }

    public function getEmailResponsavel()
    {
        return $this->emailResponsavel;
    }

    public function setEmailResponsavel($emailResponsavel)
    {
        $this->emailResponsavel = $emailResponsavel;
    }
}
