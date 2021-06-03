<?php

class Product{
    private $id;
    private $dateJoin;
    private $name;
    private $price;
    private ProductLine $productLine;

    /**
     * Product constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDateJoin()
    {
        return $this->dateJoin;
    }

    /**
     * @param mixed $dateJoin
     */
    public function setDateJoin($dateJoin): void
    {
        $this->dateJoin = $dateJoin;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return ProductLine
     */
    public function getProductLine(): ProductLine
    {
        return $this->productLine;
    }

    /**
     * @param ProductLine $productLine
     */
    public function setProductLine(ProductLine $productLine): void
    {
        $this->productLine = $productLine;
    }
}
