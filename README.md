## A Skeleton MVC Framework with Advanced Routing and Contact Form
### Business Requirements
Create a basic website skeleton with a functional contact form.

### Delivery
The website is a basic application based on MVC design pattern. The
code is written on PHP and requires any Web Server to run. 
Twig framework is used as a templating engine and Twitter Bootstrap 4 as
a front-end templating framework. The form has a back-end string sanitizing
and validation mechanisms.

The website is deployed on appache server. [Demo](http://mvc.gorbich.com) site 
is available for a visual reference.

### Process

### Structure
- Create the MVC folder structure. Make public the web root directory.
### Routing
- Create a front controller (central entry point).
- Imply class autoloading and namespaces.
- Configure webserver to have vanity URLs.
- Create a router class.
- Create a routing table in the router class.
- Put routes to the front controller.
### Controllers and Actions
- Create an abstract controller and extend it in other controllers.
- Create action filter in the abstract controller.
- Put before() and after() filters to controllers.
- Create actions (methods) in controllers
- Create a dispatcher method in the router class.
### Views
- Upload and implement a template engine.
- Create a base view class.
- Crate base template and blocks.
- In controllers call views and pass parameters.