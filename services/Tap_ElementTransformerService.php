<?php

namespace Craft;

class Tap_ElementTransformerService extends BaseApplicationComponent
{
    public function transformCollection(array $collection)
    {
        return array_map(array($this, 'transformElement'), $collection);
    }

    public function transformElement($element)
    {
        return $element;
    }
}
