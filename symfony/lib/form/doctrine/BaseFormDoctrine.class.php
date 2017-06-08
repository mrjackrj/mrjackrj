<?php

/**
 * Project form base class.
 *
 * @package    mrjackrj
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormBaseTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class BaseFormDoctrine extends sfFormDoctrine
{
  public function setup()
  {
  	unset($this['created_at'], $this['updated_at']);
  }

  public function getErrors()
   {
     $errors = array();

     // individual widget errors
     foreach ($this as $form_field)
     {
       if ($form_field->hasError())
       {
         $error_obj = $form_field->getError();
         if ($error_obj instanceof sfValidatorErrorSchema)
         {
           foreach ($error_obj->getErrors() as $error)
           {
             // if a field has more than 1 error, it'll be over-written
             $errors[$form_field->getName()] = $error->getMessage();
           }
         }
         else
         {
           $errors[$form_field->getName()] = $error_obj->getMessage();
         }
       }
     }

     // global errors
     foreach ($this->getGlobalErrors() as $validator_error)
     {
       $errors[] = $validator_error->getMessage();
     }

     return $errors;
    }
}
