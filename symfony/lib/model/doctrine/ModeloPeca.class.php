<?php

/**
 * ModeloPeca
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    mrjackrj
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class ModeloPeca extends BaseModeloPeca
{
  public function asJson() {
    return '{"id":'.$this->getId().',"nome":"'.$this->getPeca().'","preco_dinheiro":"'.$this->getPrecoDinheiro().'","preco_cartao":"'.$this->getPrecoCartao().'"}';
  }
}
