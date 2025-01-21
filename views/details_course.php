<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Course Details - WREB</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

  <!-- Course Details Section -->
  <div class=" ">
    <div class="w-full mx-auto  overflow-hidden">
      <!-- Course Image -->
      <div class="relative h-64 overflow-hidden">
        <img src="../images/js.jpg" alt="Course Image" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
          <h1 class="text-4xl font-bold text-white">JS full</h1>
        </div>
      </div>

      <!-- Course Content -->
      <div class="p-8">
        <!-- Course Description -->
        <div class="mb-8">
          <h2 class="text-2xl font-bold text-gray-800 mb-4">Course Description</h2>
          <p class="text-gray-600 leading-relaxed">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
          </p>
        </div>

        <!-- Course Video -->
        <div class="mb-8">
          <h2 class="text-2xl font-bold text-gray-800 mb-4">Course Video</h2>
          <div class="aspect-w-16 aspect-h-9">
            <iframe class="w-[60%] flex mb-[10%] justify-self-center h-full rounded-lg shadow-md" src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="Course Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>

        <!-- Course Details -->
        <div class="mb-8">
          <h2 class="text-2xl font-bold text-gray-800 mb-4">Course Details</h2>
          <ul class="list-disc list-inside text-gray-600">
            <li>Duration: 12 Weeks</li>
            <li>Level: Intermediate</li>
            <li>Instructor: John Doe</li>
            <li>Language: English</li>
            <li>Certificate: Yes</li>
          </ul>
        </div>

        <!-- Call to Action -->
        <div class="text-center">
          <a href="#" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300">
            Enroll Now
          </a>
        </div>
      </div>
    </div>
  </div>

</body>
</html>