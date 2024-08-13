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
    <a href="#" class="-m-1.5 p-1.5">
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
  <div class="hidden lg:flex lg:flex-1 lg:justify-end space-x-10">
    <a href="profile.php" class="text-sm font-semibold leading-6 text-gray-900">Profile</a>
    <a href="login.php" class="text-sm font-semibold leading-6 text-gray-900">Log out<span aria-hidden="true">&rarr;</span></a>
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
    <nav class="sticky top-0 mx-auto max-w-7xl p-6 lg:px-8 grid grid-cols-2 divide-x" aria-label="Global">
        <div class="flex justify-center items-center w-full">
            <a href="#" id="buy-link" class="text-sm font-semibold leading-6 text-gray-900 hover:text-blue-500 focus:text-blue-500 focus:outline-none focus:border-b-2 focus:border-blue-500">
                Want to Buy
            </a>
        </div>
        <div class="flex justify-center items-center w-full">
            <a href="#" id="sell-link" class="text-sm font-semibold leading-6 text-gray-900 hover:text-blue-500 focus:text-blue-500 focus:outline-none focus:border-b-2 focus:border-blue-500">
                Want to Sell
            </a>
        </div>
    </nav>
    </nav>
  </header>