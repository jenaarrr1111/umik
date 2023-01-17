<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Utk sementara pake cdn, krn sebelum pake cdn, ada class yg ga punya efek sama sekali -->
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
    <section class="bg-gray-50">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <a href="#" class="flex items-center mb-6 text-2xl font-bold text-gray-900">
          UMIK    
      </a>
      <div class="w-full bg-white rounded-lg shadow-2xl bg-gray-100 border-gray-500/100 md:mt-0 sm:max-w-md xl:p-0">
        <div class="flex">
          <div class="mx-auto p-1  md:space-y-6 sm:p-8">
              <h1 class="ml-20 mb-8 font-bold text-gray-900 md:text-2xl">
                  Sign in
                    </h1>
                        <div class="flex ">
                            <button type="button" class="ml-4  text-white bg-[#5A5A5A]/70 hover:bg-[#4285F4]/90 focus:ring-4 focus:outline-none focus:ring-[#4285F4]/50 font-medium rounded-lg text-sm px-10 py-2.5 text-center inline-flex items-center dark:focus:ring-[#4285F4]/55 mr-2 mb-8">
                            <svg class="w-4 h-4 mr-2 ml-1" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="google" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 488 512"><path fill="currentColor" d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"></path></svg>
                            Sign in with Google 
                        </button>
                        </div>
              <form class="space-y-4 md:space-y-6" action="#">
                  <div class="flex">
                    <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full md:px-8 dark:bg-gray-100 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Email" required="">
                  </div>
                  <div class="flex">
                    <input type="password" name="password" id="password" placeholder="Password" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full md:px-8 dark:bg-gray-100 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                  </div>
                  <div class="flex items-center">
                  <button type="submit" class="mt-14 ml-16 py-2 px-8 mr-2 mb-16 text-sm font-medium text-white-100 focus:outline-none bg-[#3F4E4F] rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-[3F4E4F] dark:text-gray-100 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-500">Sign in</button>
                  </div>
              </form>
          </div>
      </div>
    </div>
</div>
</section>