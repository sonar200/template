<?php


namespace Sonar200\Template;


use ReflectionClass;
use ReflectionException;

abstract class TemplateController
{
    public function __construct()
    {
        try {
            $currentClass = get_class($this);
            $reflection = new ReflectionClass($currentClass);

            Template::getInstance()->registerTemplatePath($reflection->getNamespaceName());
        } catch (ReflectionException $e) {

        }
    }

}