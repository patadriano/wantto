<?php


// Connect to the database
$con = mysqli_connect('localhost', 'root', '', 'proj_wantto');

// Check the connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['edit_submit'])) {
    // Ensure user is logged in
    if (!isset($_SESSION['user_id'])) {
        die("User not logged in. Please log in to edit your profile.");
    }

    // Getting user data from the form
    $user_id = $_SESSION['user_id'];
    $newusername = mysqli_real_escape_string($con, $_POST['new_username']);
    $profilepic = mysqli_real_escape_string($con, $_POST['profilepic']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);

    // Construct the SQL query
    $query = "UPDATE users SET profilepic = '$profilepic', contact = '$contact', username = '$newusername' WHERE id = '$user_id'";
    $_SESSION['username'] = $newusername;

    // Execute the query and check the result
    $result = mysqli_query($con, $query);

    $query = "UPDATE products SET username = '$newusername' WHERE user_id = '$user_id'";

    // Execute the query and check the result
    $result = mysqli_query($con, $query);

    if (!$result) {
        die("Update failed: " . mysqli_error($con));
    } else {
        // Redirect to profile.php after successful update
        header("Location: profile.php");
        exit();
    }
}


// Close the connection
mysqli_close($con);
?>

<!-- The Modal -->
<div id="editprofile" class="fixed z-50 inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg w-full max-w-lg p-6">
        <div class="flex justify-between items-center pb-3">
            <p class="text-2xl font-bold">Edit Profile</p>
            <div class="cursor-pointer" onclick="toggleModal('editprofile')">
                <svg class="fill-current text-black h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 9l5-5 1 1-5 5 5 5-1 1-5-5-5 5 1-1 5-5z"/></svg>
            </div>
        </div>
        <form class="w-full max-w-lg" method="POST" action="editprofile.php">
            <!-- Form content here -->
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="profilepic">
                        Picture
                    </label>
                    <input name="profilepic" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="profilepic" type="text" placeholder="Profile Picture URL">
                    <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="new_username">
                        Username
                    </label>
                    <input name="new_username" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="new_username" type="text" placeholder="New Username">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="contact">
                        Contact
                    </label>
                    <input name="contact" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="contact" type="text" placeholder="Contact Information">
                </div>
            </div>
            <div class="flex justify-end pt-2">
                <button type="submit" name="edit_submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded" onclick="toggleModal('editprofile')">Submit</button>
                <button type="button" class="bg-gray-300 text-black font-bold py-2 px-4 rounded ml-2" onclick="toggleModal('editprofile')">Close</button>
            </div>
        </form>
    </div>
</div>


