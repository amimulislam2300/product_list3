<?php
$conn =mysqli_connect('localhost','root','','factory');

if(isset($_POST['btn'])){
    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];

    $conn->query("Call brand_add('$name','$address','$contact')");
}

if(isset($_POST['addBtn'])){
    $bname=$_POST['bname'];
    $price = $_POST['price'];
    $bid = $_POST['productList'];

    $conn->query("Call product_add('$bname','$price','$bid')");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factory</title>
</head>
<body>
    <h2>Brand Table</h2>
    <form action="#" method ="post">
        Brand Name: <input type="text" name="name"><br><br>
        Address: <input type="text" name="address"><br><br>
        Contact: <input type="" name="contact"><br><br>

        <input type="submit" name="btn">
    </form>
    
    <h2>Product Table</h2>
    <form action="#" method="post">
       Product Name: <input type="text" name="bname"><br><br>
       Product Price: <input type="text" name="price"><br><br>
       Manufacture: 
       <select name="productList">
        <?php
        $conn =mysqli_connect('localhost','root','','factory');
        $product_list=$conn->query('SELECT * FROM brand');
        while (list($id,$name)=$product_list->fetch_row()){
            echo "<option value='$id>'$name</option>";
        }
        
        ?>
       </select><br><br>
       <button name="addBtn">Add Product</button>
    </form>

    <table style=" border="1" style="border-collapse: collapse;">
    <tr>
            <th>Id</th>
            <th>Name</th>
            <th>price</th>
            
    </tr>
    <?php
    $conn =mysqli_connect('localhost','root','','factory');
    $data=$conn->query('SELECT * FROM product_detailes');
    while(list($name,$price)=$data->fetch_row()){
        echo "<tr>
               <td>$name</td>
               <td>$price</td>
        </tr>
        ";
    }
    ?>
</table>
</body>
</html>