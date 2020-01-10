<?php

namespace Icube\Training\Plugin\Controller;

class Index
{
    public function beforeGetInformation(
        \Icube\Training\Controller\Index\Index $subject,
        $text,
        $optional = null
    ) {
        $text = ucwords($text);
        $text = "before {$text}";
        return [$text, ucwords($optional)];
    }

    public function aroundGetInformation(
        \Icube\Training\Controller\Index\Index $subject,
        callable $proceed,
        $text,
        $optional = null
    ) {
        $text = "aroundBefore {$text}";
        $result = $proceed($text, $optional);
        return "aroundAfter {$result}";
    }

    public function afterGetInformation(
        \Icube\Training\Controller\Index\Index $subject,
        $result,
        $text,
        $optional = null
    ) {
        return "after {$result}";
    }
}