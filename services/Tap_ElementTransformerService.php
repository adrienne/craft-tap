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
        $attribute_configs = $element->getAttributeConfigs();
        $attributes = $element->getAttributes();

        $element = array();

        foreach ($attributes as $name => $value) {
            $attribute_config = $attribute_configs[$name];

            $element[$name] = $this->formatAttribute($value, $attribute_config);
        }

        return $element;
    }

    /**
     * Format Attribute
     *
     * @param mixed $value  Value
     * @param array $config Config
     *
     * @return mixed Value
     */
    public function formatAttribute($value, $config)
    {
        $value = ModelHelper::packageAttributeValue($value);

        switch ($config['type']) {
            case 'bool':
                settype($value, 'bool');
                break;
            case 'number':
                settype($value, ($config['decimals'] > 0) ? 'float' : 'integer');
                break;
        }

        return $value;
    }
}
