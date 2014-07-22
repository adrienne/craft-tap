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
        return array_map(array($this, 'transformItem'), $collection);
    }

    /**
     * Transform Item
     *
     * @param BaseElementModel $model Model
     *
     * @return array Item
     */
    public function transformItem(BaseElementModel $model)
    {
        $item = craft()->tap_modelTransformer->transformItem($model);

        $content = $model->getContent();

        $fields = array_map(function (FieldLayoutFieldModel $model) {
            return $model->getField();
        }, $model->getFieldLayout()->getFields());

        foreach ($fields as $field) {
            $item[$field->handle] = $content->{$field->handle};
        }

        return $item;
    }
}
