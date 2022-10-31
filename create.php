<?php
require 'connection.php';

$name_product = $price = $date = "";
$name_product_err = $price_err = $date_err = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //Validation Name Product Input
    if (empty(trim($_POST['name']))) {
        $name_product_err = 'Name Product Must Be Filled In';
    } else {
        $name_product = trim($_POST['name']);
    }

    //Validation Price Input
    if (empty(trim($_POST['price']))) {
        $price_err = 'Price Must Be Included';
    } else {
        $price = trim($_POST['price']);
    }

    //Validation Date Input
    if (empty(trim($_POST['date']))) {
        $date_err = 'The Product Date Must Be Included';
    } else {
        $date = trim($_POST['date']);
    }
    if (empty($name_product_err) && empty($price_err) && empty($date_err)) {
        $query = "INSERT INTO products (name,price,date) VALUES (?,?,?)";
        if ($statement = mysqli_prepare($isConnecting, $query)) {
            $binding = mysqli_stmt_bind_param($statement, 'ssd', $name_product, $price,$date);
            if (mysqli_stmt_execute($statement)) {
                header("location: index.php?created-product");
            }
            mysqli_stmt_close($statement);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="w-full h-full">
        <div class="wrapper  mt-28">
            <div class="txt_header text-center mb-3">
                <p class="font-semibold text-gray-600 text-4xl">Create Your Product</p>
            </div>
            <div class="w-full flex justify-center">
                <div class="form_wrapper w-3/4 p-2 bg-white shadow-md shadow-gray-400 rounded-md">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                        <div class="mb-6">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your
                                product name?</label>
                            <input type="text" id="name" name="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Cheetos? Or Something">
                            <?php
                            if (!empty($name_product_err)) {
                            ?>
                            <div class="w-full text-center bg-red-300 p-2 mt-3 rounded-md">
                                <span class="text-sm text-red-600"><?php echo $name_product_err; ?></span>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="mb-6">
                            <label for="price"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Price?</label>
                            <input type="text" id="price" name="price"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <?php
                            if (!empty($price_err)) {
                            ?>
                            <div class="w-full text-center bg-red-300 p-2 mt-3 rounded-md">
                                <span class="text-sm text-red-600"><?php echo $price_err; ?></span>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="mb-6">
                            <label for="date"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Date Created
                                Product</label>
                            <input type="date" id="date" name="date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <?php
                            if (!empty($date_err)) {
                            ?>
                            <div class="w-full text-center bg-red-300 p-2 mt-3 rounded-md">
                                <span class="text-sm text-red-600"><?php echo $date_err; ?></span>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

</html>