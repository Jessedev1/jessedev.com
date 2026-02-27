<!DOCTYPE html>
<!--
  Hey! Looking for the source code? 👀
  You can find the source code on GitHub: https://github.com/Jessedev1/jessedev.com 💻

  Don't worry — any bugs you find in here are on purpose. Consider them
  Easter eggs. The real bugs are in production, like God intended. 🐛

  Want to work together? Drop me a mail: info@jessedev.com 📧
  Or use the contact form. I'll be looking forward meeting you! 🤝
-->
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>Jesse de Vries - Full Stack Developer</title>
		<meta name="description" content="Building fast, elegant, human-centered digital experiences.">
		<link rel="canonical" href="https://jessedev.com/">
		<meta name="theme-color" content="#050508">
		<meta name="robots" content="index, follow">

		<meta property="og:type" content="website">
		<meta property="og:url" content="https://jessedev.com/">
		<meta property="og:title" content="Jesse de Vries - Full Stack Developer">
		<meta property="og:description" content="Building fast, elegant, human-centered digital experiences.">
		<meta property="og:image" content="{{ asset('images/og_image.png') }}">

		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:url" content="https://jessedev.com/">
		<meta name="twitter:title" content="Jesse de Vries - Full Stack Developer">
		<meta name="twitter:description" content="Building fast, elegant, human-centered digital experiences.">
		<meta name="twitter:image" content="{{ asset('images/og_image.png') }}">

		<script type="application/ld+json">
		{
			"@@context": "https://schema.org",
			"@@graph": [
				{
					"@@type": "WebSite",
					"@@id": "{{ url('/') }}/#website",
					"name": "Jesse de Vries - Full Stack Developer",
					"url": "{{ url('/') }}/",
					"description": "Building fast, elegant, human-centered digital experiences."
				},
				{
					"@@type": "Person",
					"@@id": "{{ url('/') }}/#person",
					"name": "Jesse de Vries",
					"url": "{{ url('/') }}/",
					"jobTitle": "Full Stack Developer",
					"description": "Full-stack developer from The Netherlands, building digital apps and websites with 9+ years of experience.",
					"sameAs": [
						"https://github.com/Jessedev1",
						"https://www.linkedin.com/in/jessedev/"
					]
				}
			]
		}
		</script>

		<link rel="icon" type="image/png" href="{{ asset('favicon.png') }}" size="32x32">
		<link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">

		<link rel="preload" href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=Space+Mono:ital,wght@0,400;0,700;1,400&display=swap" as="style">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=Space+Mono:ital,wght@0,400;0,700;1,400&display=swap" media="print" onload="this.media='all'">
		<noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=Space+Mono:ital,wght@0,400;0,700;1,400&display=swap"></noscript>

		@vite(['resources/css/app.css', 'resources/js/app.js'])
		@livewireStyles
		@livewireScripts
		@stack('head')
	</head>
	<body class="bg-[#050508] text-[#e8e8f0] font-sans antialiased">
		{{-- Custom Cursor --}}
		<div id="cursor" class="cursor"></div>
		<div id="cursorRing" class="cursor-ring"></div>

		{{-- Grid Background --}}
		<div class="grid-bg"></div>

		{{-- Noise Overlay --}}
		<div class="noise"></div>

		{{-- Navigation --}}
		<x-nav />

		{{-- Main Content --}}
		<main>
			{{ $slot }}
		</main>

		{{-- Footer --}}
		<x-footer />
	</body>

	<script>
		window.addEventListener('load', () => {
			var s = document.createElement('script');
			s.src = 'https://www.googletagmanager.com/gtag/js?id=G-6907JQZQ7F';
			s.async = true;
			document.body.appendChild(s);
		});
	</script>

	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'G-6907JQZQ7F');
	</script>
</html>
