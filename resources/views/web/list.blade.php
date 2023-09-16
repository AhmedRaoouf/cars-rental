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
              href="{{ url('/addingcar') }}"
              class="text-main-red py-2 px-3 border-2 border-solid border-main-red rounded-xl hover:bg-main-red hover:text-main-light transition duration-300 font-jura font-bold"
              >List Your Car?</a
            >
          </div>
        </nav>
        <section class="font-jura mt-10 sm:mt-8 relative">
          <div class="flex flex-col items-center">
            <div
              class="w-screen bg-[url({{ asset('web/assets/images/stocks/listbg.jpg') }})] bg-center bg-cover flex flex-col items-center"
            >
              <div class="py-52 text-center text-white">
                <div class="font-inter">
                  <h2 class="text-3xl md:text-5xl font-bold">
                    SHARING THAT TRUST
                  </h2>
                  <hr class="my-2 lg:my-3" />
                  <p class="font-medium">Simple, Safe and Rewarding</p>
                </div>
                <a
                  href="{{ url('/addingcar') }}"
                  class="mt-12 border inline-block border-solid border-white rounded-md px-4 py-1.5 sm:text-xl capitalize"
                >
                  list your car
                </a>
              </div>
            </div>
          </div>
        </section>
        <section
          class="font-jura mt-16 sm:mt-30 flex flex-col items-center gap-8 md:gap-14"
        >
          <div class="text-center">
            <h2 class="uppercase font-normal text-xl md:text-2xl">
              PEACE OF MIND
            </h2>
            <hr class="border-y-2 border-main-red" />
          </div>
          <div
            class="container mx-auto grid justify-center sm:grid-cols-2 md:grid-cols-3 pt-6 gap-6"
          >
            <div class="flex flex-col items-center gap-2 md:gap-6">
              <i
                class="fa-regular fa-handshake text-6xl lg:text-9xl text-main-red"
              ></i>
              <p class="capitalize font-bold lg:text-xl text-center">
                TRUSTED NETWORK
              </p>
              <span class="capitalize text-center font-medium"
                >Every borrower within our network goes through a screening
                process before their accounts get verified. So, rest assured,
                you’re in good hands.</span
              >
            </div>
            <div class="flex flex-col items-center gap-2 md:gap-6">
              <i
                class="fa-solid fa-shield-halved text-6xl lg:text-9xl text-main-red"
              ></i>
              <p class="capitalize font-bold lg:text-xl">INSURANCE</p>
              <span class="capitalize text-center font-medium"
                >We make sure every car registered is insured, and handle
                collecting the borrowing fees, and/or any other charges until
                they reach your bank account.</span
              >
            </div>
            <div class="flex flex-col items-center gap-2 md:gap-6">
              <i
                class="fa-solid fa-car-rear text-6xl lg:text-9xl text-main-red"
              ></i>
              <p class="capitalize font-bold lg:text-xl">SAFETY</p>
              <span class="capitalize text-center font-medium"
                >You control who gets to borrow your car. You can check the
                borrower's profile, reviews and rating before accepting or
                denying a request.</span
              >
            </div>
          </div>
        </section>
        <section
          class="font-jura mt-16 sm:mt-30 flex flex-col items-center gap-8 md:gap-14"
        >
          <div
            class="w-screen bg-gray-100 flex flex-col items-center py-12 px-4 sm:px-0 gap-8 md:gap-14"
          >
            <div class="text-center">
              <h2 class="uppercase font-normal text-xl md:text-2xl">
                how it works
              </h2>
              <hr class="border-y-2 border-main-red" />
            </div>
            <div
              class="container mx-auto grid justify-center sm:grid-cols-2 md:grid-cols-4 pt-6 gap-6"
            >
              <div class="flex flex-col items-center gap-2 md:gap-4">
                <i
                  class="fa-solid fa-car-rear text-6xl lg:text-7xl text-main-red"
                ></i>
                <p class="capitalize font-bold lg:text-xl text-center">
                  LIST YOUR CAR
                </p>
                <span class="capitalize text-center font-medium"
                  >Turn your car into a money-making machine, in less than 5
                  minutes.</span
                >
              </div>
              <div class="flex flex-col items-center gap-2 md:gap-4">
                <i
                  class="fa-solid fa-circle-question text-6xl lg:text-7xl text-main-red"
                ></i>
                <p class="capitalize font-bold lg:text-xl">YOU ARE COVERED</p>
                <span class="capitalize text-center font-medium"
                  >With a borrower's verification system and professional
                  support center.</span
                >
              </div>
              <div class="flex flex-col items-center gap-2 md:gap-4">
                <img
                  src="{{ asset('web/assets/images/logo/logo.png') }}"
                  alt="Drov logo"
                  class="h-16"
                />
                <!-- <i
                  class="fa-solid fa-car-rear text-6xl lg:text-7xl text-main-red"
                ></i> -->
                <p class="capitalize font-bold lg:text-xl">Meet 'Drov'</p>
                <span class="capitalize text-center font-medium"
                  >Get to meet your 'drov' borrower and handover the keys.</span
                >
              </div>
              <div class="flex flex-col items-center gap-2 md:gap-4">
                <i
                  class="fa-solid fa-sack-dollar text-6xl lg:text-7xl text-main-red"
                ></i>
                <p class="capitalize font-bold lg:text-xl">
                  RELAX & GET REWARDED
                </p>
                <span class="capitalize text-center font-medium"
                  >Experience our safe and secure community, while enjoying
                  extra income.</span
                >
              </div>
            </div>
            <a
              href="{{ url('/addingcar') }}"
              class="mt-12 border border-solid border-main-red text-main-red rounded-md px-4 py-1.5 sm:text-xl capitalize"
            >
              Get Started
            </a>
          </div>
        </section>
        <section
          class="font-jura mt-16 sm:mt-30 flex flex-col items-center gap-8 md:gap-14"
        >
          <div class="text-center">
            <h2 class="uppercase font-normal text-xl md:text-2xl">
              BECAUSE I CARE
            </h2>
            <hr class="border-y-2 border-main-red" />
          </div>
          <p class="font-semibold text-center max-w-3xl">
            “Cars are one of the top contributors to greenhouse gas emissions
            globally... Studies have shown that the results of car sharing
            services are good, both for the environment and for reducing
            unnecessary personal budget burdens.”
          </p>
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
    <script src="{{ asset('web/js/list.js') }}"></script>
  </body>
</html>
