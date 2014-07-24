<?php

namespace Craft;

class Tap_ElementResourceController extends Tap_ResourceController
{
    protected function getElementType($element)
    {
        return str_replace(' ', '', ucwords(strtolower(str_replace('_', ' ', $element))));
    }

    public function index($element)
    {
        try {
            $criteria = craft()->elements->getCriteria($this->getElementType($element));
        } catch (Exception $exception) {
            return $this->respondBadRequest();
        }

        list($pagination, $elements) = TemplateHelper::paginateCriteria($criteria);

        return $this->respond(array(
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
