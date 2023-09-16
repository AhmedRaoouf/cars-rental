<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Jura:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="{{ asset('web/assets/icons/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('web/css/normalize.css') }}" />
    <link rel="stylesheet" href="{{ asset('web/css/input.css') }}" />
    <link rel="stylesheet" href="{{ asset('web/css/output.css') }}" />
    <title>DROV</title>
  </head>
  <body class="md:bg-gray-100">
    <main class="flex flex-col items-center overflow-x-hidden">
      <div class="px-6 sm:px-0 container py-6 lg:py-8">
        <nav class="flex justify-between items-center font-inter">
          <div class="flex items-center gap-4 md:gap-6 lg:gap-8">
            <a href="{{ url('/') }}"
              ><img
                class="w-16 md:w-24"
                src="{{ asset('web/assets/images/logo/logo.png') }}"
                alt="DROV Logo"
            /></a>
            <ul class="hidden sm:block">
              <li
                class="flex sm:gap-4 md:gap-6 lg:gap-8 child:transition-all child-hover:text-main-red text-xs xl:text-lg"
              >
                <a href="{{ url('/') }}">HOME</a>
                <a href="#">HOW IT WORKS</a>
                <a href="#">RENTAL DEAL</a>
                <a href="#">WHY CHOOSE US</a>
              </li>
            </ul>
          </div>
          <div class="flex items-center gap-6 text-xs xl:text-lg">
            <div
              class="text-main-dark hover:underline cursor-pointer"
              data-sign-In
            >
              Sign In
            </div>
            <div
              class="text-main-red hover:underline cursor-pointer"
              data-sign-up
            >
              Sign Up
            </div>

            <a
              href="{{ url('/list') }}"
              class="text-main-red py-2 px-3 border-2 border-solid border-main-red rounded-xl hover:bg-main-red hover:text-main-light transition duration-300 font-jura font-bold"
              >List Your Car?</a
            >
          </div>
        </nav>

        <div
          class="mt-6 md:mt-12 flex flex-col md:flex-row gap-4 md:gap-8 transition duration-300"
        >
          <aside
            class="font-inter md:bg-main-light md:shadow-lg rounded-xl w-full h-min md:w-auto py-6 md:px-12 md:first-letter:pr-16 md:py-16 sm:sticky top-4 sm:top-12 transition-all duration-300 flex flex-col gap-4 items-center md:items-start z-20"
          >
            <ol
              class="relative flex md:block text-gray-500 border-t md:border-t-0 md:border-l border-gray-200 dark:border-gray-700 dark:text-gray-400 child:relative md:child:static w-full justify-between md:w-auto md:gap-0"
            >
              <li class="mb-10 ml-6">
                <span
                  class="absolute flex items-center justify-center w-8 h-8 bg-main-red text-white rounded-full right-1/2 translate-x-1/4 md:-translate-x-0 md:-left-4 -top-4 md:top-0 ring-4 ring-gray-100 md:ring-white"
                  data-step
                >
                  1
                </span>
                <h3 class="font-medium leading-tight hidden md:block">
                  CAR INFORMATIONS
                </h3>
                <p class="text-xs hidden md:block">Specifications, Features.</p>
              </li>
              <li class="mb-10 ml-6">
                <span
                  class="absolute flex items-center justify-center w-8 h-8 bg-white md:bg-gray-100 rounded-full right-1/2 translate-x-1/4 md:-translate-x-0 md:-left-4 -top-4 md:top-auto ring-4 ring-gray-100 md:ring-white"
                  data-step
                >
                  2
                </span>
                <h3 class="font-medium leading-tight hidden md:block">
                  LICENSE & INSURANCE
                </h3>
                <p class="text-xs hidden md:block">
                  License Expiration, Plate Number.
                </p>
              </li>
              <li class="mb-10 ml-6">
                <span
                  class="absolute flex items-center justify-center w-8 h-8 bg-white md:bg-gray-100 rounded-full right-1/2 translate-x-1/4 md:-translate-x-0 md:-left-4 -top-4 md:top-auto ring-4 ring-gray-100 md:ring-white"
                  data-step
                >
                  3
                </span>
                <h3 class="font-medium leading-tight hidden md:block">
                  PHOTOS & PRICE
                </h3>
                <p class="text-xs hidden md:block">
                  Car Photos. Prices, Short & long rental,
                </p>
              </li>
              <li class="mb-10 ml-6">
                <span
                  class="absolute flex items-center justify-center w-8 h-8 bg-white md:bg-gray-100 rounded-full right-1/2 translate-x-1/4 md:-translate-x-0 md:-left-4 -top-4 md:top-auto ring-4 ring-gray-100 md:ring-white"
                  data-step
                >
                  4
                </span>
                <h3 class="font-medium leading-tight hidden md:block">
                  PARKING ADDRESS
                </h3>
                <p class="text-xs hidden md:block">
                  Parked Address Location for pickup.
                </p>
              </li>
              <li class="ml-6">
                <span
                  class="absolute flex items-center justify-center w-8 h-8 bg-white md:bg-gray-100 rounded-full right-1/2 translate-x-1/4 md:-translate-x-0 md:-left-4 -top-4 md:top-auto ring-4 ring-gray-100 md:ring-white"
                  data-step
                >
                  5
                </span>
                <h3 class="font-medium leading-tight hidden md:block">
                  publish
                </h3>
                <p class="text-xs hidden md:block">Specifications, Features.</p>
              </li>
            </ol>
            <div class="self-start md:hidden" data-mobile-headlines>
              <div class="">
                <h2
                  class="uppercase font-semibold text-main-red text-xl md:text-2xl"
                >
                  CAR INFORMATIONS
                </h2>
                <p class="text-sm text-gray-600">Specifications, Features.</p>
              </div>
              <div class="hidden">
                <h2
                  class="uppercase font-semibold text-main-red text-xl md:text-2xl"
                >
                  LICENSE & INSURANCE
                </h2>
                <p class="text-sm text-gray-600">Specifications, Features.</p>
              </div>
              <div class="hidden">
                <h2
                  class="uppercase font-semibold text-main-red text-xl md:text-2xl"
                >
                  PHOTOS AND PRICE
                </h2>
                <p class="text-sm text-gray-600">Specifications, Features.</p>
              </div>
              <div class="hidden">
                <h2
                  class="uppercase font-semibold text-main-red text-xl md:text-2xl"
                >
                  PARKING ADDRESS
                </h2>
                <p class="text-sm text-gray-600">Specifications, Features.</p>
              </div>
            </div>
          </aside>
          <div
            class="font-inter w-full md:w-5/6 bg-white rounded-xl md:shadow-lg"
          >
            <div data-form-container>
              <div class="">
                <div class="hidden md:flex flex-col items-center mt-10 mb-4">
                  <div class="text-center">
                    <h2 class="uppercase font-semibold text-xl md:text-2xl">
                      CAR INFORMATIONS
                    </h2>
                    <hr class="border-y-2 border-main-red" />
                  </div>
                </div>
                <section
                  class="container mx-auto md:px-8 child:grid child:grid-cols-1 child:lg:grid-cols-3 md:py-6 child:md:gap-x-4 child:cursor-pointer"
                >
                  <div>
                    <div class="mb-2 md:mb-4">
                      <label
                        for="base-input"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >Car title</label
                      >
                      <input
                        type="text"
                        required
                        id="base-input"
                        class="border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="ex: Smart-roadster"
                      />
                    </div>
                    <div class="mb-2 md:mb-4">
                      <label
                        for="base-input"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >Make</label
                      >
                      <input
                        type="text"
                        id="base-input"
                        class="border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="ex: smart"
                      />
                    </div>
                    <div class="mb-2 md:mb-4">
                      <label
                        for="base-input"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >Model</label
                      >
                      <input
                        type="text"
                        id="base-input"
                        class="border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="ex: roadster"
                      />
                    </div>
                    <div class="mb-2 md:mb-4">
                      <label
                        for="base-input"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >Year</label
                      >
                      <input
                        type="text"
                        id="base-input"
                        class="border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="2016"
                      />
                    </div>
                  </div>
                  <hr class="my-4 mb-6" />

                  <div>
                    <div class="mb-2 md:mb-4">
                      <label
                        for="base-input"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >Number of seats</label
                      >
                      <input
                        type="text"
                        id="base-input"
                        class="border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="ex: 4"
                      />
                    </div>
                    <div class="mb-2 md:mb-4">
                      <label
                        for="base-input"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >Number of doors</label
                      >
                      <input
                        type="text"
                        id="base-input"
                        class="border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="ex: 4"
                      />
                    </div>
                    <div class="mb-2 md:mb-4">
                      <label
                        for="FuelType"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >Fuel type</label
                      >
                      <select
                        id="FuelType"
                        class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                      >
                        <option>Option1</option>
                        <option>Option2</option>
                        <option>Option3</option>
                      </select>
                    </div>
                    <div class="mb-2 md:mb-4">
                      <label
                        for="Transmission"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >Transmission</label
                      >
                      <select
                        id="Transmission"
                        class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                      >
                        <option>Option1</option>
                        <option>Option2</option>
                        <option>Option3</option>
                      </select>
                    </div>
                    <div class="mb-2 md:mb-4">
                      <label
                        for="Transmission"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >Transmission</label
                      >
                      <select
                        id="Transmission"
                        class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                      >
                        <option>Option1</option>
                        <option>Option2</option>
                        <option>Option3</option>
                      </select>
                    </div>
                    <div class="mb-2 md:mb-4">
                      <label
                        for="Transmission"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >Transmission</label
                      >
                      <select
                        id="Transmission"
                        class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                      >
                        <option>Option1</option>
                        <option>Option2</option>
                        <option>Option3</option>
                      </select>
                    </div>
                    <div class="mb-2 md:mb-4">
                      <label
                        for="base-input"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >Model</label
                      >
                      <input
                        type="text"
                        id="base-input"
                        class="border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="ex: roadster"
                      />
                    </div>
                  </div>
                  <hr class="my-4 mb-6" />
                  <div class="!flex !flex-col">
                    <p class="mb-4 md:mb-6 text-xl md:text-2xl font-medium">
                      Extras:
                    </p>
                    <div class="grid !grid-cols-2 md:!grid-cols-4">
                      <!-- <div class=" flex items-center mb-4">
                    <input
                      checked
                      id="checkbox-1"
                      type="checkbox"
                      value=""
                      class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                    />
                    <label
                      for="checkbox-1"
                      class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                      >I agree to the
                      <a
                        href="#"
                        class="text-blue-600 hover:underline dark:text-blue-500"
                        >terms and conditions</a
                      >.</label
                    >
                  </div> -->

                      <div class="flex items-center mb-4">
                        <input
                          id="checkbox-2"
                          type="checkbox"
                          value=""
                          class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                        />
                        <label
                          for="checkbox-2"
                          class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                          >Audio input</label
                        >
                      </div>
                      <div class="flex items-center mb-4">
                        <input
                          id="checkbox-2"
                          type="checkbox"
                          value=""
                          class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                        />
                        <label
                          for="checkbox-2"
                          class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                          >Air Condition</label
                        >
                      </div>
                      <div class="flex items-center mb-4">
                        <input
                          id="checkbox-2"
                          type="checkbox"
                          value=""
                          class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                        />
                        <label
                          for="checkbox-2"
                          class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                          >Cruise Control</label
                        >
                      </div>
                      <div class="flex items-center mb-4">
                        <input
                          id="checkbox-2"
                          type="checkbox"
                          value=""
                          class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                        />
                        <label
                          for="checkbox-2"
                          class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                          >Roof Box</label
                        >
                      </div>
                      <div class="flex items-center mb-4">
                        <input
                          id="checkbox-2"
                          type="checkbox"
                          value=""
                          class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                        />
                        <label
                          for="checkbox-2"
                          class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                          >CD Player</label
                        >
                      </div>
                      <div class="flex items-center mb-4">
                        <input
                          id="checkbox-2"
                          type="checkbox"
                          value=""
                          class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                        />
                        <label
                          for="checkbox-2"
                          class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                          >GPS</label
                        >
                      </div>

                      <div class="flex items-center mb-4">
                        <input
                          id="checkbox-3"
                          type="checkbox"
                          value=""
                          class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                        />
                        <label
                          for="checkbox-3"
                          class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                          >Power Steering</label
                        >
                      </div>
                      <div class="flex items-center mb-4">
                        <input
                          id="checkbox-3"
                          type="checkbox"
                          value=""
                          class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                        />
                        <label
                          for="checkbox-3"
                          class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                          >Baby Seat</label
                        >
                      </div>

                      <!-- <div class="flex mb-4">
  
                    <div class="ml-2 text-sm">
                      <label
                        for="helper-checkbox"
                        class="font-medium text-gray-900 dark:text-gray-300"
                        >Free shipping via Flowbite</label
                      >
                      <p
                        id="helper-checkbox-text"
                        class="text-xs font-normal text-gray-500 dark:text-gray-400"
                      >
                        For orders shipped from $25 in books or $29 in other
                        categories
                      </p>
                    </div>
                  </div> -->
                    </div>
                  </div>
                  <hr class="my-4 mb-6" />

                  <div class="!flex !flex-col">
                    <label
                      for="message"
                      class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                      >CAR DESCRIPTION:</label
                    >
                    <textarea
                      id="message"
                      rows="8"
                      class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                      placeholder="general state, extras and accessories minor issuesto take in account"
                    ></textarea>
                  </div>
                </section>
              </div>
              <div class="hidden">
                <div class="hidden md:flex flex-col items-center mt-10 mb-4">
                  <div class="text-center">
                    <h2 class="uppercase font-semibold text-xl md:text-2xl">
                      LICENSE & INSURANCE
                    </h2>
                    <hr class="border-y-2 border-main-red" />
                  </div>
                </div>
                <section
                  class="container mx-auto md:px-8 md:py-6 child:md:gap-x-4"
                >
                  <div>
                    <p class="mb-4 md:mb-6 text-xl md:text-2xl font-semibold">
                      Car License:
                    </p>
                    <div
                      class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-2"
                    >
                      <div class="mb-2 md:mb-4">
                        <label
                          for="base-input"
                          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                          >Country of registeration</label
                        >
                        <input
                          type="text"
                          id="base-input"
                          class="border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                          placeholder="ex: Egypt"
                        />
                      </div>
                      <div class="mb-2 md:mb-4">
                        <label
                          for="city"
                          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                          >City</label
                        >
                        <select
                          id="city"
                          class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        >
                          <option>Option1</option>
                          <option>Option2</option>
                          <option>Option3</option>
                        </select>
                      </div>
                      <div class="mb-2 md:mb-4">
                        <label
                          for="base-input"
                          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                          >Plate number</label
                        >
                        <input
                          type="text"
                          id="base-input"
                          class="border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                          placeholder="plate number"
                        />
                      </div>
                      <div class="mb-2 md:mb-4">
                        <label
                          for="LED"
                          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                          >License expiration date</label
                        >
                        <input
                          type="date"
                          id="LED"
                          class="border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                          placeholder="2016"
                        />
                      </div>
                    </div>
                    <div class="mb-2 md:mb-4 mt-4">
                      <label
                        class="block mb-4 md:mb-6 text-xl md:text-2xl font-medium mt-4"
                        for="file_input"
                        >Upload Papers:</label
                      >
                      <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none pp-2 mt-2 sm:w-min"
                        aria-describedby="file_input_help"
                        id="file_input"
                        type="file"
                      />
                      <p
                        class="mt-1 text-sm text-gray-500"
                        id="file_input_help"
                      >
                        Please upload your car license in a PDF or JPG format
                        with maximum file size 5 MB.
                      </p>
                    </div>
                  </div>

                  <hr class="my-4 mb-6" />

                  <div>
                    <p class="mb-4 md:mb-6 text-xl md:text-2xl font-semibold">
                      Insurance:
                    </p>
                    <div
                      class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-2"
                    >
                      <div class="mb-2 md:mb-4">
                        <label
                          for="base-input"
                          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                          >Insurance yearly cost</label
                        >
                        <div class="flex">
                          <input
                            type="number"
                            id="base-input"
                            class="border border-gray-300 text-gray-900 text-sm rounded-l-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            value="0"
                          />
                          <span
                            class="border border-gray-300 border-l-0 rounded-r-md px-2 text-center leading-10"
                            >EGP</span
                          >
                        </div>
                      </div>
                      <div class="mb-2 md:mb-4">
                        <label
                          for="base-input"
                          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                          >Insurance excess value</label
                        >
                        <div class="flex">
                          <input
                            type="number"
                            id="base-input"
                            class="border border-gray-300 text-gray-900 text-sm rounded-l-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            value="0"
                          />
                          <span
                            class="border border-gray-300 border-l-0 rounded-r-md px-2 text-center leading-10"
                            >EGP</span
                          >
                        </div>
                      </div>
                    </div>
                    <div class="mb-2 md:mb-4 mt-4">
                      <label
                        class="block mb-4 md:mb-6 text-xl md:text-2xl font-medium mt-4"
                        for="file_input"
                        >Upload Papers:</label
                      >
                      <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none pp-2 mt-2 sm:w-min"
                        aria-describedby="file_input_help"
                        id="file_input"
                        type="file"
                      />
                      <p
                        class="mt-1 text-sm text-gray-500"
                        id="file_input_help"
                      >
                        Please upload your car insurance policy in a PDF or JPG
                        format with maximum file size 5 MB.
                      </p>
                    </div>
                  </div>

                  <hr class="my-4 mb-6" />

                  <div>
                    <p class="mb-4 md:mb-6 text-xl md:text-2xl font-semibold">
                      Phone Number:
                    </p>
                    <div
                      class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-2"
                    >
                      <div class="mb-2 md:mb-4">
                        <label
                          for="base-input"
                          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                          >Phone Number:</label
                        >
                        <div class="flex">
                          <span
                            class="border border-gray-300 border-r-0 rounded-l-md px-2 text-center leading-10"
                            >+20</span
                          >
                          <input
                            type="number"
                            id="base-input"
                            class="border border-gray-300 text-gray-900 text-sm rounded-r-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            value="0"
                          />
                        </div>
                      </div>
                    </div>
                    <div class="mb-2 md:mb-4 mt-4">
                      <label
                        class="block mb-4 md:mb-6 text-xl md:text-2xl font-medium mt-4"
                        for="file_input"
                        >Upload Papers:</label
                      >
                      <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none pp-2 mt-2 sm:w-min"
                        aria-describedby="file_input_help"
                        id="file_input"
                        type="file"
                      />
                      <p
                        class="mt-1 text-sm text-gray-500"
                        id="file_input_help"
                      >
                        Please upload your car insurance policy in a PDF or JPG
                        format with maximum file size 5 MB.
                      </p>
                    </div>
                  </div>
                </section>
              </div>
              <div class="hidden">
                <div class="hidden md:flex flex-col items-center mt-10 mb-4">
                  <div class="text-center">
                    <h2 class="uppercase font-semibold text-xl md:text-2xl">
                      PHOTOS AND PRICE
                    </h2>
                    <hr class="border-y-2 border-main-red" />
                  </div>
                </div>
                <section
                  class="container mx-auto md:px-8 md:py-6 child:md:gap-x-4"
                >
                  <div class="mb-4">
                    <p class="text-xl md:text-2xl font-bold">
                      You can upload up to 4 Pictures
                    </p>
                    <ul class="child:font-semibold">
                      <li class="text-gray-400">
                        Make sure to select clear pictures of your car to get
                        the attention of the borrowers.
                      </li>
                      <li class="text-main-red">
                        You have to upload at least one photo
                      </li>
                    </ul>
                    <div class="flex items-center justify-center mt-6 max-w-xs">
                      <label
                        for="dropzone-file"
                        class="flex flex-col items-center justify-center w-full h-64 border-2 border-main-red border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600"
                      >
                        <div
                          class="flex flex-col items-center justify-center pt-5 pb-6"
                        >
                          <svg
                            aria-hidden="true"
                            class="w-10 h-10 mb-3 text-main-red"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"
                            ></path>
                          </svg>
                          <p
                            class="mb-2 text-sm text-main-red dark:text-gray-400"
                          >
                            <span class="font-semibold">Click to upload</span>
                            or drag and drop
                          </p>
                          <p class="text-xs text-main-red dark:text-gray-400">
                            SVG, PNG, JPG or GIF (MAX. 800x400px)
                          </p>
                        </div>
                        <input id="dropzone-file" type="file" class="hidden" />
                      </label>
                    </div>
                  </div>
                  <div
                    class="mb-4 bg-gray-100 p-8 rounded-lg md:flex justify-between"
                  >
                    <div>
                      <h2 class="text-md md:text-xl font-bold mb-4">
                        RECOMMENDED DAILY PRICE
                      </h2>
                      <div class="mt-4">
                        <div class="flex justify-between">
                          <h3 class="font-medium text-gray-500 text-sm">
                            Market value of your car
                          </h3>
                          <p class="font-medium text-gray-500 text-sm">
                            <span id="priceValue" data-value3></span> EGP
                          </p>
                        </div>
                        <input
                          type="range"
                          min="100000"
                          max="10000000"
                          value="100000"
                          step="10000"
                          class="slider"
                          id="priceRange"
                          data-range3
                        />
                      </div>
                    </div>

                    <div
                      class="w-full md:w-auto bg-white rounded-lg p-4 py-8 md:p-8 flex justify-between gap-8 mt-4 border border-gray-200"
                    >
                      <p class="font-medium text-gray-500">
                        Recommended<br />Daily Price:
                      </p>
                      <div
                        class="bg-main-red/10 p-2 px-4 text-center rounded-lg"
                      >
                        <p
                          class="font-black text-main-red"
                          data-recommended-price
                        >
                          250
                        </p>
                        <span class="text-gray-500">EGP/Day</span>
                      </div>
                    </div>
                  </div>
                  <div class="mb-4 bg-gray-100 p-8 rounded-lg">
                    <div>
                      <h3 class="font-bold">
                        SELECT HOW YOU WANT TO LIST YOUR CAR
                      </h3>
                      <p class="font-medium text-main-red">
                        You have to select how you want to list your car
                      </p>
                    </div>
                    <div class="mt-4">
                      <div class="flex mb-4">
                        <input
                          checked
                          id="default-radio-2"
                          type="radio"
                          value=""
                          name="default-radio"
                          class="w-4 h-4 mt-0.5 text-main-red bg-gray-100 border-gray-300"
                        />
                        <div class="ml-2 text-sm">
                          <label
                            for="default-radio-2"
                            class="font-medium text-gray-900"
                            >Short Term</label
                          >

                          <p
                            id="helper-radio-text"
                            class="text-xs font-normal text-gray-500"
                          >
                            List your car for short period from 3 days to 3
                            months
                          </p>
                        </div>
                      </div>
                      <div>
                        <div
                          class="flex items-center pl-4 border border-gray-200 rounded mb-2"
                        >
                          <input
                            id="bordered-radio-1"
                            type="radio"
                            value=""
                            name="bordered-radio"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300"
                          />
                          <label
                            for="bordered-radio-1"
                            class="w-full py-4 ml-2 text-sm font-medium text-gray-900"
                            >Without a driver</label
                          >
                        </div>
                        <div
                          class="flex items-center pl-4 border border-gray-200 rounded"
                        >
                          <input
                            checked
                            id="bordered-radio-2"
                            type="radio"
                            value=""
                            name="bordered-radio"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300"
                          />
                          <label
                            for="bordered-radio-2"
                            class="w-full py-4 ml-2 text-sm font-medium text-gray-900"
                            >With a driver</label
                          >
                        </div>
                      </div>
                      <div class="flex my-4 mt-6">
                        <input
                          checked
                          id="default-radio-3"
                          type="radio"
                          value=""
                          name="default-radio"
                          class="w-4 h-4 mt-0.5 text-main-red bg-gray-100 border-gray-300"
                        />
                        <div class="ml-2 text-sm">
                          <label
                            for="default-radio-3"
                            class="font-medium text-gray-900"
                            >Long Term</label
                          >

                          <p
                            id="helper-radio-text"
                            class="text-xs font-normal text-gray-500"
                          >
                            For orders shipped from $25 in books or $29 in other
                            categories
                          </p>
                        </div>
                      </div>
                      <div
                        class="flex items-center pl-4 border border-gray-200 rounded"
                      >
                        <input
                          checked
                          id="bordered-radio-3"
                          type="radio"
                          value=""
                          name="bordered-radio"
                          class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300"
                        />
                        <label
                          for="bordered-radio-3"
                          class="w-full py-4 ml-2 text-sm font-medium text-gray-900"
                          >without a driver</label
                        >
                      </div>
                    </div>
                  </div>
                </section>
              </div>
              <div class="hidden">
                <div class="hidden md:flex flex-col items-center mt-10 mb-4">
                  <div class="text-center">
                    <h2 class="uppercase font-semibold text-xl md:text-2xl">
                      PARKING ADDRESS
                    </h2>
                    <hr class="border-y-2 border-main-red" />
                  </div>
                </div>
                <section
                  class="container mx-auto md:px-8 md:py-6 child:md:gap-x-4"
                >
                  <div class="relative">
                    <div id="map" class="w-full h-96 rounded-lg z-10"></div>
                    <div class="w-full h-96 rounded-lg absolute top-0 left-0">
                      <i
                        class="fa-solid fa-location-dot absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-20 text-red-700 text-xl"
                      ></i>
                      <button
                        class="py-2 px-4 rounded-md bg-main-red/50 text-white hover:bg-main-red/75 my-6 font-semibold absolute bottom-1 left-4 z-20"
                        onclick="confirmLocation()"
                      >
                        Confirm Location
                      </button>
                    </div>
                  </div>
                </section>
              </div>
            </div>

            <div class="font-jura !flex justify-center my-6 gap-4">
              <a
                type="submit"
                class="uppercase py-2.5 px-6 border-2 border-solid border-main-red rounded-xl font-bold text-main-red text-xs xl:text-lg"
                href="{{ url('/store') }}"
                target="_blank"
              >
                Finish Later
              </a>
              <button
                type="submit"
                class="uppercase py-3 px-14 md:px-16 bg-main-red text-main-light rounded-xl font-bold text-xs xl:text-lg cursor-pointer"
                data-next-btn
              >
                Next
              </button>
            </div>
          </div>
        </div>
        <article
          class="hidden opacity-0 w-full h-full child:absolute child:top-1/2 child:left-1/2 child:-translate-x-1/2 child:-translate-y-1/2 font-inter transition-all"
          data-sign-article
        >
          <div
            class="w-full md:w-1/2 lg:w-1/3 bg-main-light z-30 shadow-lg rounded-sm container p-6 flex flex-col items-center"
            data-sign-in-card
          >
            <p class="font-bold uppercase text-xl">Sign In</p>
            <div class="mt-6 w-full flex flex-col gap-6">
              <div>
                <div
                  class="flex justify-between items-center shadow-[0_0_2px_0_rgba(0,0,0,0.3)] rounded-md px-4 py-2 mb-4"
                >
                  <i class="fa-brands fa-google text-red-700 text-2xl"></i>
                  <p class="text-main-dark font-normal w-full text-center">
                    Continue with Google
                  </p>
                </div>
                <div
                  class="flex bg-[#1778F2] justify-between items-center shadow-[0_0_2px_0px_rgba(0,0,0,0.3)] rounded-md px-4 py-2"
                >
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
                  class="bg-gray-200 flex justify-between items-center shadow-[0_0_2px_0_rgba(0,0,0,0.3)] rounded-md px-4 py-2 mb-4"
                >
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
        <div
          class="hidden opacity-0 fixed top-0 left-0 w-full h-full bg-black/50 transition-all z-20"
          data-black-bg
        ></div>
      </div>
    </main>
    <footer class="bg-main-red w-full mt-20">
      <div
        class="container font-jura flex flex-col md:flex-row gap-4 w-full mx-auto text-white py-12 px-4 sm:px-0"
      >
        <div
          class="flex flex-col items-center lg:items-start text-center md:text-start gap-2"
        >
          <img
            src="{{ asset('web/assets/images/logo/logo3.png') }}"
            alt="drov logo"
            class="bg-white"
          />
          <p>
            DROVCAR is the first and leading marketplace for renting and lending
            cars serving the Middle East.<br />It's a simple, safe, and
            rewarding experience for car owners and a quick, interactive, and
            affordable one for car borrowers.
          </p>
          <div class="flex flex-col gap-4 items-center sm:items-start">
            <div
              class="flex justify-center sm:justify-start gap-2 items-center"
            >
              <i class="fa-solid fa-location-dot"></i>
              <p>Building 16, Dubai Internet City, Dubai, UAE</p>
            </div>
            <div
              class="flex justify-center sm:justify-start gap-2 items-center"
            >
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
            <button
              type="submit"
              class="uppercase py-2.5 px-6 border-2 border-solid border-main-light rounded-xl font-bold text-main-light text-xs xl:text-lg"
            >
              Message Us
            </button>
          </div>
        </div>
        <div
          class="container mx-auto grid justify-center grid-cols-2 lg:grid-cols-3 pt-6 gap-4"
        >
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
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_UBKEVvWDxXs-wf9_MtYyxKWPd1f8MJI&callback=initMap"
      async
      defer
    ></script>
    <script src="{{ asset('web/js/index.js') }}"></script>

    <script src="{{ asset('web/js/adding-car.js') }}"></script>
  </body>
</html>
