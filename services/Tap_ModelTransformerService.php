<?php

namespace Craft;

class Tap_ModelTransformerService extends BaseApplicationComponent
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
        return array_map(array($this, 'transformModel'), $collection);
    }

    /**
     * Transform Model
     *
     * @param BaseModel $model Model
     *
     * @return array Model
     */
    public function transformModel(BaseModel $model)
    {
        $attribute_configs = $model->getAttributeConfigs();
        $attributes = $model->getAttributes();

        $model = array();

        foreach ($attributes as $name => $value) {
            $attribute_config = $attribute_configs[$name];

            $model[$name] = $this->formatAttribute($value, $attribute_config);
        }

        return $model;
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
