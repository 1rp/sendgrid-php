<?php namespace SendGrid\Mail;

class ClickTracking implements \JsonSerializable
{
    private $enable;
    private $enable_text;

    public function __construct($enable, $enable_text = null)
    {
        $this->setEnable($enable);
        $this->setEnableText($enable_text);
    }

    public function setEnable($enable)
    {
        $this->enable = $enable;
    }

    public function getEnable()
    {
        return $this->enable;
    }

    public function setEnableText($enable_text)
    {
        $this->enable_text = $enable_text;
    }

    public function getEnableText()
    {
        return $this->enable_text;
    }

    public function jsonSerialize()
    {
        return array_filter(
            [
                'enable'      => $this->getEnable(),
                'enable_text' => $this->getEnableText()
            ],
            function ($value) {
                return $value !== null;
            }
        ) ?: null;
    }
}
