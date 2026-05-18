@extends('layout.dashboard')

@php
    $header = 'false';
    $footer = 'false';
@endphp

@section('dashboard-content')
<!-- Plyr CSS -->
<link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />

<style>
    body {
        background-color: #0f1115;
    }
    
    .video-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        padding: 20px;
    }

    .video-wrapper {
        position: relative;
        width: 100%;
        max-width: 1100px;
        background: #000;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 20px 50px rgba(0,0,0,0.8);
    }

    /* Watermark floating animation */
    .watermark {
        position: absolute;
        top: 10%;
        left: 10%;
        color: rgba(255, 255, 255, 0.35);
        font-size: 1.8rem;
        font-weight: 900;
        pointer-events: none; /* Prevent blocking clicks on video */
        user-select: none;
        z-index: 9999; /* ensure it's above Plyr controls */
        text-shadow: 2px 2px 4px rgba(0,0,0,0.9);
        animation: floatWatermark 25s linear infinite;
        white-space: nowrap;
        background: rgba(0,0,0,0.2);
        padding: 10px 20px;
        border-radius: 10px;
        backdrop-filter: blur(2px);
    }

    @keyframes floatWatermark {
        0% { top: 10%; left: 10%; transform: scale(1); }
        25% { top: 70%; left: 15%; transform: scale(1.1); }
        50% { top: 65%; left: 55%; transform: scale(1); }
        75% { top: 15%; left: 55%; transform: scale(0.9); }
        100% { top: 10%; left: 10%; transform: scale(1); }
    }

    .back-header {
        width: 100%;
        max-width: 1100px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .lesson-title {
        color: #fff;
        margin: 0;
        font-weight: bold;
    }

    .back-btn-hero {
        background: rgba(255,255,255,0.1);
        color: #fff;
        padding: 12px 25px;
        border-radius: 100px;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
        text-decoration: none;
        border: 1px solid rgba(255,255,255,0.2);
    }

    .back-btn-hero:hover {
        background: #667eea;
        color: #fff;
        border-color: #667eea;
        transform: translateY(-3px);
    }
    
    /* Make Plyr player take full space */
    .plyr {
        height: 650px;
        border-radius: 20px;
    }

    /* Hide Youtube specific branding by scaling up */
    .plyr__video-wrapper {
        overflow: hidden !important;
        border-radius: 20px;
    }
    
    .plyr__video-embed iframe {
        transform: scale(1.3);
        pointer-events: none !important; /* Prevent interacting with youtube elements */
    }
    
    /* Hide Youtube specific branding inside plyr if any sneaks through */
    .plyr--youtube.plyr--paused.plyr__poster-enabled:not(.plyr--stopped) .plyr__poster {
        display: none;
    }
</style>

<div class="video-container">
    <div class="back-header">
        <h3 class="lesson-title">{{ $lesson->title }}</h3>
        <a href="{{ route('courses.show', $lesson->section->course->id) }}" class="back-btn-hero">
            <i class="feather-arrow-right"></i>
            <span>العودة للكورس</span>
        </a>
    </div>

    <div class="video-wrapper">
        <div class="watermark">
            {{ $user->name }} - {{ $user->email }}
        </div>

        @if(str_contains($videoUrl, 'youtube.com') || str_contains($videoUrl, 'youtu.be'))
            @php
                preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i', $videoUrl, $matches);
                $youtubeId = $matches[1] ?? '';
            @endphp
            @if($youtubeId)
                <div class="plyr__video-embed" id="player">
                    <iframe
                        src="https://www.youtube.com/embed/{{ $youtubeId }}?origin={{ request()->getSchemeAndHttpHost() }}&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1&amp;controls=0"
                        allowfullscreen
                        allowtransparency
                        allow="autoplay"
                    ></iframe>
                </div>
            @else
                <video id="player" controls controlsList="nodownload" oncontextmenu="return false;">
                    <source src="{{ $videoUrl }}" type="video/mp4">
                </video>
            @endif
        @elseif(str_contains($videoUrl, 'vimeo.com'))
            @php
                preg_match('/vimeo\.com\/([0-9]+)/i', $videoUrl, $matches);
                $vimeoId = $matches[1] ?? '';
            @endphp
            @if($vimeoId)
                <div class="plyr__video-embed" id="player">
                    <iframe
                        src="https://player.vimeo.com/video/{{ $vimeoId }}?loop=false&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media"
                        allowfullscreen
                        allowtransparency
                        allow="autoplay"
                    ></iframe>
                </div>
            @else
                <video id="player" controls controlsList="nodownload" oncontextmenu="return false;">
                    <source src="{{ $videoUrl }}" type="video/mp4">
                </video>
            @endif
        @else
            <video id="player" controls controlsList="nodownload" oncontextmenu="return false;">
                <source src="{{ $videoUrl }}" type="video/mp4">
                متصفحك لا يدعم تشغيل الفيديو.
            </video>
        @endif
    </div>
</div>

<!-- Plyr JS -->
<script src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const player = new Plyr('#player', {
            controls: [
                'play-large', // The large play button in the center
                'play', // Play/pause playback
                'progress', // The progress bar and scrubber for playback and buffering
                'current-time', // The current time of playback
                'duration', // The full duration of the media
                'mute', // Toggle mute
                'volume', // Volume control
                'captions', // Toggle captions
                'settings', // Settings menu
                'pip', // Picture-in-picture (currently Safari only)
                'airplay', // Airplay (currently Safari only)
                'fullscreen', // Toggle fullscreen
            ],
            youtube: { 
                noCookie: false, 
                rel: 0, 
                showinfo: 0, 
                iv_load_policy: 3, 
                modestbranding: 1,
                controls: 0, // This tells YT to not show its own controls
                disablekb: 1
            }
        });
    });

    // Advanced right click prevention
    document.addEventListener('contextmenu', event => event.preventDefault());
    
    // Prevent common devtools shortcuts
    document.addEventListener('keydown', function(e) {
        if (e.keyCode == 123 || 
           (e.ctrlKey && e.shiftKey && (e.keyCode == 'I'.charCodeAt(0) || e.keyCode == 'C'.charCodeAt(0) || e.keyCode == 'J'.charCodeAt(0))) ||
           (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0))) {
            e.preventDefault();
        }
    });
</script>
@endsection
