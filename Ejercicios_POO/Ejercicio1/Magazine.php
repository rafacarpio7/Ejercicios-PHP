<?php

class Magazine extends ReadingMaterial
{
    private $additionalResources;

    public function __construct($additionalResources,$title,$pages,$price,$editor)
    {
        $this->additionalResources=$additionalResources;
        parent::__construct($title,$pages,$price,$editor);
    }

    public function get_AdditionalResources()
    {
        return $this->additionalResources;
    }

    public function set_AdditionalResources($additionalResources)
    {
        $this->additionalResources=$additionalResources;
    }
}

?>