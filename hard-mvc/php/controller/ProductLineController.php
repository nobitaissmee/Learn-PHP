<?php

class ProductLineController
{
    public $productLineDB;

    /**
     * ProductLineController constructor.
     */
    public function __construct()
    {
        $conn = new DBConnection();
        $this->productLineDB = new ProductLineDB($conn->connect());
    }

    public function list()
    {
        $productLines = $this->productLineDB->getAll();
        include "php/views/list-productline.php";
    }

    public function view()
    {
        $id = $_GET['id'];
        $productLine = $this->productLineDB->getById($id);
        include "php/views/views-productline.php";
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            $productLine = new ProductLine();
            $productLine->setName($_POST['name']);
            $result = $this->productLineDB->create($productLine);
            $mess = $result ? "Create Successful!!!" : "Create Unsuccessful!!!";
        }
        include "php/views/add-productline.php";
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $productLine=$this->productLineDB->getById($id);
            include "php/views/edit-productline.php";
        }else{
            $id= $_POST['id'];
            $productLine=new ProductLine();
            $productLine->setName($_POST['name']);
            $productLine->setId($id);
            $result =$this->productLineDB->update($productLine);
            $mess = $result ? "Edit Successful!!!" : "Edit Unsuccessful!!!";
            header('Location: index.php');
        }
    }
}
