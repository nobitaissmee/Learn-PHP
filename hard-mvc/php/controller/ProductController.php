<?php


class ProductController
{

    public $productDB;

    /**
     * ProductController constructor.
     */
    public function __construct()
    {
        $conn = new DBConnection();
        $this->productDB = new ProductDB($conn->connect());
    }

    public function list()
    {
        $productLines = $this->productDB->getAll();
        include "php/views/product-list.php";
    }

    public function view()
    {
        $id = $_GET['id'];
        $product = $this->productDB->getById($id);
        include "php/views/product-view.php";
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            $productLine = new ProductLine();
            $productLine->setId($_POST['productLine']);
            $product = new Product();
            $product->setDateJoin($_POST['dateJoin']);
            $product->setName($_POST['name']);
            $product->setPrice($_POST['price']);
            $product->setProductLine($productLine);
            $result = $this->productDB->create($product);
            $mess = $result ? "Create Successful!!!" : "Create Unsuccessful!!!";
        }
        include "php/views/product-add.php";
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $productLine = $this->productDB->getById($id);
            include "php/views/product-edit.php";
        } else {
            $id = $_POST['id'];
            $productLine = new ProductLine();
            $productLine->setId($_POST['productLine']);
            $product = new Product();
            $product->setId($id);
            $product->setName($_POST['name']);
            $product->setDateJoin($_POST['dateJoin']);
            $product->setPrice($_POST['price']);
            $product->setProductLine($productLine);
            $result = $this->productDB->create($product);
            $mess = $result ? "Edit Successful!!!" : "Edit Unsuccessful!!!";
            header('Location: index.php');
        }
    }

    public function delete(){
        $id= $_GET['id'];
        $result = $this->productDB->delete($id);
        $mess = $result ? "Delete Successful!!!" : "Delete Unsuccessful!!!";
        header('Location: index.php');
    }
}
