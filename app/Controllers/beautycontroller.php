<?php

include 'abstractcontroller.php';

class beauty extends AbstractController
{
    public function index() {
        $this->view();
    }

    public function edit() {
        if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
            $id = Request::post("id");
            $name = Request::post("name");

            $permission = new permissionModel($id);
            $permission->update($name);

            Redirect::to("permissions");
        } else {
            global $param;
            $id = $param[0];
            $permission = new permissionModel( $id );
            
            $this->data['permission'] = $permission;

            $this->view();
        }
    }

    public function addservice() {
        if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
            $name = Request::post('name');
            $price = Request::post('price');
            $currency = Request::post('currency');
            $image = Request::files('image');
            $image = base64_encode( file_get_contents( $image['tmp_name'] ) );

            $data = [
                "name" => $name,
                "price" => $price,
                "currency" => $currency,
                "image" => $image 
            ];
            $api = new API();

            $api->setData( $data );
            $api->setUrl("http://localhost/mvc/home/index");
            $api->setMethod("POST");
            
            $api->execute();
        } else {
            Asset::addCss("css/dropzone.min.css");
            Asset::addJs("js/dropzone.min.js");

            $this->view();
        }
    }
}