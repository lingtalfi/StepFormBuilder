<?php


namespace StepFormBuilder\Step;


use OnTheFlyForm\OnTheFlyFormInterface;
use StepFormBuilder\Exception\StepFormBuilderException;

class OnTheFlyFormStep extends Step
{

    /**
     * @var OnTheFlyFormInterface $form
     */
    private $form;


    public function __construct()
    {
        $this->form = null;
    }


    public function isPosted()
    {
        $this->check();
        return $this->form->isPosted();
    }

    public function getModel(array $defaultValues)
    {
        $this->form->inject($defaultValues, true);
        return $this->form->getModel();
    }

    public function isValid(array $data)
    {
        return $this->form->validate();
    }

    public function inject(array $data)
    {
        return $this->form->inject($data);
    }

    public function getData()
    {
        return $this->form->getData();
    }





    //--------------------------------------------
    //
    //--------------------------------------------
    public function setForm(OnTheFlyFormInterface $form)
    {
        $this->form = $form;
        return $this;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private function check()
    {
        if (null === $this->form) {
            throw new StepFormBuilderException("OnTheFlyForm instance not set");
        }
    }
}


