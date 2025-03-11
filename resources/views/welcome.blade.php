<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fiesta Celebration Portal</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50 text-gray-800">
  <!-- Header Section -->
  <header class="bg-orange-500 text-white py-4">
    <div class="container mx-auto flex justify-between items-center px-4">
      <div class="logo">
        <img src="logo.png" alt="Fiesta Portal Logo" class="h-12">
      </div>
      <nav>
        <ul class="flex space-x-6"> 
          <li><a href="#home" class="hover:text-orange-200">Home</a></li>
          <li><a href="#about" class="hover:text-orange-200">About</a></li>
          <li><a href="#features" class="hover:text-orange-200">Features</a></li>
          <li><a href="#demo" class="hover:text-orange-200">Demo</a></li>
          <li><a href="#contact" class="hover:text-orange-200">Contact</a></li>
          <li><a href="login" class="bg-white text-orange-500 px-4 py-2 rounded-lg hover:bg-orange-100">Login</a></li>
          <li><a href="register" class="bg-white text-orange-500 px-4 py-2 rounded-lg hover:bg-orange-100">Register</a></li>
          
          @auth
          <a href="{{ url('/dashboard') }}"</a>
      @else
          <a href="{{ route('login') }}" Log in</a>

          @if (Route::has('register'))
              <a href="{{ route('register') }}" Register</a>
          @endif
      @endauth
        
        
        </ul>
      </nav>
    </div>
  </header>

  <!-- Hero Section -->
  <section id="hero" class="bg-cover bg-center h-screen flex items-center justify-center" style="background-image: url('fiesta-bg.jpg');">
    <div class="text-center text-black">
      <h1 class="text-5xl font-bold mb-6">Web-Portal Fiesta Celebration Information Management System</h1>
      <p class="text-2xl mb-8">Empowering Festivals with Real-Time Descriptive Analytics</p>
      <div class="space-x-4">
        <a href="#features" class="bg-orange-500 text-white px-8 py-3 rounded-lg hover:bg-orange-600">Explore Features</a>
        <a href="#login" class="bg-white text-orange-500 px-8 py-3 rounded-lg hover:bg-orange-100">Get Started</a>
      </div>
    </div>
  </section>

  <!-- Features Section -->
  <section id="features" class="py-16">
    <div class="container mx-auto px-4">
      <h2 class="text-4xl font-bold text-center mb-12">What We Offer</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8">
        <div class="bg-white p-6 rounded-lg shadow-lg text-center">
          <i class="fas fa-chart-line text-4xl text-orange-500 mb-4"></i>
          <h3 class="text-xl font-bold mb-2">Real-Time Analytics</h3>
          <p class="text-gray-600">Monitor event metrics in real-time.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg text-center">
          <i class="fas fa-calendar-alt text-4xl text-orange-500 mb-4"></i>
          <h3 class="text-xl font-bold mb-2">Event Management</h3>
          <p class="text-gray-600">Easily organize and schedule fiesta activities.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg text-center">
          <i class="fas fa-users text-4xl text-orange-500 mb-4"></i>
          <h3 class="text-xl font-bold mb-2">Attendee Tracking</h3>
          <p class="text-gray-600">Track guest attendance and engagement.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg text-center">
          <i class="fas fa-coins text-4xl text-orange-500 mb-4"></i>
          <h3 class="text-xl font-bold mb-2">Budget Planning</h3>
          <p class="text-gray-600">Manage expenses and allocate resources efficiently.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg text-center">
          <i class="fas fa-file-alt text-4xl text-orange-500 mb-4"></i>
          <h3 class="text-xl font-bold mb-2">Custom Reports</h3>
          <p class="text-gray-600">Generate detailed reports for better decision-making.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Demo Section -->
  <section id="demo" class="py-16 bg-gray-100">
    <div class="container mx-auto px-4 text-center">
      <h2 class="text-4xl font-bold mb-12">See It in Action</h2>
      <div class="flex justify-center">
        <iframe class="w-full max-w-4xl h-96 rounded-lg shadow-lg" src="https://www.youtube.com/embed/example" frameborder="0" allowfullscreen></iframe>
      </div>
      <a href="#demo" class="mt-8 bg-orange-500 text-white px-8 py-3 rounded-lg hover:bg-orange-600">Try the Demo</a>
    </div>
  </section>

  <!-- Testimonials Section -->
  <section id="testimonials" class="py-16">
    <div class="container mx-auto px-4 text-center">
      <h2 class="text-4xl font-bold mb-12">What Our Users Say</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="bg-white p-8 rounded-lg shadow-lg">
          <img src="user1.jpg" alt="User 1" class="w-20 h-20 rounded-full mx-auto mb-4">
          <p class="text-gray-600 mb-4">"This system transformed how we manage our town fiesta!"</p>
          <h4 class="text-xl font-bold">Maria, Event Organizer</h4>
        </div>
        <div class="bg-white p-8 rounded-lg shadow-lg">
          <img src="user2.jpg" alt="User 2" class="w-20 h-20 rounded-full mx-auto mb-4">
          <p class="text-gray-600 mb-4">"The real-time analytics are a game-changer!"</p>
          <h4 class="text-xl font-bold">Juan, Festival Coordinator</h4>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer Section -->
  <footer class="bg-gray-800 text-white py-8">
    <div class="container mx-auto px-4 text-center">
      <div class="flex justify-center space-x-6 mb-4">
        <a href="#about" class="hover:text-orange-500">About Us</a>
        <a href="#privacy" class="hover:text-orange-500">Privacy Policy</a>
        <a href="#terms" class="hover:text-orange-500">Terms of Service</a>
        <a href="#faq" class="hover:text-orange-500">FAQ</a>
      </div>
      <div class="mb-4">
        <p>Email: support@fiestaportal.com</p>
        <p>Phone: +123 456 7890</p>
      </div>
      <div class="flex justify-center space-x-6 mb-4">
        <a href="#" class="text-2xl hover:text-orange-500"><i class="fab fa-facebook"></i></a>
        <a href="#" class="text-2xl hover:text-orange-500"><i class="fab fa-twitter"></i></a>
        <a href="#" class="text-2xl hover:text-orange-500"><i class="fab fa-instagram"></i></a>
        <a href="#" class="text-2xl hover:text-orange-500"><i class="fab fa-linkedin"></i></a>
      </div>
      <p class="text-sm">© 2023 Web-Portal Fiesta. All rights reserved.</p>
    </div>
  </footer>
</body>
</html>