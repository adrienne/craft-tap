<?php

namespace Craft;

class Tap_ElementResourceController extends Tap_ResourceController
{
    /**
     * Get Element Type
     *
     * @param string $element Element
     *
     * @return string Element Type
     */
    protected function getElementType($element)
    {
        return str_replace(' ', '', ucwords(strtolower(str_replace('_', ' ', $element))));
    }

    /**
     * Get Query
     *
     * @return array Query
     */
    protected function getQuery()
    {
        return array_diff_key(craft()->request->getQuery(), array_flip(array('p')));
    }

    /**
     * Index Action
     *
     * @param string $element Element
     *
     * @return void
     */
    public function index($element)
    {
        try {
            $criteria = craft()->elements->getCriteria($this->getElementType($element));
        } catch (Exception $exception) {
            return $this->respondBadRequest();
        }

        $query = $this->getQuery();

        $criteria_attributes = $criteria->getAttributes();

        foreach ($query as $name => $value) {
            if (array_key_exists($name, $criteria_attributes)) {
                $criteria->{$name} = $value;
            }
        }

        list($pagination, $elements) = TemplateHelper::paginateCriteria($criteria);

        return $this->respond(array(
            'query'      => $query,
            'pagination' => $pagination,
            'elements'   => craft()->tap_elementTransformer->transformCollection($elements),
        ));
    }

    /**
     * Store Action
     *
     * @param string $element Element
     *
     * @return void
     */
    public function store($element)
    {
        //
    }

    /**
     * Show Action
     *
     * @param string $element Element
     * @param string $id      ID
     *
     * @return void
     */
    public function show($element, $id)
    {
        //
    }

    /**
     * Update Action
     *
     * @param string $element Element
     * @param string $id      ID
     *
     * @return void
     */
    public function update($element, $id)
    {
        //
    }

    /**
     * Destroy Action
     *
     * @param string $element Element
     * @param string $id      ID
     *
     * @return void
     */
    public function destroy($element, $id)
    {
        //
    }
}
