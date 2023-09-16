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
  <body>
    <main class="flex flex-col items-center overflow-x-hidden">
      <div class="px-6 sm:px-0 container py-6 lg:py-8">
        <nav class="flex justify-between items-center font-inter">
          <div class="flex items-center gap-4 md:gap-6 lg:gap-8">
            <img
              class="w-16 md:w-24"
              src="{{ asset('web/assets/images/logo/logo.png') }}"
              alt="DROV Logo"
            />
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
        <section class="font-jura mt-16 sm:mt-28 relative">
          <div class="mb-6">
            <p
              class="uppercase font-bold text-2xl md:text-3xl lg:text-4xl xl:text-5xl mb-2"
            >
              <span class="text-main-red">fast and easy</span> way to<br />
              rent a car
            </p>
            <p
              class="sm:max-w-sm md:max-w-md xl:max-w-lg capitalize font-medium"
            >
              discover rental car rental options in egypt with rent a car select
              from a range of car options and local special
            </p>
          </div>
          <div class="flex flex-col items-center">
            <div
              class="sm:hidden relative w-full h-36 flex flex-col items-center"
            >
              <img
                src="{{ asset('web/assets/images/stocks/cars/car1.png') }}"
                alt=""
                srcset=""
                class="absolute h-full"
              />
            </div>
            <div
              class="w-screen bg-main-red flex flex-col items-center py-6 lg:py-8"
            >
              <form
                action=""
                class="container flex flex-col text-center sm:items-start justify-between gap-12"
              >
                <div>
                  <a
                    type="submit"
                    class="uppercase py-2.5 px-6 border-2 border-solid border-main-light rounded-xl font-bold text-white text-xs xl:text-lg"
                    href="{{ url('/store') }}"
                    target="_blank"
                  >
                    book now
                  </a>
                  <button
                    type="submit"
                    class="uppercase py-3 px-6 bg-main-light text-main-red rounded-xl font-bold text-xs xl:text-lg"
                  >
                    contact us
                  </button>
                </div>
                <div
                  class="flex flex-col items-center gap-6 sm:items-start max-w-5xl"
                >
                  <div>
                    <button
                      type="submit"
                      class="uppercase py-3 px-6 bg-main-light text-main-red rounded-lg font-bold text-xs xl:text-md"
                    >
                      short term
                    </button>
                    <button
                      type="submit"
                      class="uppercase py-2.5 px-6 border-2 border-solid border-main-light rounded-lg font-bold text-white text-xs xl:text-md"
                    >
                      long term
                    </button>
                  </div>
                  <div
                    class="flex gap-4 w-full flex-wrap shadow-[0_5px_15px_5px_rgba(0,0,0,0.1)] p-6 rounded-lg"
                  >
                    <div>
                      <label
                        for="location"
                        class="capitalize text-main-light block mb-2"
                        >where to pick up</label
                      >
                      <input
                        id="location"
                        type="text"
                        class="w-full sm:w-auto bg-main-light/20 text-main-light placeholder-white py-1.5 px-6 outline-none rounded-lg"
                        placeholder="Enter your location"
                      />
                    </div>
                    <div>
                      <label
                        for="date1"
                        class="capitalize text-main-light block mb-2"
                        >from</label
                      >
                      <div
                        class="child:bg-main-light/20 child:text-main-light child:placeholder-white child:py-1.5 child:px-6 child:outline-none child:rounded-lg"
                      >
                        <input id="date1" type="date" />
                        <input id="time1" type="time" value="00:00" />
                      </div>
                    </div>
                    <div>
                      <label
                        for="date2"
                        class="capitalize text-main-light block mb-2"
                        >to</label
                      >
                      <div
                        class="child:bg-main-light/20 child:text-main-light child:placeholder-white child:py-1.5 child:px-6 child:outline-none child:rounded-lg"
                      >
                        <input id="date2" type="date" />
                        <input id="time2" type="time" value="00:00" />
                      </div>
                    </div>
                  </div>

                  <a
                    type="submit"
                    class="uppercase py-3 px-24 bg-main-light text-main-red rounded-lg font-bold text-xs xl:text-md sm:self-end"
                    href="{{ url('/store') }}"
                    target="_blank"
                  >
                    find cars
                  </a>
                </div>
              </form>
            </div>
          </div>
          <img
            src="{{ asset('web/assets/images/stocks/cars/car1.png') }}"
            alt=""
            srcset=""
            class="hidden sm:block absolute top-0 right-0 sm:w-96 sm:top-24 md:top-20 md:w-[28rem] lg:top-0 lg:w-[38rem] xl:w-[40rem]"
          />
        </section>
        <section
          class="font-jura mt-16 sm:mt-28 flex flex-col items-center gap-8 sm:gap-20"
        >
          <div class="text-center">
            <h2 class="uppercase font-normal text-xl md:text-2xl">
              how it works
            </h2>
            <p class="capitalize font-bold text-2xl md:text-3xl">
              rent go following 3 working steps
            </p>
          </div>
          <div class="flex flex-col sm:flex-row xl:w-2/3 text-center">
            <div class="flex flex-col items-center gap-2">
              <i
                class="fa-solid fa-location-dot bg-gray-100 text-3xl text-main-red p-4 px-6 rounded-lg shadow-lg border-2 border-solid border-white mb-4 lg:text-5xl lg:p-8 lg:px-11 lg:rounded-xl xl:rounded-2xl"
              ></i>
              <p class="capitalize font-bold lg:text-xl xl:w-48">
                choose a location
              </p>
              <span class="capitalize text-center font-medium"
                >see 3 popular hotels at heavily discounted price</span
              >
            </div>
            <div class="w-full h-48">
              <div
                class="w-2/3 sm:w-full sm:mt-8 h-full sm:h-2/3 rounded-full sm:rounded-[99%] border-2 border-dashed border-main-red border-b-transparent border-l-transparent border-t-transparent sm:border-t-main-red sm:border-r-transparent lg:"
              ></div>
            </div>
            <div class="flex flex-col items-center gap-2">
              <i
                class="fa-solid fa-calendar-check bg-gradient-to-b from-[#AA0100] to-[#FF0100] text-3xl text-main-light p-4 px-6 rounded-lg shadow-lg mb-4 lg:text-5xl lg:p-8 lg:px-11 lg:rounded-xl xl:rounded-2xl"
              ></i>
              <p class="capitalize font-bold lg:text-xl xl:w-48">
                pick-up date
              </p>
              <span class="capitalize text-center font-medium"
                >click choose and we’ll pick one of the 3 hotels.</span
              >
            </div>
            <div class="w-full h-48 flex justify-end">
              <div
                class="w-2/3 sm:w-full h-full sm:h-2/3 rounded-full sm:rounded-[99%] border-2 border-dashed border-main-red border-b-transparent border-r-transparent border-t-transparent sm:border-b-main-red sm:border-l-transparent"
              ></div>
            </div>
            <div class="flex flex-col items-center gap-2">
              <i
                class="fa-solid fa-calendar-plus bg-gray-100 text-3xl text-main-red p-4 px-6 rounded-lg shadow-lg border-2 border-solid border-white mb-4 lg:text-5xl lg:p-8 lg:px-11 lg:rounded-xl xl:rounded-2xl"
              ></i>
              <p class="capitalize font-bold lg:text-xl xl:w-48">
                book your car
              </p>
              <span class="capitalize text-center font-medium"
                >see which hotel right after you book!</span
              >
            </div>
          </div>
        </section>
        <section
          class="font-jura mt-16 sm:mt-28 flex flex-col items-center lg:flex-row gap-8"
        >
          <div class="w-full h-full py-20 lg:py-48 lg:w-1/2 relative">
            <img
              src="{{ asset('web/assets/images/stocks/cars/car2.png') }}"
              alt="car1"
              srcset=""
              class=""
            />
            <svg
              viewBox="0 10 150 150"
              xmlns="http://www.w3.org/2000/svg"
              class="absolute h-96 md:h-full left-0 lg:right-0 top-0 -z-10"
            >
              <path
                fill="#fd1717"
                d="M40.9-64.6C54-63.2 66.3-54.3 66.2-42.3 66.1-30.3 53.6-15.1 52.4-.7 51 18 61.3 27.5 62 40.5 62.6 53.4 53.8 65.6 41.9 70.4 29.9 75.2 0 70-30 58-71 38-80 9-80 3-81-8-72-36-26-53-6-61 27.7-66 40.9-64.6Z"
                transform="translate(80 80)"
              />
            </svg>
          </div>
          <div
            class="flex flex-col items-center sm:items-start gap-8 sm:gap-20 lg:w-1/2"
          >
            <div>
              <h2
                class="text-center sm:text-start uppercase font-normal text-xl md:text-2xl"
              >
                best services
              </h2>
              <p
                class="text-center sm:text-start capitalize font-bold text-2xl md:text-3xl"
              >
                feel the best experience with our rental deals
              </p>
            </div>
            <div class="flex flex-col gap-8 child:gap-2 child:md:gap-6">
              <div class="flex items-center">
                <i
                  class="fa-solid fa-coins bg-gray-100 text-3xl text-main-red p-4 px-5 rounded-xl shadow-lg border-2 border-solid border-white mb-4 lg:text-5xl lg:p-8 lg:px-9 lg:rounded-2xl xl:rounded-2xl"
                ></i>
                <div>
                  <p class="capitalize font-bold lg:text-xl">
                    deals for every budget
                  </p>
                  <span class="capitalize text-center text-xs font-medium"
                    >incredible prices on hotels. flights, cars, and packages
                    worldwide</span
                  >
                </div>
              </div>
              <div class="flex items-center">
                <i
                  class="fa-solid fa-star bg-gray-100 text-3xl text-main-red p-4 px-5 rounded-xl shadow-lg border-2 border-solid border-white mb-4 lg:text-5xl lg:p-8 lg:px-9 lg:rounded-2xl xl:rounded-2xl"
                ></i>
                <div>
                  <p class="capitalize font-bold lg:text-xl">
                    best price guaranted
                  </p>
                  <span class="capitalize text-center text-xs font-medium"
                    >find a lower price? we’ll refund you 100% of the
                    difference</span
                  >
                </div>
              </div>
              <div class="flex items-center">
                <i
                  class="fa-solid fa-headset bg-gray-100 text-3xl text-main-red p-4 px-5 rounded-xl shadow-lg border-2 border-solid border-white mb-4 lg:text-5xl lg:p-8 lg:px-9 lg:rounded-2xl xl:rounded-2xl"
                ></i>
                <div>
                  <p class="capitalize font-bold lg:text-xl">support 24/7</p>
                  <span class="capitalize text-center text-xs font-medium"
                    >find a lower price? we’ll refund you 100% of the
                    difference</span
                  >
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="mt-16 sm:mt-28 flex flex-col items-center gap-6">
          <div class="text-center font-jura">
            <h2 class="uppercase font-normal text-xl md:text-2xl">
              all products
            </h2>
            <p class="capitalize font-bold text-2xl md:text-3xl">
              we have everything you need
            </p>
          </div>
          <div
            class="container mx-auto grid justify-center sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 pt-6 gap-4"
          >
            <div class="rounded-3xl relative font-inter">
              <div
                class="w-full h-1/4 bg-gradient-to-b from-black/75 absolute top-0 rounded-t-3xl"
              ></div>
              <img
                src="{{ asset('web/assets/images/stocks/products/product1.png') }}"
                alt="product1 pic"
                class="rounded-3xl"
              />
              <div
                class="w-full h-2/4 bg-gradient-to-t from-black absolute bottom-0 rounded-b-3xl"
              ></div>
              <div
                class="flex flex-col justify-between h-full items-start absolute text-white top-4 left-6"
              >
                <div class="flex gap-4 items-center">
                  <img
                    src="{{ asset('web/assets/images/stocks/profile-pic/pp1.png') }}"
                    alt="user profile picture"
                    class="w-12 h-12 rounded-full object-cover"
                  />
                  <p class="leading-4">
                    <span class="font-bold">Bakr</span><br />Mohamed
                  </p>
                </div>
                <div class="flex flex-col gap-1">
                  <p class="text-white/90 text-2xl font-bold">
                    Kia-Cerato
                    <span class="text-white/75 text-xs font-normal"
                      >Model - 2015</span
                    >
                  </p>
                  <p class="text-white text-2xl font-bold">
                    2604 EGP
                    <span class="text-white/75 text-xs font-normal"
                      >Total for 7d</span
                    >
                  </p>
                  <div class="flex gap-2 mb-10">
                    <i class="fa-solid fa-star text-yellow-400"></i>
                    <i class="fa-solid fa-star text-yellow-400"></i>
                    <i class="fa-solid fa-star text-yellow-400"></i>
                    <i class="fa-solid fa-star text-yellow-400"></i>
                    <i class="fa-solid fa-star text-yellow-400"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="rounded-3xl relative font-inter">
              <div
                class="w-full h-1/4 bg-gradient-to-b from-black/75 absolute top-0 rounded-t-3xl"
              ></div>
              <img
                src="{{ asset('web/assets/images/stocks/products/product1.png') }}"
                alt="product1 pic"
                class="rounded-3xl"
              />
              <div
                class="w-full h-2/4 bg-gradient-to-t from-black absolute bottom-0 rounded-b-3xl"
              ></div>
              <div
                class="flex flex-col justify-between h-full items-start absolute text-white top-4 left-6"
              >
                <div class="flex gap-4 items-center">
                  <img
                    src="{{ asset('web/assets/images/stocks/profile-pic/pp1.png') }}"
                    alt="user profile picture"
                    class="w-12 h-12 rounded-full object-cover"
                  />
                  <p class="leading-4">
                    <span class="font-bold">Bakr</span><br />Mohamed
                  </p>
                </div>
                <div class="flex flex-col gap-1">
                  <p class="text-white/90 text-2xl font-bold">
                    Kia-Cerato
                    <span class="text-white/75 text-xs font-normal"
                      >Model - 2015</span
                    >
                  </p>
                  <p class="text-white text-2xl font-bold">
                    2604 EGP
                    <span class="text-white/75 text-xs font-normal"
                      >Total for 7d</span
                    >
                  </p>
                  <div class="flex gap-2 mb-10">
                    <i class="fa-solid fa-star text-yellow-400"></i>
                    <i class="fa-solid fa-star text-yellow-400"></i>
                    <i class="fa-solid fa-star text-yellow-400"></i>
                    <i class="fa-solid fa-star text-yellow-400"></i>
                    <i class="fa-solid fa-star text-yellow-400"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="rounded-3xl relative font-inter">
              <div
                class="w-full h-1/4 bg-gradient-to-b from-black/75 absolute top-0 rounded-t-3xl"
              ></div>
              <img
                src="{{ asset('web/assets/images/stocks/products/product1.png') }}"
                alt="product1 pic"
                class="rounded-3xl"
              />
              <div
                class="w-full h-2/4 bg-gradient-to-t from-black absolute bottom-0 rounded-b-3xl"
              ></div>
              <div
                class="flex flex-col justify-between h-full items-start absolute text-white top-4 left-6"
              >
                <div class="flex gap-4 items-center">
                  <img
                    src="{{ asset('web/assets/images/stocks/profile-pic/pp1.png') }}"
                    alt="user profile picture"
                    class="w-12 h-12 rounded-full object-cover"
                  />
                  <p class="leading-4">
                    <span class="font-bold">Bakr</span><br />Mohamed
                  </p>
                </div>
                <div class="flex flex-col gap-1">
                  <p class="text-white/90 text-2xl font-bold">
                    Kia-Cerato
                    <span class="text-white/75 text-xs font-normal"
                      >Model - 2015</span
                    >
                  </p>
                  <p class="text-white text-2xl font-bold">
                    2604 EGP
                    <span class="text-white/75 text-xs font-normal"
                      >Total for 7d</span
                    >
                  </p>
                  <div class="flex gap-2 mb-10">
                    <i class="fa-solid fa-star text-yellow-400"></i>
                    <i class="fa-solid fa-star text-yellow-400"></i>
                    <i class="fa-solid fa-star text-yellow-400"></i>
                    <i class="fa-solid fa-star text-yellow-400"></i>
                    <i class="fa-solid fa-star text-yellow-400"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="rounded-3xl relative font-inter">
              <div
                class="w-full h-1/4 bg-gradient-to-b from-black/75 absolute top-0 rounded-t-3xl"
              ></div>
              <img
                src="{{ asset('web/assets/images/stocks/products/product1.png') }}"
                alt="product1 pic"
                class="rounded-3xl"
              />
              <div
                class="w-full h-2/4 bg-gradient-to-t from-black absolute bottom-0 rounded-b-3xl"
              ></div>
              <div
                class="flex flex-col justify-between h-full items-start absolute text-white top-4 left-6"
              >
                <div class="flex gap-4 items-center">
                  <img
                    src="{{ asset('web/assets/images/stocks/profile-pic/pp1.png') }}"
                    alt="user profile picture"
                    class="w-12 h-12 rounded-full object-cover"
                  />
                  <p class="leading-4">
                    <span class="font-bold">Bakr</span><br />Mohamed
                  </p>
                </div>
                <div class="flex flex-col gap-1">
                  <p class="text-white/90 text-2xl font-bold">
                    Kia-Cerato
                    <span class="text-white/75 text-xs font-normal"
                      >Model - 2015</span
                    >
                  </p>
                  <p class="text-white text-2xl font-bold">
                    2604 EGP
                    <span class="text-white/75 text-xs font-normal"
                      >Total for 7d</span
                    >
                  </p>
                  <div class="flex gap-2 mb-10">
                    <i class="fa-solid fa-star text-yellow-400"></i>
                    <i class="fa-solid fa-star text-yellow-400"></i>
                    <i class="fa-solid fa-star text-yellow-400"></i>
                    <i class="fa-solid fa-star text-yellow-400"></i>
                    <i class="fa-solid fa-star text-yellow-400"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="rounded-3xl relative font-inter">
              <div
                class="w-full h-1/4 bg-gradient-to-b from-black/75 absolute top-0 rounded-t-3xl"
              ></div>
              <img
                src="{{ asset('web/assets/images/stocks/products/product1.png') }}"
                alt="product1 pic"
                class="rounded-3xl"
              />
              <div
                class="w-full h-2/4 bg-gradient-to-t from-black absolute bottom-0 rounded-b-3xl"
              ></div>
              <div
                class="flex flex-col justify-between h-full items-start absolute text-white top-4 left-6"
              >
                <div class="flex gap-4 items-center">
                  <img
                    src="{{ asset('web/assets/images/stocks/profile-pic/pp1.png') }}"
                    alt="user profile picture"
                    class="w-12 h-12 rounded-full object-cover"
                  />
                  <p class="leading-4">
                    <span class="font-bold">Bakr</span><br />Mohamed
                  </p>
                </div>
                <div class="flex flex-col gap-1">
                  <p class="text-white/90 text-2xl font-bold">
                    Kia-Cerato
                    <span class="text-white/75 text-xs font-normal"
                      >Model - 2015</span
                    >
                  </p>
                  <p class="text-white text-2xl font-bold">
                    2604 EGP
                    <span class="text-white/75 text-xs font-normal"
                      >Total for 7d</span
                    >
                  </p>
                  <div class="flex gap-2 mb-10">
                    <i class="fa-solid fa-star text-yellow-400"></i>
                    <i class="fa-solid fa-star text-yellow-400"></i>
                    <i class="fa-solid fa-star text-yellow-400"></i>
                    <i class="fa-solid fa-star text-yellow-400"></i>
                    <i class="fa-solid fa-star text-yellow-400"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div>
            <p class="font-jura capitalize font-bold text-2xl inline">
              And much much more!...
            </p>
            <a
              href="{{ url('/store') }}"
              class="font-inter inline text-main-red"
              >Explore -></a
            >
          </div>
        </section>
        <section class="mt-16 sm:mt-28 flex flex-col items-center gap-6">
          <div class="text-center font-jura">
            <h2 class="uppercase font-normal text-xl md:text-2xl">
              our brands
            </h2>
            <p class="capitalize font-bold text-2xl md:text-3xl">
              we are trusted
            </p>
          </div>
          <div
            class="container mx-auto grid justify-center grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 pt-6 gap-4 child:rounded-3xl child:p-6 child:sm:p-16 child:shadow-xl child:flex child:items-center child:justify-center"
          >
            <div>
              <img src="{{ asset('web/assets/images/brands/mazda.png') }}" alt="Mazda Logo" />
            </div>
            <div>
              <img src="{{ asset('web/assets/images/brands/nissan.png') }}" alt="Mazda Logo" />
            </div>
            <div>
              <img src="{{ asset('web/assets/images/brands/audi.png') }}" alt="Mazda Logo" />
            </div>
            <div>
              <img
                src="{{ asset('web/assets/images/brands/Volkswagen.png') }}"
                alt="Mazda Logo"
              />
            </div>
            <div>
              <img src="{{ asset('web/assets/images/brands/toyota.png') }}" alt="Mazda Logo" />
            </div>
            <div>
              <img src="{{ asset('web/assets/images/brands/fiat.png') }}" alt="Mazda Logo" />
            </div>
          </div>
        </section>
        <section
          class="font-jura mt-16 sm:mt-36 flex flex-col items-center gap-14 relative"
        >
          <svg
            viewBox="0 10 150 150"
            xmlns="http://www.w3.org/2000/svg"
            class="hidden md:block absolute h-96 md:h-full md:right-[95%] opacity-25"
          >
            <path
              fill="#fd1717"
              d="M40.9-64.6C54-63.2 66.3-54.3 66.2-42.3 66.1-30.3 53.6-15.1 52.4-.7 51 18 61.3 27.5 62 40.5 62.6 53.4 53.8 65.6 41.9 70.4 29.9 75.2 0 70-30 58-71 38-80 9-80 3-81-8-72-36-26-53-6-61 27.7-66 40.9-64.6Z"
              transform="translate(80 80)"
            />
          </svg>
          <svg
            viewBox="0 10 150 150"
            xmlns="http://www.w3.org/2000/svg"
            class="hidden md:block absolute -scale-x-100 h-96 md:h-full md:left-[95%] opacity-25"
          >
            <path
              fill="#fd1717"
              d="M40.9-64.6C54-63.2 66.3-54.3 66.2-42.3 66.1-30.3 53.6-15.1 52.4-.7 51 18 61.3 27.5 62 40.5 62.6 53.4 53.8 65.6 41.9 70.4 29.9 75.2 0 70-30 58-71 38-80 9-80 3-81-8-72-36-26-53-6-61 27.7-66 40.9-64.6Z"
              transform="translate(80 80)"
            />
          </svg>
          <div class="text-center">
            <h2 class="uppercase font-normal text-xl md:text-2xl">
              Sign up as a business customer to tailor the package that your
              needs the best
            </h2>
            <p class="capitalize font-bold text-2xl md:text-3xl">
              BUSINESS SOLUTIONS
            </p>
          </div>
          <div
            class="container mx-auto grid justify-center sm:grid-cols-2 md:grid-cols-[repeat(3,minmax(0,250px))] pt-6 gap-6"
          >
            <div class="flex flex-col items-center gap-2">
              <i class="fa-solid fa-arrows-rotate text-6xl lg:text-7xl"></i>
              <p class="capitalize font-bold lg:text-xl text-center">
                Replacement car in case of accident
              </p>
              <span class="capitalize text-center font-medium"
                >Convenience all the way, on the spot car replacement</span
              >
            </div>
            <div class="flex flex-col items-center gap-2">
              <i
                class="fa-solid fa-hand-holding-dollar text-6xl lg:text-7xl"
              ></i>
              <p class="capitalize font-bold lg:text-xl">All - In prices</p>
              <span class="capitalize text-center font-medium"
                >What you see is really what you pay. No hidden charges (Vehicle
                maintenance cost included)</span
              >
            </div>
            <div class="flex flex-col items-center gap-2">
              <i class="fa-regular fa-clock text-6xl lg:text-7xl"></i>
              <p class="capitalize font-bold lg:text-xl">
                Flexible business terms
              </p>
              <span class="capitalize text-center font-medium"
                >Place, amend and cancel bookings free of charge 24/7, 365 days
                a year online or through our customer care team.</span
              >
            </div>
          </div>
          <div class="flex flex-col gap-2 sm:flex-row">
            <button
              type="submit"
              class="uppercase py-2.5 px-6 border-2 border-solid border-main-red rounded-xl font-bold text-main-red text-xs xl:text-lg"
            >
              request a quotation
            </button>
            <button
              type="submit"
              class="uppercase py-3 px-16 bg-main-red text-main-light rounded-xl font-bold text-xs xl:text-lg"
            >
              contact us
            </button>
          </div>
        </section>
        <article
          class="hidden opacity-0 w-full h-full child:absolute child:top-1/2 child:left-1/2 child:-translate-x-1/2 child:-translate-y-1/2 font-inter transition-all"
          data-sign-article
        >
          <div
            class="w-full md:w-1/2 lg:w-1/3 bg-main-light z-10 shadow-lg rounded-sm container p-6 flex flex-col items-center"
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
          class="hidden opacity-0 fixed top-0 left-0 w-full h-full bg-black/50 transition-all"
          data-black-bg
        ></div>
      </div>
    </main>
    <section
      class="container font-jura flex flex-col items-center mx-auto sm:mt-28 w-full"
    >
      <div class="text-center">
        <h2 class="uppercase font-normal text-xl md:text-2xl">how it works</h2>
        <hr class="border-y-2 border-main-red" />
      </div>
      <div
        class="flex flex-col gap-6 bg-main-red rounded-[4rem] lg:rounded-[8rem] mt-16 py-12 lg:py-20 lg:pb-32"
      >
        <div class="flex flex-col items-center gap-2 text-white">
          <i class="fa-solid fa-car text-6xl lg:text-7xl"></i>
          <p class="capitalize font-bold lg:text-xl text-center">owner</p>
          <span class="capitalize text-center font-medium"
            >List your car now and start gaining money</span
          >
        </div>
        <div class="shape1 w-full py-16 pt-6 bg-white px-4 lg:py-36 shadow-xl">
          <div
            class="container mx-auto grid justify-center sm:grid-cols-2 lg:grid-cols-[repeat(4,minmax(0,250px))] pt-6 gap-6"
          >
            <div class="flex flex-col items-center gap-2">
              <i class="fa-solid fa-car text-6xl lg:text-7xl text-main-red"></i>
              <p class="capitalize font-bold lg:text-xl text-center">Verify</p>
              <span class="capitalize text-center font-medium"
                >upload the needed documents and wait for our team to verify
                your borrower's account.</span
              >
            </div>
            <div class="flex flex-col items-center gap-2">
              <i
                class="fa-solid fa-circle-question text-6xl lg:text-7xl text-main-red"
              ></i>
              <p class="capitalize font-bold lg:text-xl text-center">
                Choose & request
              </p>
              <span class="capitalize text-center font-medium"
                >Enter the exact dates of when you will require a car, to choose
                the one you want.</span
              >
            </div>
            <div class="flex flex-col items-center gap-2">
              <i
                class="fa-solid fa-handshake text-6xl lg:text-7xl text-main-red"
              ></i>
              <p class="capitalize font-bold lg:text-xl">Meet 'Drov'</p>
              <span class="capitalize text-center font-medium"
                >Get to meet your 'drov' Owner and pick up the keys.</span
              >
            </div>
            <div class="flex flex-col items-center gap-2">
              <i
                class="fa-solid fa-sack-dollar text-6xl lg:text-7xl text-main-red"
              ></i>
              <p class="capitalize font-bold lg:text-xl">
                ENJOY THE EXPERIENCE
              </p>
              <span class="capitalize text-center font-medium"
                >Need we say more? Experience the roads like never before
                without paying much.</span
              >
            </div>
          </div>
        </div>
        <div class="flex flex-col items-center gap-2 text-white">
          <i class="fa-solid fa-key text-6xl lg:text-7xl"></i>
          <p class="capitalize font-bold lg:text-xl text-center">borrower</p>
          <span class="capitalize text-center font-medium"
            >Drive the car of your dream with affordable prices</span
          >
        </div>
        <div class="shape2 w-full py-16 pt-6 bg-white px-4 lg:py-36 shadow-xl">
          <div
            class="container mx-auto grid justify-center sm:grid-cols-2 lg:grid-cols-[repeat(4,minmax(0,250px))] pt-6 gap-6"
          >
            <div class="flex flex-col items-center gap-2">
              <i
                class="fa-solid fa-circle-check text-6xl lg:text-7xl text-main-red"
              ></i>
              <p class="capitalize font-bold lg:text-xl text-center">Verify</p>
              <span class="capitalize text-center font-medium"
                >upload the needed documents and wait for our team to verify
                your borrower's account.</span
              >
            </div>
            <div class="flex flex-col items-center gap-2">
              <i class="fa-solid fa-car text-6xl lg:text-7xl text-main-red"></i>
              <p class="capitalize font-bold lg:text-xl text-center">
                Choose & request
              </p>
              <span class="capitalize text-center font-medium"
                >Enter the exact dates of when you will require a car, to choose
                the one you want.</span
              >
            </div>
            <div class="flex flex-col items-center gap-2">
              <i
                class="fa-solid fa-handshake text-6xl lg:text-7xl text-main-red"
              ></i>
              <p class="capitalize font-bold lg:text-xl">Meet 'Drov'</p>
              <span class="capitalize text-center font-medium"
                >Get to meet your 'drov' Owner and pick up the keys.</span
              >
            </div>
            <div class="flex flex-col items-center gap-2">
              <i class="fa-solid fa-key text-6xl lg:text-7xl text-main-red"></i>
              <p class="capitalize font-bold lg:text-xl">
                ENJOY THE EXPERIENCE
              </p>
              <span class="capitalize text-center font-medium"
                >Need we say more? Experience the roads like never before
                without paying much.</span
              >
            </div>
          </div>
        </div>
      </div>
    </section>
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
    <script src="{{ asset('web/js/index.js') }}"></script>
  </body>
</html>
