<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Jura:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="{{ asset('web/assets/icons/all.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('web/css/normalize.css') }}" />
  <link rel="stylesheet" href="{{ asset('web/css/input.css') }}" />
  <link rel="stylesheet" href="{{ asset('web/css/output.css') }}" />
  <link rel="stylesheet" href="{{ asset('web/css/store.css') }}">
  <title>DROV</title>
</head>

<body class="bg-gray-50">
  <main class="container mx-auto py-6 lg:py-8 px-6 sm:px-0">
    <nav class="flex justify-between items-center font-inter">
      <div class="flex items-center gap-4 md:gap-6 lg:gap-8">
        <a href="{{ url('/') }}">
          <img class="w-16 md:w-24" src="{{ asset('web/assets/images/logo/logo.png') }}" alt="DROV Logo" />
        </a>
        <ul class="hidden sm:block">
          <li class="flex sm:gap-4 md:gap-6 lg:gap-8 child:transition-all child-hover:text-main-red text-xs xl:text-lg">
            <a href="{{ url('/') }}">HOME</a>
            <a href="#">HOW IT WORKS</a>
            <a href="#">RENTAL DEAL</a>
            <a href="#">WHY CHOOSE US</a>
          </li>
        </ul>
      </div>
      <div class="flex items-center gap-6 text-xs xl:text-lg">
        <div class="text-main-dark hover:underline cursor-pointer" data-sign-In>
          Sign In
        </div>
        <div class="text-main-red hover:underline cursor-pointer" data-sign-up>
          Sign Up
        </div>
        <a href="{{ url('/list') }}"
          class="hidden sm:block text-main-red py-2 px-3 border-2 border-solid border-main-red rounded-xl hover:bg-main-red hover:text-main-light transition duration-300 font-jura font-bold">List
          Your Car?</a>
      </div>
    </nav>














    <!----------=============================================-->
    
    <!--====================================================-->

















    <div class="mt-6 md:mt-12 flex flex-col md:flex-row gap-4 transition duration-300">
      <aside
        class="font-inter bg-main-light shadow-lg rounded-3xl w-full px-4 py-6 md:px-8 md:py-12 md:h-[90vh] md:w-2/6 sm:sticky top-4 sm:top-12 transition-all duration-300 flex flex-col gap-4 items-start z-20"
        style="height: 825px;">
        <div>
          <h2 class="font-bold sm:text-xl lg:text-3xl">Apply filters</h2>
          <p class="md:mt-2">Use filters to further refine search</p>
        </div>
        <div class="flex flex-col gap-8 items-start transition duration-300 child:transition child:duration-300"
          data-filter-container>
          <div>
            <h3 class="mb-2 font-bold">Car Brand</h3>
            <div class="flex md:flex-col gap-2 flex-wrap">
              <div>
                <input type="checkbox" name="Kia" id="Kia" />
                <label for="Kia">Kia</label>
              </div>
              <div>
                <input type="checkbox" name="Nissan" id="Nissan" />
                <label for="Nissan">Nissan</label>
              </div>
              <div>
                <input type="checkbox" name="Chevrolet" id="Chevrolet" />
                <label for="Chevrolet">Chevrolet</label>
              </div>
              <div>
                <input type="checkbox" name="Hyundai" id="Hyundai" />
                <label for="Hyundai">Hyundai</label>
              </div>
              <div>
                <input type="checkbox" name="Mazda" id="Mazda" />
                <label for="Mazda">Mazda</label>
              </div>
            </div>
          </div>
          <div class="hidden opacity-0 md:opacity-100 md:block">
            <div>
              <h3 class="font-bold">Price</h3>
              <div>
                <input type="range" min="250" max="3000" value="50" step="250" class="slider" id="priceRange"
                  data-range1 />
                <p>250 - <span id="priceValue" data-value1></span>EGP</p>
              </div>
            </div>
          </div>
          <div class="hidden opacity-0 md:opacity-100 md:block">
            <h3 class="mb-2 font-bold">Color</h3>
            <div class="flex gap-2 flex-wrap">
              <div class="w-4 h-4 rounded-full cursor-pointer bg-green-600/50"></div>
              <div class="w-4 h-4 rounded-full cursor-pointer bg-red-600/50"></div>
              <div class="w-4 h-4 rounded-full cursor-pointer bg-black/50"></div>
              <div class="w-4 h-4 rounded-full cursor-pointer bg-gray-200/50"></div>
              <div class="w-4 h-4 rounded-full cursor-pointer bg-blue-600/50"></div>
            </div>
          </div>
          <div class="hidden opacity-0 md:opacity-100 md:block">
            <h3 class="font-bold">Model</h3>
            <div>
              <input type="range" min="2013" max="2023" value="2013" step="1" class="slider" id="modelRange"
                data-range2 />
              <p>2013 - <span id="priceValue" data-value2></span></p>
            </div>
          </div>
          <div class="hidden md:block">
            <h3 class="mb-2 font-bold">Specifications</h3>
            <div class="flex flex-col gap-2">
              <div>
                <input type="radio" id="gb1_auto" name="gearbox" />
                <label for="gb1_auto">Automatic gearbox</label>
              </div>
              <div>
                <input type="radio" id="gb1_manual" name="gearbox" />
                <label for="gb1_manual">Manual gearbox</label>
              </div>
              <div>
                <label for="nos">Number of seats</label>
                <input type="number" min="2" max="12" value="2" id="nos" class="w-fit font-bold" />
              </div>
            </div>
          </div>
        </div>
        <div class="md:self- w-full justify-center md:justify-end items-center flex gap-6">
          <button class="md:hidden text-main-red cursor-pointer self-center sm:self-start" data-expand>
            Expand
          </button>
          <button class="text-main-red px-5 py-1 font-bold hover:underline cursor-pointer self-center sm:self-start">
            Reset
          </button>
          <button
            class="bg-main-red text-white px-5 py-1 rounded-full font-bold transition duration-300 cursor-pointer self-center sm:self-start">
            Apply
          </button>
        </div>
      </aside>
      <div class="w-full md:w-4/6">
        <section class="container mx-auto pxx-4 grid grid-cols-2 lg:grid-cols-3 ptt-6 gap-4 child:cursor-pointer">
          <div
            class="rounded-3xl relative font-inter bg-[url({{ asset('web/assets/images/stocks/products/product1.png') }})] bg-cover h-56 sm:h-80 lg:h-96">
            <div class="flex flex-col justify-between h-full items-start text-white absolute z-10 p-2 md:p-4">
              <div class="flex gap-4 items-center">
                <img src="{{ asset('web/assets/images/stocks/profile-pic/pp1.png') }}" alt="user profile picture"
                  class="w-8 h-8 sm:w-12 sm:h-12 rounded-full object-cover" />
                <p class="leading-4">
                  <span class="font-bold">Bakr</span><br />Mohamed
                </p>
              </div>
              <div class="flex flex-col gap-1">
                <p class="text-white/90 text-sm sm:text-2xl font-bold">
                  Kia-Cerato
                  <span class="text-white/75 text-xs font-normal">2015</span>
                </p>
                <p class="text-white text-sm sm:text-2xl font-bold">
                  2604 EGP
                  <span class="text-white/75 text-xs font-normal">Total for 7d</span>
                </p>
                <div class="flex gap-2 sm:mb-2 child:text-sm sm:text-base">
                  <i class="fa-solid fa-star text-yellow-400"></i>
                  <i class="fa-solid fa-star text-yellow-400"></i>
                  <i class="fa-solid fa-star text-yellow-400"></i>
                  <i class="fa-solid fa-star text-yellow-400"></i>
                  <i class="fa-solid fa-star text-yellow-400"></i>
                </div>
              </div>
            </div>
            <div class="w-full h-1/4 absolute bg-gradient-to-b from-black/75 top-0 rounded-t-3xl"></div>
            <!-- <img
                src="../../assets/images/stocks/products/product1.png"
                alt="product1 pic"
                class="rounded-3xl"
              /> -->
            <div class="w-full h-2/4 absolute bg-gradient-to-t from-black bottom-0 rounded-b-3xl"></div>
          </div>
          <div
            class="rounded-3xl relative font-inter bg-[url({{ asset('web/assets/images/stocks/products/product1.png') }})] bg-cover h-56 sm:h-80 lg:h-96">
            <div class="flex flex-col justify-between h-full items-start text-white absolute z-10 p-2 md:p-4">
              <div class="flex gap-4 items-center">
                <img src="{{ asset('web/assets/images/stocks/profile-pic/pp1.png') }}" alt="user profile picture"
                  class="w-8 h-8 sm:w-12 sm:h-12 rounded-full object-cover" />
                <p class="leading-4">
                  <span class="font-bold">Bakr</span><br />Mohamed
                </p>
              </div>
              <div class="flex flex-col gap-1">
                <p class="text-white/90 text-sm sm:text-2xl font-bold">
                  Kia-Cerato
                  <span class="text-white/75 text-xs font-normal">2015</span>
                </p>
                <p class="text-white text-sm sm:text-2xl font-bold">
                  2604 EGP
                  <span class="text-white/75 text-xs font-normal">Total for 7d</span>
                </p>
                <div class="flex gap-2 sm:mb-2 child:text-sm sm:text-base">
                  <i class="fa-solid fa-star text-yellow-400"></i>
                  <i class="fa-solid fa-star text-yellow-400"></i>
                  <i class="fa-solid fa-star text-yellow-400"></i>
                  <i class="fa-solid fa-star text-yellow-400"></i>
                  <i class="fa-solid fa-star text-yellow-400"></i>
                </div>
              </div>
            </div>
            <div class="w-full h-1/4 absolute bg-gradient-to-b from-black/75 top-0 rounded-t-3xl"></div>
            <!-- <img
                src="../../assets/images/stocks/products/product1.png"
                alt="product1 pic"
                class="rounded-3xl"
              /> -->
            <div class="w-full h-2/4 absolute bg-gradient-to-t from-black bottom-0 rounded-b-3xl"></div>
          </div>
          <div
            class="rounded-3xl relative font-inter bg-[url({{ asset('web/assets/images/stocks/products/product1.png') }})] bg-cover h-56 sm:h-80 lg:h-96">
            <div class="flex flex-col justify-between h-full items-start text-white absolute z-10 p-2 md:p-4">
              <div class="flex gap-4 items-center">
                <img src="{{ asset('web/assets/images/stocks/profile-pic/pp1.png') }}" alt="user profile picture"
                  class="w-8 h-8 sm:w-12 sm:h-12 rounded-full object-cover" />
                <p class="leading-4">
                  <span class="font-bold">Bakr</span><br />Mohamed
                </p>
              </div>
              <div class="flex flex-col gap-1">
                <p class="text-white/90 text-sm sm:text-2xl font-bold">
                  Kia-Cerato
                  <span class="text-white/75 text-xs font-normal">2015</span>
                </p>
                <p class="text-white text-sm sm:text-2xl font-bold">
                  2604 EGP
                  <span class="text-white/75 text-xs font-normal">Total for 7d</span>
                </p>
                <div class="flex gap-2 sm:mb-2 child:text-sm sm:text-base">
                  <i class="fa-solid fa-star text-yellow-400"></i>
                  <i class="fa-solid fa-star text-yellow-400"></i>
                  <i class="fa-solid fa-star text-yellow-400"></i>
                  <i class="fa-solid fa-star text-yellow-400"></i>
                  <i class="fa-solid fa-star text-yellow-400"></i>
                </div>
              </div>
            </div>
            <div class="w-full h-1/4 absolute bg-gradient-to-b from-black/75 top-0 rounded-t-3xl"></div>
            <!-- <img
                src="../../assets/images/stocks/products/product1.png"
                alt="product1 pic"
                class="rounded-3xl"
              /> -->
            <div class="w-full h-2/4 absolute bg-gradient-to-t from-black bottom-0 rounded-b-3xl"></div>
          </div>
          <div
            class="rounded-3xl relative font-inter bg-[url({{ asset('web/assets/images/stocks/products/product1.png') }})] bg-cover h-56 sm:h-80 lg:h-96">
            <div class="flex flex-col justify-between h-full items-start text-white absolute z-10 p-2 md:p-4">
              <div class="flex gap-4 items-center">
                <img src="{{ asset('web/assets/images/stocks/profile-pic/pp1.png') }}" alt="user profile picture"
                  class="w-8 h-8 sm:w-12 sm:h-12 rounded-full object-cover" />
                <p class="leading-4">
                  <span class="font-bold">Bakr</span><br />Mohamed
                </p>
              </div>
              <div class="flex flex-col gap-1">
                <p class="text-white/90 text-sm sm:text-2xl font-bold">
                  Kia-Cerato
                  <span class="text-white/75 text-xs font-normal">2015</span>
                </p>
                <p class="text-white text-sm sm:text-2xl font-bold">
                  2604 EGP
                  <span class="text-white/75 text-xs font-normal">Total for 7d</span>
                </p>
                <div class="flex gap-2 sm:mb-2 child:text-sm sm:text-base">
                  <i class="fa-solid fa-star text-yellow-400"></i>
                  <i class="fa-solid fa-star text-yellow-400"></i>
                  <i class="fa-solid fa-star text-yellow-400"></i>
                  <i class="fa-solid fa-star text-yellow-400"></i>
                  <i class="fa-solid fa-star text-yellow-400"></i>
                </div>
              </div>
            </div>
            <div class="w-full h-1/4 absolute bg-gradient-to-b from-black/75 top-0 rounded-t-3xl"></div>
            <!-- <img
                src="../../assets/images/stocks/products/product1.png"
                alt="product1 pic"
                class="rounded-3xl"
              /> -->
            <div class="w-full h-2/4 absolute bg-gradient-to-t from-black bottom-0 rounded-b-3xl"></div>
          </div>
          <div
            class="rounded-3xl relative font-inter bg-[url({{ asset('web/assets/images/stocks/products/product1.png') }})] bg-cover h-56 sm:h-80 lg:h-96">
            <div class="flex flex-col justify-between h-full items-start text-white absolute z-10 p-2 md:p-4">
              <div class="flex gap-4 items-center">
                <img src="{{ asset('web/assets/images/stocks/profile-pic/pp1.png') }}" alt="user profile picture"
                  class="w-8 h-8 sm:w-12 sm:h-12 rounded-full object-cover" />
                <p class="leading-4">
                  <span class="font-bold">Bakr</span><br />Mohamed
                </p>
              </div>
              <div class="flex flex-col gap-1">
                <p class="text-white/90 text-sm sm:text-2xl font-bold">
                  Kia-Cerato
                  <span class="text-white/75 text-xs font-normal">2015</span>
                </p>
                <p class="text-white text-sm sm:text-2xl font-bold">
                  2604 EGP
                  <span class="text-white/75 text-xs font-normal">Total for 7d</span>
                </p>
                <div class="flex gap-2 sm:mb-2 child:text-sm sm:text-base">
                  <i class="fa-solid fa-star text-yellow-400"></i>
                  <i class="fa-solid fa-star text-yellow-400"></i>
                  <i class="fa-solid fa-star text-yellow-400"></i>
                  <i class="fa-solid fa-star text-yellow-400"></i>
                  <i class="fa-solid fa-star text-yellow-400"></i>
                </div>
              </div>
            </div>
            <div class="w-full h-1/4 absolute bg-gradient-to-b from-black/75 top-0 rounded-t-3xl"></div>
            <!-- <img
                src="../../assets/images/stocks/products/product1.png"
                alt="product1 pic"
                class="rounded-3xl"
              /> -->
            <div class="w-full h-2/4 absolute bg-gradient-to-t from-black bottom-0 rounded-b-3xl"></div>
          </div>
          <div
            class="rounded-3xl relative font-inter bg-[url({{ asset('web/assets/images/stocks/products/product1.png') }})] bg-cover h-56 sm:h-80 lg:h-96">
            <div class="flex flex-col justify-between h-full items-start text-white absolute z-10 p-2 md:p-4">
              <div class="flex gap-4 items-center">
                <img src="{{ asset('web/assets/images/stocks/profile-pic/pp1.png') }}" alt="user profile picture"
                  class="w-8 h-8 sm:w-12 sm:h-12 rounded-full object-cover" />
                <p class="leading-4">
                  <span class="font-bold">Bakr</span><br />Mohamed
                </p>
              </div>
              <div class="flex flex-col gap-1">
                <p class="text-white/90 text-sm sm:text-2xl font-bold">
                  Kia-Cerato
                  <span class="text-white/75 text-xs font-normal">2015</span>
                </p>
                <p class="text-white text-sm sm:text-2xl font-bold">
                  2604 EGP
                  <span class="text-white/75 text-xs font-normal">Total for 7d</span>
                </p>
                <div class="flex gap-2 sm:mb-2 child:text-sm sm:text-base">
                  <i class="fa-solid fa-star text-yellow-400"></i>
                  <i class="fa-solid fa-star text-yellow-400"></i>
                  <i class="fa-solid fa-star text-yellow-400"></i>
                  <i class="fa-solid fa-star text-yellow-400"></i>
                  <i class="fa-solid fa-star text-yellow-400"></i>
                </div>
              </div>
            </div>
            <div class="w-full h-1/4 absolute bg-gradient-to-b from-black/75 top-0 rounded-t-3xl"></div>
            <!-- <img
                src="../../assets/images/stocks/products/product1.png"
                alt="product1 pic"
                class="rounded-3xl"
              /> -->
            <div class="w-full h-2/4 absolute bg-gradient-to-t from-black bottom-0 rounded-b-3xl"></div>
          </div>
          <div
            class="rounded-3xl relative font-inter bg-[url({{ asset('web/assets/images/stocks/products/product1.png') }})] bg-cover h-56 sm:h-80 lg:h-96">
            <div class="flex flex-col justify-between h-full items-start text-white absolute z-10 p-2 md:p-4">
              <div class="flex gap-4 items-center">
                <img src="{{ asset('web/assets/images/stocks/profile-pic/pp1.png') }}" alt="user profile picture"
                  class="w-8 h-8 sm:w-12 sm:h-12 rounded-full object-cover" />
                <p class="leading-4">
                  <span class="font-bold">Bakr</span><br />Mohamed
                </p>
              </div>
              <div class="flex flex-col gap-1">
                <p class="text-white/90 text-sm sm:text-2xl font-bold">
                  Kia-Cerato
                  <span class="text-white/75 text-xs font-normal">2015</span>
                </p>
                <p class="text-white text-sm sm:text-2xl font-bold">
                  2604 EGP
                  <span class="text-white/75 text-xs font-normal">Total for 7d</span>
                </p>
                <div class="flex gap-2 sm:mb-2 child:text-sm sm:text-base">
                  <i class="fa-solid fa-star text-yellow-400"></i>
                  <i class="fa-solid fa-star text-yellow-400"></i>
                  <i class="fa-solid fa-star text-yellow-400"></i>
                  <i class="fa-solid fa-star text-yellow-400"></i>
                  <i class="fa-solid fa-star text-yellow-400"></i>
                </div>
              </div>
            </div>
            <div class="w-full h-1/4 absolute bg-gradient-to-b from-black/75 top-0 rounded-t-3xl"></div>
            <!-- <img
                src="../../assets/images/stocks/products/product1.png"
                alt="product1 pic"
                class="rounded-3xl"
              /> -->
            <div class="w-full h-2/4 absolute bg-gradient-to-t from-black bottom-0 rounded-b-3xl"></div>
          </div>
          <div
            class="rounded-3xl relative font-inter bg-[url({{ asset('web/assets/images/stocks/products/product1.png') }})] bg-cover h-56 sm:h-80 lg:h-96">
            <div class="flex flex-col justify-between h-full items-start text-white absolute z-10 p-2 md:p-4">
              <div class="flex gap-4 items-center">
                <img src="{{ asset('web/assets/images/stocks/profile-pic/pp1.png') }}" alt="user profile picture"
                  class="w-8 h-8 sm:w-12 sm:h-12 rounded-full object-cover" />
                <p class="leading-4">
                  <span class="font-bold">Bakr</span><br />Mohamed
                </p>
              </div>
              <div class="flex flex-col gap-1">
                <p class="text-white/90 text-sm sm:text-2xl font-bold">
                  Kia-Cerato
                  <span class="text-white/75 text-xs font-normal">2015</span>
                </p>
                <p class="text-white text-sm sm:text-2xl font-bold">
                  2604 EGP
                  <span class="text-white/75 text-xs font-normal">Total for 7d</span>
                </p>
                <div class="flex gap-2 sm:mb-2 child:text-sm sm:text-base">
                  <i class="fa-solid fa-star text-yellow-400"></i>
                  <i class="fa-solid fa-star text-yellow-400"></i>
                  <i class="fa-solid fa-star text-yellow-400"></i>
                  <i class="fa-solid fa-star text-yellow-400"></i>
                  <i class="fa-solid fa-star text-yellow-400"></i>
                </div>
              </div>
            </div>
            <div class="w-full h-1/4 absolute bg-gradient-to-b from-black/75 top-0 rounded-t-3xl"></div>
            <!-- <img
                src="../../assets/images/stocks/products/product1.png"
                alt="product1 pic"
                class="rounded-3xl"
              /> -->
            <div class="w-full h-2/4 absolute bg-gradient-to-t from-black bottom-0 rounded-b-3xl"></div>
          </div>
          <div
            class="rounded-3xl relative font-inter bg-[url({{ asset('web/assets/images/stocks/products/product1.png') }})] bg-cover h-56 sm:h-80 lg:h-96">
            <div class="flex flex-col justify-between h-full items-start text-white absolute z-10 p-2 md:p-4">
              <div class="flex gap-4 items-center">
                <img src="{{ asset('web/assets/images/stocks/profile-pic/pp1.png') }}" alt="user profile picture"
                  class="w-8 h-8 sm:w-12 sm:h-12 rounded-full object-cover" />
                <p class="leading-4">
                  <span class="font-bold">Bakr</span><br />Mohamed
                </p>
              </div>
              <div class="flex flex-col gap-1">
                <p class="text-white/90 text-sm sm:text-2xl font-bold">
                  Kia-Cerato
                  <span class="text-white/75 text-xs font-normal">2015</span>
                </p>
                <p class="text-white text-sm sm:text-2xl font-bold">
                  2604 EGP
                  <span class="text-white/75 text-xs font-normal">Total for 7d</span>
                </p>
                <div class="flex gap-2 sm:mb-2 child:text-sm sm:text-base">
                  <i class="fa-solid fa-star text-yellow-400"></i>
                  <i class="fa-solid fa-star text-yellow-400"></i>
                  <i class="fa-solid fa-star text-yellow-400"></i>
                  <i class="fa-solid fa-star text-yellow-400"></i>
                  <i class="fa-solid fa-star text-yellow-400"></i>
                </div>
              </div>
            </div>
            <div class="w-full h-1/4 absolute bg-gradient-to-b from-black/75 top-0 rounded-t-3xl"></div>
            <!-- <img
                src="../../assets/images/stocks/products/product1.png"
                alt="product1 pic"
                class="rounded-3xl"
              /> -->
            <div class="w-full h-2/4 absolute bg-gradient-to-t from-black bottom-0 rounded-b-3xl"></div>
          </div>
        </section>
        <div
          class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6 mt-6 rounded-b-xl">
          <div class="flex flex-1 justify-between sm:hidden">
            <a href="#"
              class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</a>
            <a href="#"
              class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</a>
          </div>
          <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
            <div>
              <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                <a href="#"
                  class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                  <span class="sr-only">Previous</span>
                  <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                      d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                      clip-rule="evenodd" />
                  </svg>
                </a>
                <!-- Current: "z-10 bg-indigo-600 text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600", Default: "text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0" -->
                <a href="#" aria-current="page"
                  class="relative z-10 inline-flex items-center bg-main-red px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">1</a>
                <a href="#"
                  class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">2</a>
                <a href="#"
                  class="relative hidden items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 md:inline-flex">3</a>
                <span
                  class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-700 ring-1 ring-inset ring-gray-300 focus:outline-offset-0">...</span>
                <a href="#"
                  class="relative hidden items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 md:inline-flex">8</a>
                <a href="#"
                  class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">9</a>
                <a href="#"
                  class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">10</a>
                <a href="#"
                  class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                  <span class="sr-only">Next</span>
                  <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                      d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                      clip-rule="evenodd" />
                  </svg>
                </a>
              </nav>
            </div>
            <div>
              <p class="text-sm text-gray-700">
                Showing
                <span class="font-medium">1</span>
                to
                <span class="font-medium">10</span>
                of
                <span class="font-medium">97</span>
                results
              </p>
            </div>
          </div>
        </div>
        <!-- </div> -->
      </div>
    </div>
    <article
      class="hidden opacity-0 w-full h-full child:absolute child:top-1/2 child:left-1/2 child:-translate-x-1/2 child:-translate-y-1/2 font-inter transition-all"
      data-sign-article>
      <div
        class="w-full md:w-1/2 lg:w-1/3 bg-main-light z-30 shadow-lg rounded-sm container p-6 flex flex-col items-center"
        data-sign-in-card>
        <p class="font-bold uppercase text-xl">Sign In</p>
        <div class="mt-6 w-full flex flex-col gap-6">
          <div>
            <div class="flex justify-between items-center shadow-[0_0_2px_0_rgba(0,0,0,0.3)] rounded-md px-4 py-2 mb-4">
              <i class="fa-brands fa-google text-red-700 text-2xl"></i>
              <p class="text-main-dark font-normal w-full text-center">
                Continue with Google
              </p>
            </div>
            <div
              class="flex bg-[#1778F2] justify-between items-center shadow-[0_0_2px_0px_rgba(0,0,0,0.3)] rounded-md px-4 py-2">
              <i class="fa-brands fa-facebook-f text-white text-2xl"></i>
              <p class="text-white font-normal w-full text-center">
                Continue with Facebook
              </p>
            </div>
          </div>
          <div class="flex justify-between items-center">
            <hr class="w-2/5 border border-solid border-red" />
            <p class="inline-block">OR</p>
            <hr class="w-2/5 border border-solid border-red" />
          </div>
          <div>
            <div
              class="bg-gray-200 flex justify-between items-center shadow-[0_0_2px_0_rgba(0,0,0,0.3)] rounded-md px-4 py-2 mb-4">
              <i class="fa-regular fa-envelope text-main-dark text-2xl"></i>
              <p class="text-main-dark font-normal w-full text-center">
                Continue with Google
              </p>
            </div>
            <p class="text-center">
              Don't have account? <span class="font-bold">Sign Up</span>
            </p>
          </div>
        </div>
      </div>
      <div class="hidden opacity-0" data-sign-up-card></div>
    </article>
    <div class="hidden opacity-0 fixed top-0 left-0 w-full h-full bg-black/50 transition-all z-20" data-black-bg></div>
  </main>
  <footer class="bg-main-red w-full mt-20">
    <div class="container font-jura flex flex-col md:flex-row gap-4 w-full mx-auto text-white py-12 px-4 sm:px-0">
      <div class="flex flex-col items-center lg:items-start text-center md:text-start gap-2">
        <img src="{{ asset('web/assets/images/logo/logo3.png') }}" alt="drov logo" class="bg-white" />
        <p>
          DROVCAR is the first and leading marketplace for renting and lending
          cars serving the Middle East.<br />It's a simple, safe, and
          rewarding experience for car owners and a quick, interactive, and
          affordable one for car borrowers.
        </p>
        <div class="flex flex-col gap-4 items-center sm:items-start">
          <div class="flex justify-center sm:justify-start gap-2 items-center">
            <i class="fa-solid fa-location-dot"></i>
            <p>Building 16, Dubai Internet City, Dubai, UAE</p>
          </div>
          <div class="flex justify-center sm:justify-start gap-2 items-center">
            <i class="fa-solid fa-envelope"></i>
            <p>bakrtaha505@gmail.com</p>
          </div>
          <div>
            <h3 class="capitalize font-bold">want to rent a car?</h3>
            <p>+201153569690</p>
          </div>
          <div>
            <h3 class="capitalize font-bold">want to list your car?</h3>
            <p>+201153569690</p>
          </div>
          <p>Give us a call or message through WhatsApp</p>
          <button type="submit"
            class="uppercase py-2.5 px-6 border-2 border-solid border-main-light rounded-xl font-bold text-main-light text-xs xl:text-lg">
            Message Us
          </button>
        </div>
      </div>
      <div class="container mx-auto grid justify-center grid-cols-2 lg:grid-cols-3 pt-6 gap-4">
        <div>
          <h2 class="mb-2 font-bold">DROVCAR</h2>
          <p>Help center</p>
          <p>Terms of Serviceelp center</p>
          <p>Privacy Policy</p>
          <p>Blog</p>
        </div>
        <div>
          <h2 class="mb-2 font-bold">EXPLORE</h2>
          <p>Car Subscription</p>
          <p>Rent a car</p>
          <p>List your car</p>
          <p>How it works</p>
        </div>
        <div>
          <h2 class="mb-2 font-bold">COUNTRIES</h2>
          <p>Egypt</p>
          <p>UAE</p>
          <p>Saudi Arabia (soon)</p>
        </div>
        <div>
          <h2 class="mb-2 font-bold">TOP LOCATIONS</h2>
          <p>Car Rental Cairo</p>
          <p>Car Rental Alexandria</p>
          <p>Car Rental Cairo Airport</p>
          <p>Borg Elarab Airport</p>
        </div>
        <div>
          <h2 class="mb-2 font-bold">CAR TYPES</h2>
          <p>SUV</p>
          <p>Sedan</p>
          <p>Luxurious</p>
        </div>
        <div>
          <h2 class="mb-2 font-bold">BRANDS</h2>
          <p>Nissan</p>
          <p>Chevrolet</p>
          <p>Hyundai</p>
          <p>Kia</p>
        </div>
        <div>
          <h2 class="mb-2 font-bold">POPULAR MODELS</h2>
          <p>Nissan Sunny</p>
          <p>Chevrolet Optra</p>
          <p>Renault Logan</p>
          <p>Hyundai Elantra</p>
          <p>Kia Cerato</p>
        </div>
        <div>
          <h2 class="mb-2 font-bold">DESTINATIONS</h2>
          <p>Cairo to Alexandria</p>
          <p>Cairo to Ras Sudr</p>
          <p>Cairo to Fayoum</p>
          <p>Cairo to Ain Sokhna</p>
        </div>
        <div>
          <h2 class="mb-2 font-bold">POPULAR MODELS</h2>
          <p>Cars from 250 to 500 EGP</p>
          <p>Cars from 500 EGP to 800 EGP</p>
          <p>Cars for 1000 EGP & more</p>
        </div>
      </div>
    </div>
  </footer>
  <script src="{{ asset('web/js/store.js') }}"></script>
  <script src="{{ asset('web/js/index.js') }}"></script>
</body>

</html>