<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'proj_wantto');
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch user data
$query = "SELECT * FROM users WHERE username = '{$_SESSION['username']}'";
$result = mysqli_query($con, $query);
if (!$result) {
    die("Query failed: " . mysqli_error($con));
}
$user = mysqli_fetch_assoc($result);

// Fetch user products
$productQuery = "SELECT * FROM products WHERE username= '{$_SESSION['username']}'";
$productResult = mysqli_query($con, $productQuery);
if (!$productResult) {
    die("Query failed: " . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Want to</title>
    <link rel="stylesheet" href="./output.css">
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <style>
        /* CSS for hover effects */
        .post-card {
            position: relative;
            transition: all 0.3s ease;
        }

        .post-card:hover .post-actions {
            opacity: 1;
            visibility: visible;
        }

        .post-actions {
            position: absolute;
            top: 10px;
            right: 10px;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .post-actions button {
            margin-left: 5px;
        }

        .hidden {
            display: none;
        }
    </style>
</head>
<body class="bg-yellow-500">
    <header class="bg-white">
        <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
            <!-- logo and navigation -->
            <div class="flex lg:flex-1">
                <a href="index.php" class="-m-1.5 p-1.5">
                    <span class="sr-only">Your Company</span>
                    <svg class="icon-cart" viewBox="0 0 24.38 30.52" height="30.52" width="24.38" xmlns="http://www.w3.org/2000/svg">
                        <title>icon-cart</title>
                        <path transform="translate(-3.62 -0.85)" d="M28,27.3,26.24,7.51a.75.75,0,0,0-.76-.69h-3.7a6,6,0,0,0-12,0H6.13a.76.76,0,0,0-.76.69L3.62,27.3v.07a4.29,4.29,0,0,0,4.52,4H23.48a4.29,4.29,0,0,0,4.52-4ZM15.81,2.37a4.47,4.47,0,0,1,4.46,4.45H11.35a4.47,4.47,0,0,1,4.46-4.45Zm7.67,27.48H8.13a2.79,2.79,0,0,1-3-2.45L6.83,8.34h3V11a.76.76,0,0,0,1.52,0V8.34h8.92V11a.76.76,0,0,0,1.52,0V8.34h3L26.48,27.4a2.79,2.79,0,0,1-3,2.44Zm0,0"></path>
                    </svg>
                </a>
                <p class="text-sm font-semibold p-2 pl-3">Want to</p>
            </div>
            <div class="flex lg:hidden">
                <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <form action="login.php" method="POST">
                    <button type="submit" name="logout" class="bg-red-500 text-white font-bold py-2 px-4 rounded">Logout</button>
                </form>
            </div>
        </nav>
    </header>

    <main>
        <div class="bg-gray-100">
            <div class="container mx-auto py-8">
                <div class="grid grid-cols-4 sm:grid-cols-12 gap-6 px-4">
                    <div class="col-span-4 sm:col-span-3">
                        <div class="bg-white shadow rounded-lg p-6">
                            <div class="flex flex-col items-center">
                                <img src="<?php echo htmlspecialchars($user['profilepic']); ?>" class="w-32 h-32 bg-gray-300 rounded-full mb-4 shrink-0">
                                <h1 class="text-xl font-bold"><?php echo htmlspecialchars($_SESSION['username']); ?></h1>
                                <div class="mt-6 flex flex-wrap gap-4 justify-center">
                                    <a href="#" onclick="toggleModal('add-product-modal')" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded"> + Post Add</a>
                                    <a href="#" onclick="toggleModal('edit-profile-modal')" class="bg-gray-300 hover:bg-gray-400 text-gray-700 py-2 px-4 rounded">Edit Profile</a>
                                </div>
                                <hr class="my-6 border-t border-gray-300">
                                <div class="flex flex-col">
                                    <span class="text-gray-700 uppercase font-bold tracking-wider mb-2">Contact</span>
                                    <ul>
                                        <li class="mb-2"><?php echo htmlspecialchars($user['contact']); ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-4 sm:col-span-9">
                        <div class="bg-white shadow rounded-lg p-6">
                            <div id="posts-grid" class="grid grid-cols-4 gap-12 p-4 rounded-lg">
                                <?php while ($productRow = mysqli_fetch_assoc($productResult)): ?>
                                    <div class="post-card bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl relative">
                                        <a href="#">
                                            <img src="<?php echo htmlspecialchars($productRow['product_pic']); ?>" alt="Product" class="h-48 w-full object-cover rounded-t-xl" />
                                            <div class="px-4 py-3">
                                                <span class="text-gray-400 uppercase text-xs"><?php echo htmlspecialchars($productRow['username']); ?></span>
                                                <p class="text-lg font-bold text-black truncate capitalize"><?php echo htmlspecialchars($productRow['product_title']); ?></p>
                                                <div class="flex items-center">
                                                    <p class="text-lg font-semibold text-black my-3"><?php echo htmlspecialchars($productRow['price']); ?></p>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="post-actions">
                                            <button onclick="showUpdateForm('<?php echo htmlspecialchars($productRow['id']); ?>')" class="bg-yellow-500 text-white py-1 px-2 rounded">Update</button>
                                            <button onclick="deletePost('<?php echo htmlspecialchars($productRow['id']); ?>')" class="bg-red-500 text-white py-1 px-2 rounded">Delete</button>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modals -->
    <div id="add-product-modal" class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center">
        <div class="bg-white p-6 rounded">
            <h2 class="text-xl font-bold mb-4">Add New Product</h2>
            <!-- Your form to add a new product here -->
            <button type="button" onclick="toggleModal('add-product-modal')" class="bg-gray-300 text-gray-700 py-2 px-4 rounded">Close</button>
        </div>
    </div>

    <div id="edit-profile-modal" class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center">
        <div class="bg-white p-6 rounded">
            <h2 class="text-xl font-bold mb-4">Edit Profile</h2>
            <!-- Your form to edit profile here -->
            <button type="button" onclick="toggleModal('edit-profile-modal')" class="bg-gray-300 text-gray-700 py-2 px-4 rounded">Close</button>
        </div>
    </div>

    <div id="update-modal" class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center">
        <div class="bg-white p-6 rounded">
            <h2 class="text-xl font-bold mb-4">Update Post</h2>
            <form id="update-form" method="POST" action="update_post.php">
                <input type="hidden" id="post-id" name="id">
                <div class="mb-4">
                    <label for="title" class="block text-gray-700">Title:</label>
                    <input type="text" id="title" name="title" class="border rounded w-full p-2">
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-gray-700">Price:</label>
                    <input type="text" id="price" name="price" class="border rounded w-full p-2">
                </div>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Save</button>
                <button type="button" onclick="toggleModal('update-modal')" class="bg-gray-300 text-gray-700 py-2 px-4 rounded ml-2">Cancel</button>
            </form>
        </div>
    </div>

    <script>
        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
        }

        function showUpdateForm(postId) {
            document.getElementById('update-modal').classList.remove('hidden');
            document.getElementById('post-id').value = postId;
        }

        function deletePost(postId) {
            if (confirm('Are you sure you want to delete this post?')) {
                fetch('delete_post.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: `id=${postId}`
                })
                .then(response => response.text())
                .then(result => {
                    alert(result); // Show success or error message
                    location.reload(); // Reload the page to reflect changes
                });
            }
        }
    </script>
</body>
</html>
