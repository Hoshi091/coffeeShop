<?php

namespace PO\Lib;
use PDO;

class DB
{
    private $host = "localhost";
    private $port = 3306;
    private $username = "root";
    private $password = "";
    private $dbName = "coffeeshop_db";

    private \PDO $connection;

    public function __construct(
        string $host = "",
        int $port = 3306,
        string $username = "",
        string $password = "",
        string $dbName = ""
    )
    {
        if(!empty($host)) {
            $this->host = $host;
        }

        if(!empty($port)) {
            $this->port = $port;
        }

        if(!empty($username)) {
            $this->username = $username;
        }

        if(!empty($password)) {
            $this->password = $password;
        }

        if(!empty($dbName)) {
            $this->dbName = $dbName;
        }

        try {
            $this->connection = new \PDO(
                "mysql:host=$this->host;dbname=$this->dbName;charset=utf8mb4",
                $this->username,
                $this->password
            );
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch(\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function insertMenuRecord(string $pageName, string $url): bool
    {
        $sql = "INSERT INTO menu(page_name, page_url) VALUE ('" . $pageName . "', '" . $url . "')";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }

    public function getMenuItems(): array
    {
        $sql = "SELECT page_name, page_url FROM menu";
        $query = $this->connection->query($sql);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);
        $finalMenu = [];

        foreach ($data as $menuItem) {
            $finalMenu[$menuItem['page_name']] = $menuItem['page_url'];
        }

        return $finalMenu;
    }

    public function getMenu(): array
    {
        $sql = "SELECT * FROM menu";
        $query = $this->connection->query($sql);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);

        return $data;
    }

    public function getMenuItem(int $id): array
    {
        $sql = "SELECT * FROM menu WHERE id = ".$id;
        $query = $this->connection->query($sql);
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        return $data;
    }

    public function deleteMenuItem(int $id): bool
    {
        $sql = "DELETE FROM menu WHERE id = ".$id;
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }

    public function updateMenuItem(int $id, string $pageName = "", string $url = ""): bool
    {
        $sql = "UPDATE menu SET ";

        if(!empty($pageName)) {
            $sql .= " page_name = '" . $pageName . "'";
        }

        if(!empty($url)) {
            $sql .= ", page_url = '" . $url . "'";
        }

        $sql .= " WHERE id = ". $id;

        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }


    public function getDailyMenu() :array {
        $sql = "SELECT * FROM daily_menu";
        $query = $this->connection->query($sql);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);



        return $data;
    }
    public function getDailyMenuItem(int $id): array
    {
        $sql = "SELECT * FROM daily_menu WHERE id = ".$id;
        $query = $this->connection->query($sql);
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        return $data;
    }


    public function deleteDailyMenuItem(int $id){
        $sql = "DELETE FROM daily_menu WHERE id = ".$id;
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }

    public function insertDailyMenuItem(string $menuText): bool
    {
        $sql = "INSERT INTO daily_menu(menu_name) VALUE ('" . $menuText ."')";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }
    public function updateDailyMenuItem(int $id, string $menu_text = ""): bool
    {
        $sql = "UPDATE daily_menu SET ";

        if(!empty($menu_text)) {
            $sql .= " menu_name = '" . $menu_text . "'";
        }

        $sql .= " WHERE id = ". $id;

        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }


    public function getPopularItems(): array {
        $sql = "SELECT popular_items.drink_id as drink_id, drink.name as name, drink.description as description, drink.img_url as img FROM drink INNER JOIN popular_items ON drink.id=popular_items.drink_id ORDER BY RAND()";
        $query = $this->connection->query($sql);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);
        $popularItems = [];

        foreach ($data as $drinkItem) {
            $popularItems[] = [
                'drink_id' => $drinkItem['drink_id'],
                'name' => $drinkItem['name'],
                'description' => $drinkItem['description'],
                'img' => $drinkItem['img']
            ];
        }

        return $popularItems;
    }

    public function updatePopularItems(array $selectedItems): void {
        $sqlDelete = "DELETE FROM popular_items";
        $this->connection->query($sqlDelete);
        $sql = "INSERT INTO popular_items (drink_id) VALUES (:drinkID)";
        $stmt = $this->connection->prepare($sql);

        foreach ($selectedItems as $drinkID) {
            $stmt->bindValue(':drinkID', $drinkID, PDO::PARAM_INT);
            $stmt->execute();
        }
    }
    public function isPopularItem(int $drinkID): bool {
        $sql = "SELECT COUNT(*) FROM popular_items WHERE drink_id = :drinkID";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':drinkID', $drinkID, PDO::PARAM_INT);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        return ($count > 0);
    }
    public function getDrinks() :array {
        $sql = "SELECT * FROM drink";
        $query = $this->connection->query($sql);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);

        return $data;
    }
    public function getDrink(int $id): array
    {
        $sql = "SELECT * FROM drink WHERE id = ".$id;
        $query = $this->connection->query($sql);
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        return $data;
    }

    public function deleteDrinkMenuItem(int $id): bool
    {
        $sql = "DELETE FROM drink WHERE id = ".$id;
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }

    public function insertDrinkMenuItem(string $name, string $description, string $price,string $drink_cat,string $img_url): bool
    {
        $sql = "INSERT INTO drink(name, description, price, drink_category_id, img_url) VALUE ('" . $name . "', '" . $description . "', '".$price."', '".$drink_cat."','".$img_url."')";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }

    public function updateDrinkMenuItem(int $id, string $name = "", string $description = "", string $price = "", string $drink_cat = "",string $img_url = ""): bool
    {
        $sql = "UPDATE drink SET ";

        if (!empty($name)) {
            $sql .= " name = '" . $name . "'";
        }

        if (!empty($description)) {
            $sql .= ", description = '" . $description . "'";
        }

        if (!empty($price)) {
            $sql .= ", price = '" . $price . "'";
        }

        if (!empty($drink_cat)) {
            $sql .= ", drink_category_id = '" . $drink_cat . "'";
        }

        if (!empty($img_url)) {
            $sql .= ", img_url = '" . $img_url . "'";
        }

        $sql .= " WHERE id = " . $id;

        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }

    public function getCategories() :array {
        $sql = "SELECT * FROM drink_category";
        $query = $this->connection->query($sql);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);


        return $data;
    }
    public function getCategory(int $id): array
    {
        $sql = "SELECT * FROM drink_category WHERE id = ".$id;
        $query = $this->connection->query($sql);
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        return $data;
    }

    public function updateCategory(int $id, string $name = "", string $description = ""): bool
    {
        $sql = "UPDATE drink_category SET ";

        if (!empty($name)) {
            $sql .= " name = '" . $name . "'";
        }

        if (!empty($description)) {
            $sql .= ", description = '" . $description . "'";
        }

        $sql .= " WHERE id = " . $id;

        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }

    public function deleteCategory(int $id): bool
    {
        $sql = "DELETE FROM drink_category WHERE id = ".$id;
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }
    public function insertCategory(string $name, string $description): bool
    {
        $sql = "INSERT INTO drink_category(name, description) VALUE ('" . $name . "', '" . $description . "')";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }

    public function filterDrinksByCategory(): array{
        $category_id = $_GET['category_id'];
        $sql = "SELECT * FROM drink WHERE drink_category_id = " . $category_id;
        $query = $this->connection->query($sql);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);

        return $data;
    }

}