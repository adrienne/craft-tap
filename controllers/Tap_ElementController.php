<?php

namespace Craft;

class Tap_ElementController extends Tap_BaseController
{
    /**
     * Allow Anonymous Access to Actions
     *
     * @var boolean
     */
    protected $allowAnonymous = true;

    protected function getElementTypeFromActionVariables(array $variables)
    {
        if (! array_key_exists('element', $variables)) {
            return false;
        }

        $element = $variables['element'];

        return ucwords(strtolower($element));
    }

    public function actionIndex(array $variables)
    {
        $type = $this->getElementTypeFromActionVariables($variables);

        try {
            $elements = craft()->elements->getCriteria($type)->find();
        } catch (Exception $exception) {
            $this->respondBadRequest();
        }

        $content = array_map(function ($element) {
            return $element->getContent();
        }, $elements);

        $data = array(
            'elements' => array_replace_recursive(craft()->tap_modelTransformer->transformCollection($elements), craft()->tap_modelTransformer->transformCollection($content)),
        );

        return $this->respond($data);
    }

    public function actionStore(array $variables)
    {
        return $this->returnJson(array(
            'action'    => 'store',
            'variables' => $variables,
        ));
    }

    public function actionShow(array $variables)
    {
        return $this->returnJson(array(
            'action'    => 'show',
            'variables' => $variables,
        ));
    }

    public function actionUpdate(array $variables)
    {
        return $this->returnJson(array(
            'action'    => 'update',
            'variables' => $variables,
        ));
    }

    public function actionDestroy(array $variables)
    {
        return $this->returnJson(array(
            'action'    => 'destroy',
            'variables' => $variables,
        ));
    }
}
