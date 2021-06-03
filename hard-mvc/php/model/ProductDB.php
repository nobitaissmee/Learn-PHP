<?php

class ProductDB
{
    private $conn;

    /**
     * ProductDB constructor.
     * @param $conn
     */
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function create(Product $product): bool
    {
        $sql = "insert into `products`(`date_join`,`name`,`price`,`id_productline`) values (?,?,?,?)";
        $statement = $this->conn->prepare($sql);
        $statement->bindParam(1, $product->getDateJoin());
        $statement->bindParam(2, $product->getName());
        $statement->bindParam(3, $product->getPrice());
        $statement->bindParam(4, $product->getProductLine()->getId());
        return $statement->execute() > 0;
    }

    public function getAll(): array
    {
        $sql = "select p.*, pl.name as name_productline from `products` p inner join `productlines` pl on pl.id=p.id_product";
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $products = [];
        foreach ($result as $row) {
            $productline = new ProductLine();
            $productline->setId($row['id_productline']);
            $productline->setName($row['name_productline']);
            $product = new Product();
            $product->setDateJoin($row['date_join']);
            $product->setName($row['name']);
            $product->setPrice($row['price']);
            $product->setProductLine($productline);
            $products[] = $product;
        }
        return $products;
    }

    public function getById($id): Product
    {
        $sql = "select p.*, pl.name as name_productline from `products` p inner join `productlines` pl on pl.id=p.id_product where p.id=?";
        $statement = $this->conn->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
        $row = $statement->fetch();
        $productline = new ProductLine();
        $productline->setName($row['name_productline']);
        $productline->setId($row['id_productline']);
        $product = new Product();
        $product->setDateJoin($row['date_join']);
        $product->setName($row['name']);
        $product->setPrice($row['price']);
        $product->setProductLine($productline);
        return $product;
    }

    public function update(Product $product): bool
    {
        $sql="update `products` set `date_join`= ? ,`name`= ? ,`price`= ?,`id_productline`= ? where `id`= ?";
        $statement = $this->conn->prepare($sql);
        $statement->bindParam(1, $product->getDateJoin());
        $statement->bindParam(2, $product->getName());
        $statement->bindParam(3, $product->getPrice());
        $statement->bindParam(4, $product->getProductLine()->getId());
        $statement->bindParam(5, $product->getId());
        return $statement->execute() > 0;
    }

    public function delete($id): bool
    {
        $sql="delete from `products` where `id` =? ";
        $statement=$this->conn->prepare($sql);
        $statement->bindParam(1,$id);
        return $statement->execute() > 0;
    }
}
