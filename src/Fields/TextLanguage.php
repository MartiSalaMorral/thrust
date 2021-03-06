<?php

namespace BadChoice\Thrust\Fields;

class TextLanguage extends Text
{
    protected $displayInIndexCallback = null;
    protected $languages;
    public $showInIndex = false;
    public $showInEdit  = true;
    public $isTextArea  = false;
    public $textAreaRows = 5;

    public function languages($languages){
        $this->languages = $languages;
        return $this;
    }

    public function displayInEdit($object, $inline = false)
    {
        return view('thrust::fields.inputLanguage', [
            'inline'          => $inline,
            'languages'       => $this->languages,
            'title'           => $this->getTitle(),
            'type'            => $this->getFieldType(),
            'field'           => $this->field,
            'value'           => $this->getValue($object),
            'validationRules' => $this->getHtmlValidation($object, $this->getFieldType()),
            'attributes'      => $this->getFieldAttributes(),
            'description'     => $this->getDescription(),
            'isTextArea'      => $this->isTextArea,
            'textAreaRows'    => $this->textAreaRows,
        ])->render();
    }

    public function getValue($object)
    {
        return Field::getValue($object);
    }

    public function isTextArea($rows = null)
    {
        $this->isTextArea = true;
        $this->textAreaRows = $rows == null ? $this->textAreaRows : $rows;
        return $this;
    }
}
