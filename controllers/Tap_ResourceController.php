<?php

namespace Craft;

class Tap_ResourceController extends Tap_BaseController
{
    /**
     * Allow Anonymous Access to Actions
     *
     * @var boolean
     */
    protected $allowAnonymous = true;

    /**
     * Strip Variable Matches
     *
     * @param array $variables Variables
     *
     * @return array Variables
     */
    protected function stripVariableMatches(array $variables)
    {
        return array_diff_key($variables, array_flip(array('matches')));
    }

    /**
     * Build Arguments
     *
     * @param array $variables Variables
     *
     * @return array Arguments
     */
    protected function buildArguments(array $variables)
    {
        return array_values($this->stripVariableMatches($variables));
    }

    /**
     * Call Resource Action
     *
     * @param string $action    Action
     * @param array  $arguments Arguments
     *
     * @return void
     */
    protected function callResourceAction($action, array $arguments)
    {
        if (! method_exists($this, $action)) {
            return call_user_func_array(array($this, 'missingMethod'), $arguments);
        }

        return call_user_func_array(array($this, $action), $arguments);
    }

    /**
     * Index Action
     *
     * @param array $variables Variables
     *
     * @return void
     */
    public function actionIndex(array $variables)
    {
        return call_user_func(array($this, 'callResourceAction'), 'index', $this->buildArguments($variables));
    }

    /**
     * Store Action
     *
     * @param array $variables Variables
     *
     * @return void
     */
    public function actionStore(array $variables)
    {
        return call_user_func(array($this, 'callResourceAction'), 'store', $this->buildArguments($variables));
    }

    /**
     * Show Action
     *
     * @param array $variables Variables
     *
     * @return void
     */
    public function actionShow(array $variables)
    {
        return call_user_func(array($this, 'callResourceAction'), 'show', $this->buildArguments($variables));
    }

    /**
     * Update Action
     *
     * @param array $variables Variables
     *
     * @return void
     */
    public function actionUpdate(array $variables)
    {
        return call_user_func(array($this, 'callResourceAction'), 'update', $this->buildArguments($variables));
    }

    /**
     * Destroy Action
     *
     * @param array $variables Variables
     *
     * @return void
     */
    public function actionDestroy(array $variables)
    {
        return call_user_func(array($this, 'callResourceAction'), 'destroy', $this->buildArguments($variables));
    }

    /**
     * Missing Method
     *
     * @return void
     */
    public function missingMethod()
    {
        return $this->respondNotFound();
    }
}
