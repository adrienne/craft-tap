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

        $item['content'] = craft()->tap_modelTransformer->transformItem($content);

        return $item;
    }
}
