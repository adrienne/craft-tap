![](http://f.cl.ly/items/432N143b3r3H3L1Q2A1z/McLL8Xzni.png "craft-tap")

# craft-tap

HTTP RESTful Element API Plugin for Craft CMS

This plugin provides a means for you to *Tap* into your Craft installation programatically via HTTP in a RESTful fashion.

### Routes

Verb      | Path                | Action
:---      | :---                | :-----
GET       | /tap/{element}      | index
POST      | /tap/{element}      | store
GET       | /tap/{element}/{id} | show
PUT,PATCH | /tap/{element}/{id} | update
DELETE    | /tap/{element}/{id} | destroy

### Config

Parameter | Type   | Default    | Description
:-------- | :---   | :--------- | :----------
prefix    | string | tap        | Specify a value to prefix Endpoints with
elements  | array  | array(...) | Define available element types, and their actions
