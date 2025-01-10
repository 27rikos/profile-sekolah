@extends('layout.app')
@section('title')
    Public Chat
@endsection

@section('main')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5>Public Chat</h5>
        </div>
        <div class="card-body" style="height: 400px; overflow-y: auto;">
            <!-- Chat messages will be displayed here -->
            <div id="chat-messages">
                <!-- Example of user message -->
                <div class="d-flex justify-content-end mb-3">
                    <div class="bg-primary text-white p-2 rounded" style="max-width: 75%;">
                        <small><strong>You:</strong></small><br>
                        <span>This is a message from you.</span>
                    </div>
                </div>

                <!-- Example of other user's message -->
                <div class="d-flex justify-content-start mb-3">
                    <div class="bg-secondary text-white p-2 rounded" style="max-width: 75%;">
                        <small><strong>John Doe:</strong></small><br>
                        <span>This is a message from another user.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <form id="chat-form">
                <div class="d-flex mb-2 align-items-start">
                    <textarea id="chat-input" name="pesan" class="form-control me-2" placeholder="Type your message here..."
                        style="resize: none;" rows="1" oninput="autoResize(this)"></textarea>
                    <button type="submit" class="btn btn-primary me-2 align-self-center" style="height: auto;"><i
                            class="ti ti-send"></i></button>
                    <button type="button" class="btn btn-secondary align-self-center" data-bs-toggle="modal"
                        data-bs-target="#uploadModal" style="height: auto;"><i class="ti ti-paperclip"></i></button>
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
                        <div class="mb-3">
                            <label for="file-input" class="form-label">Choose a file</label>
                            <input type="file" name="file" class="form-control" id="file-input">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Upload</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function autoResize(textarea) {
            textarea.style.height = 'auto';
            textarea.style.height = textarea.scrollHeight + 'px';
        }
    </script>
@endsection
