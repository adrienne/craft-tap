<?php

namespace Craft;

class Tap_ElementResourceController extends Tap_ResourceController
{
    protected function getElementType($element)
    {
        return str_replace(' ', '', ucwords(strtolower(str_replace('_', ' ', $element))));
    }

    protected function getQuery()
    {
        return array_diff_key(craft()->request->getQuery(), array_flip(array('p')));
    }

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

    public function store($element)
    {
        //
    }

    public function show($element, $id)
    {
        //
    }

    public function update($element, $id)
    {
        //
    }

    public function destroy($element, $id)
    {
        //
    }
}
