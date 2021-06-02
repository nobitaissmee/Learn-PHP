<?php
require_once("db.php");
require_once("component.php");

$con = createDb();

//button click

if (isset($_POST['create'])) {
    createData();
}

if (isset($_POST['update'])) {
    updateData();
}

if (isset($_POST['delete'])) {
    deleteData();
}

if (isset($_POST['deleteAll'])) {
    deleteAllData();
}

function textBoxValue($value)
{
    $textBox = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
    if (empty($textBox)) {
        return false;
    } else {
        return $textBox;
    }
}

function textNode($className, $msg)
{
    $element = "<h6 class='$className'>$msg</h6>";
    echo $element;
}

//CREATE date to DB
function createData()
{
    $name = textBoxValue("name");
    $publisher = textBoxValue("publisher");
    $price = textBoxValue("price");

    if ($name && $price && $publisher) {
        $sql = "insert into books(name,publisher,price) values ('$name','$publisher','$price')";

        if (mysqli_query($GLOBALS['con'], $sql)) {
            textNode("success", "Create Success!");
        } else {
            echo "Error";
        }
    } else {
        textNode("error", "Provide data in textBox");
    }
}

//Read data in DB
function readData()
{
    $sql = "select * from books";

    return mysqli_query($GLOBALS['con'], $sql);
}

//UPDATE date in DB
function updateData()
{
    $id = textBoxValue("id");
    $name = textBoxValue("name");
    $publisher = textBoxValue("publisher");
    $price = textBoxValue("price");

    if ($name && $price && $publisher && $id) {
        $sql = "update books set name='$name',publisher='$publisher',price='$price' where id='$id'";

        if (mysqli_query($GLOBALS['con'], $sql)) {
            textNode("success", "Update Success!");
        } else {
            textNode("error", "Enable to update data");
        }
    } else {
        textNode("error", "Select data using edit icon");
    }
}

//DELETE date in DB

function deleteData()
{
    $id = textBoxValue("id");
    $sql = "delete from books where id ='$id'";

    if (mysqli_query($GLOBALS['con'], $sql)) {
        textNode("success", "Delete Success");
    } else {
        textNode("error", "Delete Failed");
    }
}

function deleteAllData(){
    $sql ="drop table books";
    if (mysqli_query($GLOBALS['con'],$sql)){
        textNode("success","Delete Success");
    }else{
        textNode("error","Delete Failed");
    }
}



