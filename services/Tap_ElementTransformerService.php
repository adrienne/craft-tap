<?php

namespace Craft;

class Tap_ElementTransformerService extends BaseApplicationComponent
{
    /**
     * Transform Collection
     *
     * @param array $collection Collection
     *
     * @return array Collection
     */
    public function transformCollection(array $collection)
    {
        return array_map(array($this, 'transformElement'), $collection);
    }

    /**
     * Transform Element
     *
     * @param BaseElementModel $element Element
     *
     * @return array Element
     */
    public function transformElement($element)
    {
        return $element;
    }
}
