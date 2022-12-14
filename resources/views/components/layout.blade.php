<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body style="font-family: 'Open Sans', sans-serif;">
    <section class="px-6 py-3 lg:py-4">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/logo.svg" alt="logo" width="165" height="16">
                </a>
            </div>
            <div class="mt-8 md:mt-4">
                <a href="#" class="text-sm font-bold uppercase">Home Page</a>
                <a href="#"
                    class="bg-blue-500 ml-3 rounded-full text-sm text-white px-4 py-3 font-semibold uppercase">Subscribe
                    for Updates</a>
            </div>
        </nav>

        {{ $slot }}

        <footer class="bg-gray-100 rounded-2xl px-2 py-12 border border-black-10 max-w-6xl mx-auto text-center mt-8">
            <img src="/images/lary-newsletter-icon.png" alt="lara newsletter" class="mx-auto" style="width: 175px;">
            <h4 class="text-3xl">Stay in touch with the latest posts</h4>
            <div class="text-sm">
                Primise to keep the inbox clean. No bugs.
            </div>

            <div class="mt-3 sm:bg-gray-200 rounded-full inline-flex mt-5 text-sm">
                <form action="#">
                    <div class="px-4 py-3 inline-flex items-center">
                        <label for="email" class="hidden md:inline">
                            <img src="/images/mailbox-icon.svg" alt="mail">
                        </label>
                        <input id="email" type="text" placeholder="Your email address"
                            class="md:bg-transparent focus-within:outline-none md:ml-3">
                    </div>
                    <button type="submit"
                        class="uppercase bg-blue-500 text-sm text-white rounded-full px-7 py-3 font-semibold hover:bg-blue-600 transition-colors duration-300">Subscribe</button>
                </form>

            </div>
        </footer>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.5/dist/cdn.min.js"></script>
    </section>
</body>

</html>
