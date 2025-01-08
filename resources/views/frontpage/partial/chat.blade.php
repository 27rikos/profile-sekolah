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
                     <div class="chat-messages mb-3">
                         <div class="message admin">
                             <span class="sender-name">Sarah (CS)</span>
                             <div class="message-content">
                                 Halo! Ada yang bisa kami bantu?
                             </div>
                             <small class="text-muted">10:00</small>
                         </div>

                         <div class="message user">
                             <span class="sender-name">Anda</span>
                             <div class="message-content">
                                 Saya ingin tahu tentang program beasiswa
                             </div>
                             <small class="text-muted">10:01</small>
                         </div>

                         <div class="message admin">
                             <span class="sender-name">Sarah (CS)</span>
                             <div class="message-content">
                                 Baik, SMK Modern memiliki beberapa program beasiswa unggulan. Silakan pilih topik
                                 yang ingin Anda ketahui lebih lanjut.
                             </div>
                             <small class="text-muted">10:01</small>
                         </div>
                         <div class="message admin">
                             <span class="sender-name">Sarah (CS)</span>
                             <div class="message-content">
                                 Baik, SMK Modern memiliki beberapa program beasiswa unggulan. Silakan pilih topik
                                 yang ingin Anda ketahui lebih lanjut.
                             </div>
                             <small class="text-muted">10:01</small>
                         </div>
                         <div class="message user">
                             <span class="sender-name">Anda</span>
                             <div class="message-content">
                                 Saya ingin tahu tentang program beasiswa
                             </div>
                             <small class="text-muted">10:01</small>
                         </div>
                     </div>

                     <!-- Quick response buttons -->
                     <div class="quick-responses mb-4">
                         <button class="btn btn-outline-primary btn-sm me-2 mb-2">Beasiswa Prestasi</button>
                         <button class="btn btn-outline-primary btn-sm me-2 mb-2">Beasiswa KIP</button>
                         <button class="btn btn-outline-primary btn-sm me-2 mb-2">Beasiswa Industri</button>
                         <button class="btn btn-outline-primary btn-sm mb-2">Persyaratan</button>
                     </div>

                     <!-- Chat input -->
                     <div class="chat-input">
                         <form id="chatForm" class="d-flex gap-2">
                             <input type="text" class="form-control" placeholder="Ketik pesan Anda...">
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
     document.getElementById('chatForm').addEventListener('submit', function(e) {
         e.preventDefault(); // Mencegah form melakukan submit (refresh halaman)
         // Tambahkan logika lain di sini, seperti mengirim pesan ke server
         console.log('Pesan terkirim!');
     });
 </script>
