<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Website Resmi Himpunan Mahasiswa Mesin (HMM) FT-IRS Institut Teknologi Sepuluh Nopember Surabaya. Wadah eskalasi dan karya mahasiswa mesin ITS.">
    <meta name="keywords" content="HMM ITS, Mahasiswa Mesin ITS, Teknik Mesin ITS, Garda Aksara, FT-IRS ITS">
    <title>HMM ITS - Himpunan Mahasiswa Mesin FT-IRS ITS</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/logo_hmm.png') }}">
    <link rel="icon" type="image/png" sizes="48x48" href="{{ asset('images/logo_hmm.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/logo_hmm.png') }}">
    <link rel="shortcut icon" href="{{ asset('images/logo_hmm.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo_hmm.png') }}">

    {{-- Open Graph / Social Media Meta Tags --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="HMM ITS - Himpunan Mahasiswa Mesin FT-IRS ITS">
    <meta property="og:description" content="Website Resmi Himpunan Mahasiswa Mesin (HMM) FT-IRS Institut Teknologi Sepuluh Nopember Surabaya. Wadah eskalasi dan karya mahasiswa mesin ITS.">
    <meta property="og:image" content="{{ asset('images/logo_hmm.png') }}">

    {{-- Twitter Card Meta Tags --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="HMM ITS - Himpunan Mahasiswa Mesin FT-IRS ITS">
    <meta name="twitter:description" content="Website Resmi Himpunan Mahasiswa Mesin (HMM) FT-IRS Institut Teknologi Sepuluh Nopember Surabaya. Wadah eskalasi dan karya mahasiswa mesin ITS.">
    <meta name="twitter:image" content="{{ asset('images/logo_hmm.png') }}">

    {{-- Google Organization Schema (Structured Data) --}}
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "EducationalOrganization",
      "name": "HMM ITS",
      "alternateName": "Himpunan Mahasiswa Mesin FT-IRS ITS",
      "url": "https://hmmits.com",
      "logo": "https://hmmits.com/images/logo_hmm.png",
      "sameAs": [
        "https://www.instagram.com/hmm_its",
        "https://www.its.ac.id/mesin"
      ],
      "description": "Website Resmi Himpunan Mahasiswa Mesin (HMM) FT-IRS Institut Teknologi Sepuluh Nopember Surabaya."
    }
    </script>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- AOS CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    {{-- Vite Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body style="background-color:#0a0a0a; color:#e5e5e5; font-family:Inter,sans-serif;">

    {{-- Navbar --}}
    @include('components.navbar')

    {{-- Main Content --}}
    <main>
        {{ $slot }}
    </main>

    {{-- Footer --}}
    @include('components.footer')

    {{-- Alpine.js (public frontend) --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- AOS JS --}}
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 700, once: true, offset: 80 });
    </script>

    @stack('scripts')
</body>
</html>
