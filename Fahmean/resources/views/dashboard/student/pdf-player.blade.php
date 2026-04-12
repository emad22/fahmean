@extends('layout.dashboard')

@php
    $header = 'false';
    $footer = 'false';
@endphp

@section('dashboard-content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
    
    <style>
        .pdf-viewer-container {
            width: 100%;
            min-height: calc(100vh - 100px);
            background-color: #525659;
            border-radius: 12px;
            overflow-y: auto;
            position: relative;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        .pdf-page-canvas {
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
            border-radius: 4px;
            max-width: 100%;
        }

        .back-nav {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        #loading-spinner {
            color: white;
            font-size: 1.2rem;
            margin-top: 50px;
        }
    </style>
    
    <div class="container-fluid p-0">
        <div class="back-nav">
            <h4 class="mb-0 text-white">{{ $title ?? 'عرض الملف' }}</h4>
            <a href="javascript:history.back()" class="rbt-btn btn-white hover-icon-reverse btn-sm">
                <span class="icon-reverse-wrapper">
                    <span class="btn-text">رجوع للدرس</span>
                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                </span>
            </a>
        </div>

        <div class="pdf-viewer-container shadow-sm" id="pdf-container">
            <div id="loading-spinner">
                <i class="feather-loader list-style-icon fa-spin me-2"></i> جاري تحميل الملف...
            </div>
            {{-- Canvas elements will be injected here --}}
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // URL of the PDF stream route (now using query string)
            const url = "{{ route('view.pdf', ['path' => $path]) }}";
            console.log('Loading PDF from:', url); // For debugging

            // Configure PDF.js worker
            pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

            const container = document.getElementById('pdf-container');
            const loadingSpinner = document.getElementById('loading-spinner');

            // Asynchronous download of PDF
            pdfjsLib.getDocument(url).promise.then(function(pdfDoc) {
                loadingSpinner.style.display = 'none';
                
                // Render all pages
                for (let pageNum = 1; pageNum <= pdfDoc.numPages; pageNum++) {
                    renderPage(pdfDoc, pageNum);
                }
            }).catch(function(error) {
                console.error('Error loading PDF:', error);
                loadingSpinner.innerHTML = '<span class="text-danger"><i class="feather-alert-circle"></i> حدث خطأ أثناء تحميل الملف. تأكد من صحة الملف.</span>';
            });

            function renderPage(pdfDoc, pageNum) {
                pdfDoc.getPage(pageNum).then(function(page) {
                    // Set scale (zoom level) - 1.5 is readable for desktop
                    const scale = 1.5;
                    const viewport = page.getViewport({ scale: scale });

                    // Create canvas
                    const canvas = document.createElement('canvas');
                    canvas.className = 'pdf-page-canvas';
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;
                    
                    // Add to container
                    container.appendChild(canvas);

                    // Render context
                    const renderContext = {
                        canvasContext: canvas.getContext('2d'),
                        viewport: viewport
                    };
                    
                    page.render(renderContext);
                });
            }
        });
    </script>
@endsection
