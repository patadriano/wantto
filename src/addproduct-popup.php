<?php


// Connecting to the database
$con = mysqli_connect('localhost', 'root', '', 'proj_wantto');

// Check the connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['add_submit'])) {
    // Print the posted data for debugging
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";


    // Ensure user is logged in
    if (!isset($_SESSION['user_id'])) {
        die("User not logged in. Please log in to add a listing.");
    }

    // Getting user data from the form
    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];
    $type = mysqli_real_escape_string($con, $_POST['type']);
    $product_title = mysqli_real_escape_string($con, $_POST['product_title']);
    $product_desc = mysqli_real_escape_string($con, $_POST['product_desc']);
    $product_pic = mysqli_real_escape_string($con, $_POST['product_pic']);
    $price = mysqli_real_escape_string($con, $_POST['price']);

    // Verify that all required fields are filled
    if (empty($product_title) || empty($product_desc) || empty($price)) {
        die("Please fill in all required fields.");
    }

    // Construct the SQL query
    $query = "INSERT INTO products (user_id, username, product_pic, price, product_desc, product_title, type) 
              VALUES ('$user_id', '$username', '$product_pic', '$price', '$product_desc', '$product_title', '$type')";

    // Execute the query and check the result
    $result = mysqli_query($con, $query);

    if (!$result) {
        die("Insertion failed: " . mysqli_error($con));
    } 
}

// Close the connection
mysqli_close($con);
?>

<!-- The Modal -->
<div id="modal-id" class="fixed z-50 inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg w-full max-w-lg p-6">
        <div class="flex justify-between items-center pb-3">
            <p class="text-2xl font-bold">Add Listing</p>
            <div class="cursor-pointer" onclick="toggleModal('modal-id')">
                <svg class="fill-current text-black h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 9l5-5 1 1-5 5 5 5-1 1-5-5-5 5 1-1 5-5z"/></svg>
            </div>
        </div>
        <form class="w-full max-w-lg" method="POST" action="profile.php">
            <!-- Form content here -->
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Product title
                    </label>
                    <input name="product_title" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Product Title">
                    <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                        Product pic
                    </label>
                    <input name="product_pic" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Product Picture URL">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                        Product description
                    </label>
                    <input name="product_desc" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="text" placeholder="Product Description">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-2">
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                        Price
                    </label>
                    <input name="price" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-zip" type="text" placeholder="Price">
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                        Want to
                    </label>
                    <div class="relative">
                        <select name="type" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                            <option value="buy">Buy</option>
                            <option value="sell">Sell</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-end pt-2">
                <button type="submit" name="add_submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded" onclick="toggleModal('modal-id')">Submit</button>
                <button type="button" class="bg-gray-300 text-black font-bold py-2 px-4 rounded ml-2" onclick="toggleModal('modal-id')">Close</button>
            </div>
        </form>
    </div>
</div>


