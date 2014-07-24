![](http://f.cl.ly/items/432N143b3r3H3L1Q2A1z/McLL8Xzni.png "craft-tap")

# craft-tap

HTTP RESTful Element API Plugin for Craft CMS

This plugin provides a means for you to *Tap* into your Craft installation programatically via HTTP in a RESTful fashion.

### Routes

Like Laravel's [Resource Controllers](http://laravel.com/docs/controllers#resource-controllers "Resource Controllers - Laravel"), routes are generated for a variety of RESTful actions. A controller dynamically handles these actions, and completes the Request. If you need to limit which actions are available for an Element, they can be defined in the configuration (See below).

Verb      | Path                | Action
:---      | :---                | :-----
GET       | /tap/{element}      | index
POST      | /tap/{element}      | store
GET       | /tap/{element}/{id} | show
PUT,PATCH | /tap/{element}/{id} | update
DELETE    | /tap/{element}/{id} | destroy

### Configuration

Seeing as how this plugin opens up a lot of functionality, it's only fitting that you have control over certain things. Here's a list of parameters you can define in your site's configuration.

Parameter | Type   | Default    | Description
:-------- | :---   | :--------- | :----------
prefix    | string | tap        | Specify a value to prefix Endpoints with
elements  | array  | array(...) | Define available element types, and their actions

> **Note:** You'll need to create a new config file here: `craft/config/tap.php`
