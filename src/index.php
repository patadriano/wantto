<?php
session_start();

// Check if the session variable 'loggedin' is set and true
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    include 'header-after.php'; // Include header for logged-in users
} else {
    include 'header-before.php'; // Include header for non-logged-in users
}
?>

  <main class="bg-black m-2 min-h-screen">
    <div class="p-10 bg-slate-400">
      <form class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md dark:bg-gray-800">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
          <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
            </svg>
          </div>
          <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Products, Brands..." required />
          <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
      </form>
    </div>
    <div class="mt-10 bg-blue-500">

      <div id="buy-div" class="hidden grid grid-cols-5 gap-1 p-4 rounded-lg">
          <?php 
   
            $con = mysqli_connect('localhost', 'root', '', 'proj_wantto');

            // Query to fetch products for sale
            $query = "SELECT * FROM products WHERE type = 'buy'";
            $result = mysqli_query($con, $query);

            if (!$result) {
                die("Query failed: " . mysqli_error($con));
            }

            // Loop through the results
            while ($row = mysqli_fetch_assoc($result)) {
                // Product Card
                echo '<div class="bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">';
                echo '<a href="#">';
                echo '<img src="' . htmlspecialchars($row['product_pic']) . '" alt="Product" class="h-48 w-full object-cover rounded-t-xl" />';
                echo '<div class="px-4 py-3">';
                echo '<span class="text-gray-400 uppercase text-xs">' . htmlspecialchars($row['username']) . '</span>';
                echo '<p class="text-lg font-bold text-black truncate capitalize">' . htmlspecialchars($row['product_title']) . '</p>';
                echo '<div class="flex items-center">';
                echo '<p class="text-lg font-semibold text-black my-3">' . htmlspecialchars($row['price']) . '</p>';
                echo '<div class="ml-auto">';
                echo '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">';
                echo '<path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />';
                echo '<path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />';
                echo '</svg>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</a>';
                echo '</div>';
                // End Product Card
            }
          ?>
      </div>
      <div id="sell-div" class="hidden grid grid-cols-5 gap-1 p-4 rounded-lg">
      <?php 
   
        $con = mysqli_connect('localhost', 'root', '', 'proj_wantto');

        // Query to fetch products for sale
        $query = "SELECT * FROM products WHERE type = 'sell'";
        $result = mysqli_query($con, $query);

        if (!$result) {
            die("Query failed: " . mysqli_error($con));
        }

        // Loop through the results
        while ($row = mysqli_fetch_assoc($result)) {
            // Product Card
            echo '<div class="bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">';
            echo '<a href="#">';
            echo '<img src="' . htmlspecialchars($row['product_pic']) . '" alt="Product" class="h-48 w-full object-cover rounded-t-xl" />';
            echo '<div class="px-4 py-3">';
            echo '<span class="text-gray-400 uppercase text-xs">' . htmlspecialchars($row['username']) . '</span>';
            echo '<p class="text-lg font-bold text-black truncate capitalize">' . htmlspecialchars($row['product_title']) . '</p>';
            echo '<div class="flex items-center">';
            echo '<p class="text-lg font-semibold text-black my-3">' . htmlspecialchars($row['price']) . '</p>';
            echo '<div class="ml-auto">';
            echo '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">';
            echo '<path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />';
            echo '<path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />';
            echo '</svg>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</a>';
            echo '</div>';
            // End Product Card
        }
      ?>
     </div>
     </div>


    

  </main>
  
  <script>
    document.getElementById('buy-link').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default link behavior
        document.getElementById('buy-div').classList.remove('hidden');
        document.getElementById('sell-div').classList.add('hidden');
    });

    document.getElementById('sell-link').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default link behavior
        document.getElementById('sell-div').classList.remove('hidden');
        document.getElementById('buy-div').classList.add('hidden');
    });
</script>
</body>
</html>