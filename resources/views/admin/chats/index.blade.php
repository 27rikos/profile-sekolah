@extends('layout.app')

@section('title', 'Public Chat')

@section('main')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5>Room Chat</h5>
        </div>
        <div class="card-body" style="height: 400px; overflow-y: auto;" id="chat-container">
            <!-- Chat messages will be dynamically loaded here -->
        </div>
        <div class="card-footer">
            <form id="chat-form">
                @csrf
                <div class="d-flex mb-2 align-items-start">
                    <textarea id="chat-input" name="pesan" class="form-control me-2" placeholder="Type your message here..."
                        style="resize: none;" rows="1" oninput="autoResize(this)"></textarea>
                    <button type="submit" class="btn btn-primary me-2 align-self-center" style="height: auto;">
                        <i class="ti ti-send"></i>
                    </button>
                    <button type="button" class="btn btn-secondary align-self-center" data-bs-toggle="modal"
                        data-bs-target="#uploadModal" style="height: auto;">
                        <i class="ti ti-paperclip"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal for file upload -->
    <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">Upload File</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="file-upload-form">
                        @csrf
                        <div class="mb-3">
                            <label for="file-input" class="form-label">Choose a file</label>
                            <input type="file" name="file" class="form-control" id="file-input">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="upload-btn" class="btn btn-primary">Upload</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        function fetchMessages() {
            $.ajax({
                url: "{{ route('chat.index') }}",
                method: "GET",
                success: function(response) {
                    $('#chat-container').html('');
                    response.messages.forEach(function(message) {
                        const alignClass = message.user.id === {{ auth()->id() }} ?
                            'justify-content-end' : 'justify-content-start';
                        const bgClass = message.user.id === {{ auth()->id() }} ? 'bg-primary' :
                            'bg-secondary';

                        // Mendapatkan nama file dari path
                        const fileName = message.file ? message.file.split('/').pop() : '';

                        $('#chat-container').append(`
                    <div class="d-flex ${alignClass} mb-3">
                        <div class="${bgClass} text-white p-2 rounded" style="max-width: 75%;">
                            <small><strong>${message.user.name}:</strong></small><br>
                            <span>${message.pesan}</span>
                            ${message.file ? `
                                                <div class="border-top mt-2 pt-2">
                                                    <div class="d-flex align-items-center">
                                                        <i class="ti ti-paperclip me-2"></i>
                                                        <small class="text-truncate" style="max-width: 150px;">${fileName}</small>
                                                    </div>
                                                    <div class="mt-1">
                                                        <a href="/${message.file}" class="btn btn-sm btn-light" download>
                                                            <i class="ti ti-download me-1"></i> Download
                                                        </a>
                                                        <a href="/${message.file}" class="btn btn-sm btn-light ms-1" target="_blank">
                                                            <i class="ti ti-eye me-1"></i> View
                                                        </a>
                                                    </div>
                                                </div>
                                            ` : ''}
                        </div>
                    </div>
                `);
                    });
                    $('#chat-container').scrollTop($('#chat-container')[0].scrollHeight);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching messages:', error);
                }
            });
        }

        $(document).ready(function() {
            // Load messages initially and refresh every 5 seconds
            fetchMessages();
            setInterval(fetchMessages, 5000);

            // Handle chat form submission
            $('#chat-form').on('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);

                if (!$('#chat-input').val().trim()) {
                    return;
                }

                $.ajax({
                    url: "{{ route('chat.store') }}",
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status === 'success') {
                            fetchMessages();
                            $('#chat-input').val('');
                            $('#chat-input').css('height', 'auto');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error sending message:', error);
                        alert('Failed to send message. Please try again.');
                    }
                });
            });

            // Handle file upload form submission
            $('#file-upload-form').on('submit', function(e) {
                e.preventDefault();
            });

            // Handle file upload button click
            $('#upload-btn').on('click', function() {
                const fileInput = $('#file-input')[0];
                if (!fileInput.files.length) {
                    alert('Please select a file first');
                    return;
                }

                // Show loading state
                const $uploadBtn = $(this);
                const originalText = $uploadBtn.html();
                $uploadBtn.prop('disabled', true).html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Uploading...'
                );

                const formData = new FormData($('#file-upload-form')[0]);

                $.ajax({
                    url: "{{ route('chat.store') }}",
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status === 'success') {
                            $('#uploadModal').modal('hide');
                            $('#file-input').val('');
                            fetchMessages();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error uploading file:', error);
                        alert('Failed to upload file. Please try again.');
                    },
                    complete: function() {
                        // Reset button state
                        $uploadBtn.prop('disabled', false).html(originalText);
                    }
                });
            });

            // Reset file input when modal is closed
            $('#uploadModal').on('hidden.bs.modal', function() {
                $('#file-input').val('');
            });

            // Add file input change handler to show selected filename
            $('#file-input').on('change', function() {
                const fileName = this.files[0]?.name;
                if (fileName) {
                    $(this).next('.form-text').html(`Selected file: ${fileName}`);
                }
            });
        });
    </script>
@endpush
