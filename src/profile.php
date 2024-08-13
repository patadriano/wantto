

<?php 
session_start();
if(isset($_POST['logout'])){
    session_destroy();
    $_SESSION['loggedin'] = false;
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
</head>
<body class="bg-yellow-500">
  <header class="bg-white">
    <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
      <!---------------------- logo ------------------------->
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
    <!-- Mobile menu, show/hide based on menu open state. -->
    <div class="lg:hidden" role="dialog" aria-modal="true">
      <!-- Background backdrop, show/hide based on slide-over state. -->
      <div class="fixed inset-0 z-10"></div>
      <div class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
        <div class="flex items-center justify-between">
          <a href="#" class="-m-1.5 p-1.5">
            <span class="sr-only">Your Company</span>
            <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">
          </a>
          <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
            <span class="sr-only">Close menu</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="mt-6 flow-root">
          <div class="-my-6 divide-y divide-gray-500/10">
            <div class="space-y-2 py-6">
              <div class="-mx-3">
                <button type="button" class="flex w-full items-center justify-between rounded-lg py-2 pl-3 pr-3.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50" aria-controls="disclosure-1" aria-expanded="false">
                  Product
                  <!--
                    Expand/collapse icon, toggle classes based on menu open state.
  
                    Open: "rotate-180", Closed: ""
                  -->
                  <svg class="h-5 w-5 flex-none" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                  </svg>
                </button>
              </div>
            </div>
            <div class="py-6">
              <a href="#" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Log in</a>
            </div>
          </div>
        </div>
      </div>
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
                                    <img src="https://randomuser.me/api/portraits/men/94.jpg" class="w-32 h-32 bg-gray-300 rounded-full mb-4 shrink-0">

                                    </img>
                                 
                                        <?php

                                            $con = mysqli_connect('localhost', 'root', '', 'proj_wantto');

                                            // Query to fetch products for sale
                                            $query = "SELECT * FROM products WHERE username= '{$_SESSION['username']}'";
                                            $result = mysqli_query($con, $query);

                                            if (!$result) {
                                                die("Query failed: " . mysqli_error($con));
                                            }

                                            echo '<h1 class="text-xl font-bold">' . htmlspecialchars($_SESSION['username']) . '</h1>';

                                        ?>
                                    
                                    
                                    
                                    <!-- <p class="text-gray-700">Software Developer</p> -->
                                    <div class="mt-6 flex flex-wrap gap-4 justify-center">
                                        <a href="#" onclick="toggleModal('modal-id')" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded"> + Post Add</a>
                                        <a href="#" class="bg-gray-300 hover:bg-gray-400 text-gray-700 py-2 px-4 rounded">Edit Profile</a>
                                    </div>
                                </div>
                                <hr class="my-6 border-t border-gray-300">
                                <div class="flex flex-col">
                                    <span class="text-gray-700 uppercase font-bold tracking-wider mb-2">Contact</span>
                                    <ul>
                                        <li class="mb-2">JavaScript</li>
                                        <li class="mb-2">React</li>
                                        <li class="mb-2">Node.js</li>
                                        <li class="mb-2">HTML/CSS</li>
                                        <li class="mb-2">Tailwind Css</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-4 sm:col-span-9">
                            <div class="bg-white shadow rounded-lg p-6">
                                        <div id="buy-div" class="grid grid-cols-4 gap-12 p-4 rounded-lg">
                                        <?php 
                                

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
                        </div>
                    </div>
                </div>
            </div>
    </main>

    <?php

    include 'addproduct-popup.php'; 

     ?>
    <script>
    function toggleModal(modalID) {
      document.getElementById(modalID).classList.toggle("hidden");
    }
  </script>
</body>
</html>