
   <!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Welcome to Bengkel</title>
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   </head>
   <body>
       <div class="container mt-5">
           <div class="jumbotron text-center">
               <h1>WELCOME TO SISBENG</h1>
               <p>Sistem Catatan Akuntansi Bengkel AJM</p>
               <a href="{{ route('login') }}">Login</a>
               
               <a href="{{ route('register') }}">Register</a>
           </div>
       </div>
   </body>
   </html>
