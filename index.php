<?php
require 'connection.php';

$isCreated = "";
if (isset($_GET['created-product'])) {
    $isCreated = "Your Product Successfully Created.";
}

$isUpdated = "";
if (isset($_GET['updated-product'])) {
    $isUpdated = "Your Product Successfully Updated.";
}

$isDeleted = "";
if (isset($_GET['deleted-product'])) {
    $isDeleted = "Your Product Successfully Deleted.";
}

try {
   $getProducts = mysqli_query($isConnecting, "SELECT * FROM products");
} catch (\Throwable $th) {
    echo $th;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP Dengan GuhCoding.com</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="w-full h-full">
        <div class="flex justify-center">
            <div class="mt-28">
                <div class="text_header">
                    <p class="text-4xl font-semibold text-gray-600">Hello there, Lets Add, Edit, Delete Your Products
                        with GuhCoding.com
                    </p>
                </div>
                <div class="create_btn mt-5 text-center">
                    <a href="create.php" class="py-2.5 px-6 bg-blue-500 text-white rounded-md">Create Product</a>
                </div>
                <?php
                if (!empty($isCreated)) {
                ?>
                <div class="mt-5 bg-green-300 text-green-600 p-2 rounded-md text-center">
                    <p class="text-sm"><?php echo $isCreated; ?></p>
                </div>
                <?php
                } elseif (!empty($isUpdated)) {
                ?>
                <div class="mt-5 bg-green-300 text-green-600 p-2 rounded-md text-center">
                    <p class="text-sm"><?php echo $isUpdated; ?></p>
                </div>
                <?php
                } elseif (!empty($isDeleted)) {
                ?>
                <div class="mt-5 bg-red-300 text-red-600 p-2 rounded-md text-center">
                    <p class="text-sm"><?php echo $isDeleted; ?></p>
                </div>
                <?php
                }
                ?>
                <div class="wrapper_content mt-5">
                    <div class="table w-full p-2">
                        <table class="w-full border shadow-md shadow-gray-400">
                            <thead>
                                <tr class="bg-white border-b">
                                    <th class="border-r p-2">
                                        <input type="checkbox">
                                    </th>
                                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                        <div class="flex items-center justify-center">
                                            ID
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                            </svg>
                                        </div>
                                    </th>
                                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                        <div class="flex items-center justify-center">
                                            Name Product
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                            </svg>
                                        </div>
                                    </th>
                                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                        <div class="flex items-center justify-center">
                                            Price
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                            </svg>
                                        </div>
                                    </th>
                                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                        <div class="flex items-center justify-center">
                                            Date
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                            </svg>
                                        </div>
                                    </th>
                                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                        <div class="flex items-center justify-center">
                                            Action
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                            </svg>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($results = mysqli_fetch_array($getProducts)) {
                                    $no++
                                ?>
                                <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                                    <td class="p-2 border-r">
                                        <input type="checkbox">
                                    </td>
                                    <td class="p-2 border-r"><?php echo $no; ?></td>
                                    <td class="p-2 border-r"><?php echo $results['name']; ?></td>
                                    <td class="p-2 border-r"><?php echo $results['price']; ?></td>
                                    <td class="p-2 border-r"><?php echo $results['date']; ?></td>
                                    <td>
                                        <a href="edit.php?id=<?php echo $results['id'] ?>"
                                            class="bg-blue-500 p-2 text-white hover:shadow-lg text-xs font-thin">Edit</a>
                                        <form action="delete.php?id=<?php echo $results['id'] ?>" method="POST"
                                            class="inline-block">
                                            <button type="submit"
                                                class="bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>