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

    public function actionIndex(array $variables)
    {
        $element = $variables['element'];

        $type = ucwords(strtolower($element));

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
