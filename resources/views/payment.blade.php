@extends('layouts.app')

@section('title', 'Payment - Graduate Studies')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Navigation Tabs -->
            <div class="tab-navigation">
                <a href="#" class="tab-link">home</a>
                <a href="#" class="tab-link">profile</a>
                <a href="#" class="tab-link active">payment</a>
                <a href="#" class="tab-link">Registration</a>
            </div>
            
            <!-- Payment Section -->
            <div class="payment-container">
                <div class="payment-header">
                    <h2>Payment</h2>
                </div>
                
                <!-- Upload Section -->
                <div class="upload-section">
                    <h3>Upload your slip</h3>
                    
                    <div class="upload-card">
                        <div class="upload-header">
                            <i class="fas fa-user"></i>
                            <span>Upload Script</span>
                        </div>
                        
                        <div class="upload-body">
                            <p class="upload-instruction">Specify a script file to upload</p>
                            
                            <div class="upload-area">
                                <div class="upload-content">
                                    <p>Drag & Drop File</p>
                                    <p>Or</p>
                                    <button type="button" class="btn-browse" id="browseBtn">
                                        <i class="fas fa-folder"></i> BROWSE
                                    </button>
                                    <input type="file" id="fileInput" style="display: none;" accept=".pdf,.jpg,.jpeg,.png,.doc,.docx">
                                </div>
                            </div>
                            
                            <div class="upload-actions">
                                <button type="button" class="btn-action btn-next">NEXT</button>
                                <button type="button" class="btn-action btn-cancel">CANCEL</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .tab-navigation {
        background: white;
        border-bottom: 1px solid #e0e0e0;
        padding: 15px 0;
        margin-bottom: 0;
        display: flex;
        gap: 30px;
        padding-left: 20px;
    }
    
    .tab-link {
        color: #666;
        text-decoration: none;
        padding: 10px 15px;
        border-radius: 5px;
        transition: all 0.3s;
        font-weight: 500;
    }
    
    .tab-link:hover {
        color: #1e3c72;
        text-decoration: none;
    }
    
    .tab-link.active {
        background-color: #1e3c72;
        color: white;
    }
    
    .payment-container {
        background: #e0e0e0;
        min-height: 60vh;
        padding: 0;
    }
    
    .payment-header {
        background: #d0d0d0;
        padding: 15px 25px;
        border-bottom: 1px solid #bbb;
    }
    
    .payment-header h2 {
        margin: 0;
        font-size: 1.3rem;
        font-weight: 600;
        color: #333;
    }
    
    .upload-section {
        background: #d0d0d0;
        padding: 25px;
    }
    
    .upload-section h3 {
        margin: 0 0 25px 0;
        font-size: 1.2rem;
        font-weight: 600;
        color: #333;
    }
    
    .upload-card {
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        overflow: hidden;
    }
    
    .upload-header {
        background: #f8f9fa;
        padding: 15px 20px;
        border-bottom: 1px solid #e0e0e0;
        display: flex;
        align-items: center;
        gap: 10px;
        font-weight: 500;
        color: #333;
    }
    
    .upload-header i {
        color: #666;
    }
    
    .upload-body {
        padding: 25px;
    }
    
    .upload-instruction {
        margin-bottom: 20px;
        color: #666;
        font-size: 1rem;
    }
    
    .upload-area {
        border: 2px dashed #ccc;
        border-radius: 8px;
        padding: 40px 20px;
        text-align: center;
        background: #f9f9f9;
        margin-bottom: 25px;
        transition: border-color 0.3s;
    }
    
    .upload-area:hover {
        border-color: #1e3c72;
    }
    
    .upload-content p {
        margin: 5px 0;
        color: #666;
        font-size: 1rem;
    }
    
    .btn-browse {
        background: #333;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        font-weight: 600;
        cursor: pointer;
        margin-top: 10px;
        transition: background-color 0.3s;
    }
    
    .btn-browse:hover {
        background: #1e3c72;
    }
    
    .upload-actions {
        display: flex;
        justify-content: flex-end;
        gap: 15px;
    }
    
    .btn-action {
        border: none;
        padding: 10px 25px;
        border-radius: 5px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
    }
    
    .btn-next {
        background: #d0d0d0;
        color: #666;
    }
    
    .btn-next:hover {
        background: #1e3c72;
        color: white;
    }
    
    .btn-cancel {
        background: #f8f9fa;
        color: #666;
        border: 1px solid #ddd;
    }
    
    .btn-cancel:hover {
        background: #e9ecef;
        color: #333;
    }
    
    /* Override main content padding for this page */
    .main-content {
        padding: 0;
    }
    
    /* File upload styling */
    .file-selected {
        background: #e8f5e8;
        border-color: #28a745;
    }
    
    .file-name {
        color: #28a745;
        font-weight: 500;
        margin-top: 10px;
    }
</style>
@endpush

@push('scripts')
<script>
    // File upload functionality
    const browseBtn = document.getElementById('browseBtn');
    const fileInput = document.getElementById('fileInput');
    const uploadArea = document.querySelector('.upload-area');
    const uploadContent = document.querySelector('.upload-content');
    
    browseBtn.addEventListener('click', function() {
        fileInput.click();
    });
    
    fileInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            displaySelectedFile(file);
        }
    });
    
    // Drag and drop functionality
    uploadArea.addEventListener('dragover', function(e) {
        e.preventDefault();
        uploadArea.style.borderColor = '#1e3c72';
    });
    
    uploadArea.addEventListener('dragleave', function(e) {
        e.preventDefault();
        uploadArea.style.borderColor = '#ccc';
    });
    
    uploadArea.addEventListener('drop', function(e) {
        e.preventDefault();
        uploadArea.style.borderColor = '#ccc';
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            displaySelectedFile(files[0]);
        }
    });
    
    function displaySelectedFile(file) {
        uploadArea.classList.add('file-selected');
        uploadContent.innerHTML = `
            <p><i class="fas fa-file"></i> ${file.name}</p>
            <p class="file-name">File selected successfully!</p>
            <button type="button" class="btn-browse" onclick="fileInput.click()">
                <i class="fas fa-folder"></i> CHANGE FILE
            </button>
        `;
    }
    
    // Next button functionality
    document.querySelector('.btn-next').addEventListener('click', function() {
        const file = fileInput.files[0];
        if (file) {
            alert('Payment slip uploaded successfully! Proceeding to next step...');
            // Here you would typically submit the form or redirect
        } else {
            alert('Please select a file to upload first.');
        }
    });
    
    // Cancel button functionality
    document.querySelector('.btn-cancel').addEventListener('click', function() {
        fileInput.value = '';
        uploadArea.classList.remove('file-selected');
        uploadContent.innerHTML = `
            <p>Drag & Drop File</p>
            <p>Or</p>
            <button type="button" class="btn-browse" id="browseBtn">
                <i class="fas fa-folder"></i> BROWSE
            </button>
        `;
        // Re-attach event listener to new browse button
        document.getElementById('browseBtn').addEventListener('click', function() {
            fileInput.click();
        });
    });
</script>
@endpush
@endsection
