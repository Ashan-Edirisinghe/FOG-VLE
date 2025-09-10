@extends('layouts.app')

@section('title', 'Payment - Graduate Studies')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <div class="tab-navigation">
                <a href="#" class="tab-link active" id="tab-sem1">Sem 1</a>
                <a href="#" class="tab-link" id="tab-sem2">Sem 2</a>
            </div>
            
            <!-- Payment Section -->
            <div class="payment-container">
                <div class="payment-header">
                    <h2>Evaluation Form</h2>
                </div>
                
                <!-- Upload Section for Sem 1 -->
                <div class="upload-section" id="upload-sem1">
                    <h3>Upload your evaluation form for Sem 1</h3>
                    <div class="upload-card">
                        <div class="upload-header">
                            <i class="fas fa-user"></i>
                            <span>Upload pdf</span>
                        </div>
                        <div class="upload-body">
                            <p class="upload-instruction">Specify a pdf file to upload</p>
                            <div class="upload-area" id="upload-area-sem1">
                                <div class="upload-content" id="upload-content-sem1">
                                    <p>Drag & Drop File</p>
                                    <p>Or</p>
                                    <button type="button" class="btn-browse" id="browseBtnSem1">
                                        <i class="fas fa-folder"></i> BROWSE
                                    </button>
                                    <input type="file" id="fileInputSem1" style="display: none;" accept=".pdf">
                                </div>
                            </div>
                            <div class="upload-actions">
                                <button type="button" class="btn-action btn-next" id="nextSem1">NEXT</button>
                                <button type="button" class="btn-action btn-cancel" id="cancelSem1">CANCEL</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Upload Section for Sem 2 -->
                <div class="upload-section" id="upload-sem2" style="display:none;">
                    <h3>Upload your evaluation form for Sem 2</h3>
                    <div class="upload-card">
                        <div class="upload-header">
                            <i class="fas fa-user"></i>
                            <span>Upload pdf</span>
                        </div>
                        <div class="upload-body">
                            <p class="upload-instruction">Specify a pdf file to upload</p>
                            <div class="upload-area" id="upload-area-sem2">
                                <div class="upload-content" id="upload-content-sem2">
                                    <p>Drag & Drop File</p>
                                    <p>Or</p>
                                    <button type="button" class="btn-browse" id="browseBtnSem2">
                                        <i class="fas fa-folder"></i> BROWSE
                                    </button>
                                    <input type="file" id="fileInputSem2" style="display: none;" accept=".pdf">
                                </div>
                            </div>
                            <div class="upload-actions">
                                <button type="button" class="btn-action btn-next" id="nextSem2">NEXT</button>
                                <button type="button" class="btn-action btn-cancel" id="cancelSem2">CANCEL</button>
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
    // Tab switching
    document.getElementById('tab-sem1').addEventListener('click', function(e) {
        e.preventDefault();
        this.classList.add('active');
        document.getElementById('tab-sem2').classList.remove('active');
        document.getElementById('upload-sem1').style.display = '';
        document.getElementById('upload-sem2').style.display = 'none';
    });
    document.getElementById('tab-sem2').addEventListener('click', function(e) {
        e.preventDefault();
        this.classList.add('active');
        document.getElementById('tab-sem1').classList.remove('active');
        document.getElementById('upload-sem1').style.display = 'none';
        document.getElementById('upload-sem2').style.display = '';
    });

    // File upload logic for Sem 1
    setupUpload(
        'browseBtnSem1', 'fileInputSem1', 'upload-area-sem1', 'upload-content-sem1', 'nextSem1', 'cancelSem1'
    );
    // File upload logic for Sem 2
    setupUpload(
        'browseBtnSem2', 'fileInputSem2', 'upload-area-sem2', 'upload-content-sem2', 'nextSem2', 'cancelSem2'
    );

    function setupUpload(browseBtnId, fileInputId, uploadAreaId, uploadContentId, nextBtnId, cancelBtnId) {
        const browseBtn = document.getElementById(browseBtnId);
        const fileInput = document.getElementById(fileInputId);
        const uploadArea = document.getElementById(uploadAreaId);
        const uploadContent = document.getElementById(uploadContentId);

        browseBtn.addEventListener('click', function() {
            fileInput.click();
        });

        fileInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                displaySelectedFile(file, uploadArea, uploadContent, fileInput);
            }
        });

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
                fileInput.files = files;
                displaySelectedFile(files[0], uploadArea, uploadContent, fileInput);
            }
        });

        document.getElementById(nextBtnId).addEventListener('click', function() {
            const file = fileInput.files[0];
            if (file) {
                alert('Evaluation form uploaded successfully! Proceeding to next step...');
                // Here you would typically submit the form or redirect
            } else {
                alert('Please select a file to upload first.');
            }
        });

        document.getElementById(cancelBtnId).addEventListener('click', function() {
            fileInput.value = '';
            uploadArea.classList.remove('file-selected');
            uploadContent.innerHTML = `
                <p>Drag & Drop File</p>
                <p>Or</p>
                <button type="button" class="btn-browse" id="${browseBtnId}">
                    <i class="fas fa-folder"></i> BROWSE
                </button>
            `;
            // Re-attach event listener to new browse button
            document.getElementById(browseBtnId).addEventListener('click', function() {
                fileInput.click();
            });
        });
    }

    function displaySelectedFile(file, uploadArea, uploadContent, fileInput) {
        uploadArea.classList.add('file-selected');
        uploadContent.innerHTML = `
            <p><i class="fas fa-file"></i> ${file.name}</p>
            <p class="file-name">File selected successfully!</p>
            <button type="button" class="btn-browse">
                <i class="fas fa-folder"></i> CHANGE FILE
            </button>
        `;
        uploadContent.querySelector('.btn-browse').addEventListener('click', function() {
            fileInput.click();
        });
    }
</script>
@endpush
@endsection
