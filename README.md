# HIS
## Hospital Information System
## User Documentation
- ### Clone Repository
  - Clone All files into xampp folder
  - Make sure your MySQL port is 3307, or change it from `app/config/dp.php`
  ```
  3|   $dsn = 'mysql:host=localhost;port=3307;dbname=his';
  4|   $user = 'root';
  5|   $pass = '';
  ```
  you can change it to your port, or delete it if your port is the default (3306)
  ```
  3|   $dsn = 'mysql:host=localhost;dbname=his';
  ```

- ### Import Database
  - Open **php My Admin** by getting into `localhost/phpmyadmin`
  - Build a new Database called `his`
  - Import database from the file `his.sql`

- ### Open Website in Browser
  - Get into `localhost/his`
  - You can also write `localhost/his/home/index`
- ### Now You are ready to use the website

## Developer Documentation
We decided to use MVC Design Pattern to Develop This Website. The File `.htaccess` gets any Request to the Domain with `/his` after the Domain Name and open the `index.php` file.
This file takes The the url, and detect the controller and action in this pattern `domainName.com/his/controller/action/parametersList`.

To change it into `DomainName.com/Concontroller/action/parametersList` you would need to make a little change in the `index.php` file.
1. Change The limit in `explode()` function in Line 10, from `4` to `3` 
```
10|     $url = explode("/", $url, 3);
```
2. Delete The Line 12
```
12|    array_shift($url);
```

- ### How to Built a new View
  - Navigate into `app/views/` and find the suitable controller and navigate into it, or make new directory.
  - Make new file with the name of view with `.view.php`, for example `example.view.php`.
  - Navigate into `app/controllers` and open the controller you used, or create new one with the name you used, with `controller.php`, for example `examplecontroller.php`.
  - Include the Abstract Controller then Build a class named after the controller and extend from the abstract
  ```
  include "abstractcontroller.php";

  class example extends AbstractController
  {
 
  }
  ```
  - Create a function named after the View, and its body MUST contain `$this->view();`
  ```
  public finction example()
  {
    $this->view();
  }
  ```
  - Now you can type HTML tags in the view file, and 
- ### Variables 
  - **$title**: This is the Title of The Page That appear in the Tap
  ```
  <title>$title</title>
  ```
  - **`$param`**: This Variable refers to the parameters list in The URL.
  - **`$noNav`** and **`$noFooter`**: if one of these variables is set, Then The nav/footer wouldn't be rendered.
  - **`$page`**: This Variables detect the page that would have the class active in the navigation bar.
  - **`$allowed`**: This Array Determine the Autentication of this page, be detecting the allowed users who can access it. We determine them by `$_SESSION['auth']` array.
- ### Functions
  - **`getTitle()`**: Writes The variable `$title` in The Title of The Page.
  - **`setActive($pageName)`**: Takes the $pageName and compare with the variable `$page`, if they are equal then this page is active in The Navigation bar
  - **`AbstractController::notfound()`**: This function is auto called when the request is missed, it render The 404 Error Page
  - **`AbstractController::view()`**: This Function Search for The Controller and Action's view, then it render the Header, nav, body and footer. If the view is not found, it renders the 404 Error page.
  - **`AbstractController::isAuthorized(array $alloweds)`**: This function automatically takes `$_SESSION['auth']` and search in it if the user is allowed to enter This Page. It return `true` if he is allowed, otherwise returns `false`.
  - **`lang($word)`**: This Function returns the word in the language that the user use the website in.
- ### Variebles, Function and Files Naming
  - All The Variables are Wriiten in Camel Case.
  - All Function **Exept The Action function** are witten in Camel Case
  - All Action Function are written completely in small case.
  - All Files **Ecepct The Models Files** and Folders are written in small case.
  - All Models Files are Written In Camel Case.
  - All Keys of the function `lang()` are written Completely small, separted be `underscore (_)`
