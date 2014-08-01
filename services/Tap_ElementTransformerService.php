<?php

namespace Craft;

class Tap_ElementTransformerService extends Tap_ModelTransformerService
{
    /**
     * Transform Item
     *
     * @param BaseElementModel $model Model
     *
     * @return array Item
     */
    public function transformItem(BaseElementModel $model)
    {
        $type = craft()->elements->getElementType($model->getElementType());
        $content = $model->getContent();

        $attribute_configs = $content->getAttributeConfigs();
        $attributes = $content->getAttributes();

        $item = array();

        $item = array_replace(craft()->tap_modelTransformer->transformItem($model), $item);

        if ($type->hasTitles()) {
            $item['title'] = $this->transformAttribute($attributes['title'], $attribute_configs['title']);
        }

        if ($type->hasContent()) {
            $fields = array_map(function (FieldLayoutFieldModel $model) {
                return $model->getField();
            }, $model->getFieldLayout()->getFields());

            foreach ($fields as $field) {
                $item[$field->handle] = $this->transformAttribute($model->{$field->handle}, $attribute_configs[$field->handle]);
            }
        }

        if ($type->hasStatuses()) {
            $item['status'] = $model->getStatus();
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
    public function transformAttribute($value, array $config)
    {
        if ($value instanceof ElementCriteriaModel) {
            $value = $this->transformCollection($value->find());
        }

        $value = parent::transformAttribute($value, $config);

        return $value;
    }
}
