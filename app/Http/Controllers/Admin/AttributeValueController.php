<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AttributeValue;
use App\Contracts\AttributeContract;


class AttributeValueController extends Controller
{
    protected $attributeRepository;

    public function __construct(AttributeContract $attributeRepository)
    {
        $this->attributeRepository = $attributeRepository;
    }


    public function getValues(Request $request)
    {
        $attributeId = $request->id;
        $attribute = $this->attributeRepository->findAttributeById($attributeId);

        $values = $attribute->values;

        return response()->json($values);
    }

    public function addValues(Request $request)
    {
        $value = new AttributeValue();
        $value->attribute_id = $request->id;
        $value->value = $request->value;
        $value->price = $request->inputprice;
        $value->save();

        return response()->json($value);
    }

    public function updateValues(Request $request)
    {
        $attributeValue = AttributeValue::findOrFail($request->valueId);
        $attributeValue->attribute_id = $request->id;
        $attributeValue->value = $request->value;
        $attributeValue->price = $request->inprice;
        $attributeValue->save();

        return response()->json($attributeValue);
    }

    public function deleteValues(Request $request)
    {
        $attributeValue = AttributeValue::findOrFail($request->input('id'));
        $attributeValue->delete();

        return response()->json(['status' => 'success', 'message' => 'Attribute value deleted successfully.']);
    }
}
