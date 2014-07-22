<?php

namespace Craft;

class Tap_ElementResourceController extends Tap_ResourceController
{
    protected function getElementType($element)
    {
        return ucwords(strtolower($element));
    }

    public function index($element)
    {
        try {
            $criteria = craft()->elements->getCriteria($this->getElementType($element));
        } catch (Exception $exception) {
            return $this->respondBadRequest();
        }

        $elements = $criteria->find();

        return $this->respond(array(
            'elements' => craft()->tap_elementTransformer->transformCollection($elements),
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
