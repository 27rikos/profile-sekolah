<!-- Floating Chat Button -->
<div class="floating-chat">
    <button class="chat-button" type="button" data-bs-toggle="modal" data-bs-target="#chatModal">
        <i class="fas fa-comments"></i>
    </button>
</div>

<!-- Chat Modal -->
<div class="modal fade" id="chatModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="chatModalLabel">
                    <i class="fas fa-headset me-2"></i>
                    Bantuan Online
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="chat-container">
                    <!-- Chat messages -->
                    <div id="chatMessages" class="chat-messages mb-3">
                        <!-- Messages will be appended here -->
                    </div>
                    <!-- Chat input -->
                    <div class="chat-input">
                        <form id="chatForm" class="d-flex gap-2">
                            <input type="text" id="messageInput" class="form-control"
                                placeholder="Ketik pesan Anda..." required>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        // Fetch existing messages when modal is opened
        $('#chatModal').on('shown.bs.modal', function() {
            fetchMessages();
        });

        // Fetch messages via AJAX
        function fetchMessages() {
            $.ajax({
                url: "{{ route('read_chat') }}", // Adjust this to the appropriate route
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    var messagesHtml = '';
                    $.each(response.messages, function(index, message) {
                        var messageHtml = '<div class="chat-message">';
                        messageHtml += '<strong>' + message.user.name + ':</strong> ' +
                            message.pesan;
                        messageHtml += '</div>';
                        messagesHtml += messageHtml;
                    });
                    $('#chatMessages').html(messagesHtml);
                }
            });
        }

        // Submit new message via AJAX
        $('#chatForm').submit(function(event) {
            event.preventDefault();

            var message = $('#messageInput').val();

            if (message.trim() !== '') {
                $.ajax({
                    url: "{{ route('send_chat') }}", // Adjust this to the appropriate route
                    method: 'POST',
                    data: {
                        pesan: message,
                        _token: '{{ csrf_token() }}' // CSRF token for Laravel
                    },
                    success: function(response) {
                        if (response.success) {
                            // Clear the input field after sending
                            $('#messageInput').val('');
                            // Re-fetch messages to update the chat
                            fetchMessages();
                        }
                    }
                });
            }
        });
    });
</script>
