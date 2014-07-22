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
        return array_map(array($this, 'transformItem'), $collection);
    }

    /**
     * Transform Item
     *
     * @param BaseModel $model Model
     *
     * @return array Item
     */
    public function transformItem(BaseModel $model)
    {
        $attribute_configs = $model->getAttributeConfigs();
        $attributes = $model->getAttributes();

        $item = array();

        foreach ($attributes as $name => $value) {
            $attribute_config = $attribute_configs[$name];

            $item[$name] = $this->transformAttribute($value, $attribute_config);
        }

        return $item;
    }

    /**
     * Transform Attribute
     *
     * @param mixed $value  Value
     * @param array $config Config
     *
     * @return mixed Value
     */
    public function transformAttribute($value, $config)
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
