## A Skeleton MVC Framework with Advanced Routing
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

To Do:

### Models
- Create database and check connection
- Add an abstract Model and extend it in other Models.
### Configuration
- Put configuration settings in a separate file.
### Error Handling
- Create a mechanism to convert Errors to Exceptions.
- Categorize different tipe of errors.
- Add views to display error reports.
- Make a logging errors mechanism.