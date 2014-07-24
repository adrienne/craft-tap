# craft-tap

HTTP RESTful Element API Plugin for Craft CMS

This plugin provides a means for you to *Tap* into your Craft installation programatically via HTTP in a RESTful fashion.

### Routes

Verb      | Path                | Action
:-------- | :------------------ | :------
GET       | /tap/{element}      | index
POST      | /tap/{element}      | store
GET       | /tap/{element}/{id} | show
PUT,PATCH | /tap/{element}/{id} | update
DELETE    | /tap/{element}/{id} | destroy
