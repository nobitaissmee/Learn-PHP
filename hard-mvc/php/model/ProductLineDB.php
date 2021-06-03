<?php

class ProductLineDB{
    private $conn;

    /**
     * ProductLineDB constructor.
     * @param $conn
     */
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function create(ProductLine $productLine): bool
    {
        $sql="insert into `productlines`(`name`) values(?)";
        $statement=$this->conn->prepare($sql);
        $statement->bindParam(1,$productLine->getName());
        return $statement->execute() >0;
    }

    public function getAll(): array
    {
        $sql="select * from `productlines`";
        $statement=$this->conn->prepare($sql);
        $statement->execute();
        $result=$statement->fetchAll();
        $productLines=[];
        foreach ($result as $row){
            $productLine=new ProductLine();
            $productLine->setName($row['name']);
            $productLines[]=$productLine;
        }
        return $productLines;
    }

    public function getById($id): ProductLine
    {
        $sql ="select * from `productlines` where `id`=?";
        $statement=$this->conn->prepare($sql);
        $statement->bindParam(1,$id);
        $statement->execute();
        $row=$statement->fetch();
        $productLine=new ProductLine();
        $productLine->setName($row['name']);
        return $productLine;
    }

    public function update(ProductLine $productLine): bool
    {
        $sql="update `productlines` set `name` =? where `id`=?";
        $statement=$this->conn->prepare($sql);
        $statement->bindParam(1,$productLine->getName());
        $statement->bindParam(2,$productLine->getId());
        return $statement->execute() > 0;
    }

    public function delete($id): bool
    {
        $sql="delete from `productlines` where `id` =? ";
        $statement=$this->conn->prepare($sql);
        $statement->bindParam(1,$id);
        return $statement->execute() > 0;
    }
}
