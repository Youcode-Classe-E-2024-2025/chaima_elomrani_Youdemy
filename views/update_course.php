<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Course</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'clair': {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        @keyframes shimmer {
            0% {
                background-position: -1000px 0;
            }

            100% {
                background-position: 1000px 0;
            }
        }

        .animate-shimmer {
            animation: shimmer 2s infinite linear;
            background: linear-gradient(to right, #f6f7f8 0%, #edeef1 20%, #f6f7f8 40%, #f6f7f8 100%);
            background-size: 1000px 100%;
        }
    </style>


    <style>
        .markdown-editor {
            min-height: 200px;
            font-family: 'Menlo', 'Monaco', 'Courier New', monospace;
        }

        .tagify {
            --tags-border-color: #e2e8f0;
            --tags-hover-border-color: #cbd5e0;
            --tags-focus-border-color: #4299e1;
            width: 100%;
            max-width: 100%;
            color: #000000;
        }

        .tagify__dropdown {
            color: #000000 !important;
        }

        .tagify__dropdown__item {
            color: #000000 !important;
        }
    </style>
</head>
<body>
<!-- <div id="addCourseModal" class=" bg-gray-600  overflow-y-auto  "> -->
            <div
                class="relative h-full w-full top-20 mx-auto p-5 border-black w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white ">
                <div class="mt-3 text-center">
                    <h3 class="text-lg leading-6 font-medium text-black">Add New Course</h3>
                    <form id="addCourseForm" class="mt-2 text-left"
                        action="http://<?= $_SERVER['HTTP_HOST'] ?>/index.php?action=addCourse" method="POST">
                        <div class="mb-4">
                            <label for="courseTitle" class="block text-sm font-medium ">Course Title</label>
                            <input type="text" id="courseTitle" name="name" required
                                class="mt-1 block w-full rounded-md border-black shadow-sm focus:border-clair-500 focus:ring focus:ring-clair-500 focus:ring-opacity-50">
                        </div>
                        <div class="mb-4">
                            <label for="courseDescription" class="block text-sm font-medium text-black ">Course
                                Description
                                (Markdown supported)</label>
                            <textarea id="courseDescription" name="description" rows="6"
                                class="markdown-editor mt-1 block w-full rounded-md border-black shadow-sm focus:border-clair-500 focus:ring focus:ring-clair-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white"></textarea>
                        </div>
                        <div class="mb-4 flex space-x-4">
                            <div class="w-full">
                                <label for="courseCategory"
                                    class="block text-md font-medium text-gray-700">Category</label>
                                <select id="courseCategory" name="category" required
                                    class="mt-1 block w-full py-2 rounded-[5px] border-black shadow-sm focus:border-clair-500 focus:ring focus:ring-clair-500 focus:ring-opacity-50">
                                    <option value="">Select a category</option>
                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?= htmlspecialchars($category['id']) ?>">
                                            <?= htmlspecialchars($category['name']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="w-full">
                                <label for="courseTags" class="block text-sm font-medium text-black">Tags</label>
                                <select id="courseTags" name="tags[]" multiple
                                    class="mt-1 block w-full rounded-md border-black focus:border-clair-500 focus:ring focus:ring-clair-500 focus:ring-opacity-50">

                                    <?php foreach ($tags as $tag): ?>
                                        <option value="<?= $tag['id'] ?>"> <?= $tag['title'] ?></option>
                                    <?php endforeach; ?>

                                </select>

                            </div>
                        </div>

                        <label class="block text-sm font-medium text-black" for="price">Price</label>
                        <input type="text" placeholder="Enter Price"
                            class="mt-1 block w-full py-2 mb-[20px] rounded-md border-black shadow-sm focus:border-clair-500 focus:ring focus:ring-clair-500 focus:ring-opacity-50"
                            name="price">

                        <div id="imageUrlInput" class="mb-4 ">
                            <label for="courseImage"
                                class="block text-sm py-4font-medium text-gray-700 dark:text-gray-300">Course Image
                                URL</label>
                            <input type="url" id="courseImage" name="image"
                                class="mt-1 py-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-clair-500 focus:ring focus:ring-clair-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>
                        <div id="videoUrlInput" class="mb-4 ">
                            <label for="courseVideo"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Course Video
                                URL</label>
                            <input type="url" id="courseVideo" name="video"
                                class="mt-1 py-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-clair-500 focus:ring focus:ring-clair-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>
                        <div class="mt-5 sm:mt-6 flex justify-end space-x-2">
                            <button type="button" id="cancelAddCourse"
                                class="inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-clair-500 sm:text-sm dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600">
                                Cancel
                            </button>
                            <button type="submit"
                                class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-clair-600 text-base font-medium text-white hover:bg-clair-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-clair-500 sm:text-sm">
                                Add Course
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <script>
                            const simplemde = new SimpleMDE({ element: document.getElementById("courseDescription") });

        </script>

</body>
</html>