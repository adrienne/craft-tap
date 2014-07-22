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
            $criteria = craft()->elements->getCriteria($type);
        } catch (Exception $exception) {
            $this->respondBadRequest();
        }

        $results = $criteria->find();

        return $this->respond(craft()->tap_modelTransformer->transformCollection($results));
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
