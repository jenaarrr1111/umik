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
    <div role="alert">
    @error('email')
  <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
    Alert
  </div>
  <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
    <p><p>{{$message}}</P></p>
  </div>
</div>
    
                                    
                                @enderror
        <div class="flex flex-col bg-[#D9D9D9] items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <img src="{{url('umik.png')}}" alt="UMIK Logo" class="w-32 mb-4">
            <div class="w-full bg-white rounded-lg drop-shadow-2xl md:mt-0 sm:max-w-md xl:p-0">
                <div class="flex">
                    <div class="mx-auto p-1  md:space-y-6 sm:p-8">
                        <h1 class="ml-16  font-bold text-gray-900 md:text-2xl">Sign in</h1>
                        <div class="flex ">

                       
                        <form action="/login" method="post" class="space-y-4 md:space-y-6" >
                            @csrf
                            <div class="flex relative mb-6">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-800 dark:text-gray-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                    </svg>
                                </div>
                                <input value="{{old ('email')}}"type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-100 dark:border-gray-600 dark:placeholder-gray-600 dark:focus:ring-blue-500" placeholder="Email" required="" autofocus>
                                
                            </div>
                            <div class="flex relative mb-6">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" stroke-width="3.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                                <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-100 dark:border-gray-600 dark:placeholder-gray-600 dark:focus:ring-blue-500" placeholder="Password" required="">
                            </div>
                            <div class="flex items-center">
                                <button type="submit" name="submit" class="mt-14 ml-12 py-2 px-8 mr-2 mb-16 text-sm font-medium text-white-100 focus:outline-none bg-[#092F69]/75 rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-[3F4E4F] dark:text-gray-100 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-500">Sign in</button>
                            </div>
                        </form>
                    </div>
                    </div>
                                    </div>
            </div>
        </div>
    </section>
