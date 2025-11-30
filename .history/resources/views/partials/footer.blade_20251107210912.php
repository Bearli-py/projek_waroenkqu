<footer class="footer">
    <div class="footer-content">
        <div class="footer-item">
            <h4>Waroenk Qu</h4>
            <p>Cita Rasa Autentik,<br>Harga Bersahabat</p>
            
            <!-- Social Media dengan Icon PNG dari folder images/icons/ -->
            <div style="display: flex; gap: 12px; margin-top: 16px; align-items: center;">
                
                <!-- WhatsApp -->
                <a href="https://wa.me/6285924171803" target="_blank" 
                   style="width: 48px; height: 48px; background: #25D366; border-radius: 12px; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease; padding: 10px; box-shadow: 0 2px 8px rgba(37, 211, 102, 0.3);"
                   onmouseover="this.style.transform='translateY(-6px) scale(1.15)'; this.style.boxShadow='0 10px 25px rgba(37, 211, 102, 0.5)'"
                   onmouseout="this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='0 2px 8px rgba(37, 211, 102, 0.3)'"
                   title="WhatsApp">
                    <img src="{{ asset('images/icon/whatsapp.png') }}" alt="WhatsApp" style="width: 28px; height: 28px; filter: brightness(0) invert(1);">
                </a>
                
                <!-- Instagram -->
                <a href="https://instagram.com/waroenkqu_" target="_blank"
                   style="width: 48px; height: 48px; background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); border-radius: 12px; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease; padding: 10px; box-shadow: 0 2px 8px rgba(220, 39, 67, 0.3);"
                   onmouseover="this.style.transform='translateY(-6px) scale(1.15)'; this.style.boxShadow='0 10px 25px rgba(220, 39, 67, 0.5)'"
                   onmouseout="this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='0 2px 8px rgba(220, 39, 67, 0.3)'"
                   title="Instagram">
                    <img src="{{ asset('images/icons/instagram.png') }}" alt="Instagram" style="width: 28px; height: 28px; filter: brightness(0) invert(1);">
                </a>
                
                <!-- Email -->
                <a href="mailto:info@waroenkqu.com"
                   style="width: 48px; height: 48px; background: #EA4335; border-radius: 12px; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease; padding: 10px; box-shadow: 0 2px 8px rgba(234, 67, 53, 0.3);"
                   onmouseover="this.style.transform='translateY(-6px) scale(1.15)'; this.style.boxShadow='0 10px 25px rgba(234, 67, 53, 0.5)'"
                   onmouseout="this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='0 2px 8px rgba(234, 67, 53, 0.3)'"
                   title="Email">
                    <img src="{{ asset('images/icons/email.png') }}" alt="Email" style="width: 28px; height: 28px; filter: brightness(0) invert(1);">
                </a>
                
                <!-- Google Maps -->
                <a href="https://goo.gl/maps/xyz123" target="_blank"
                   style="width: 48px; height: 48px; background: #4285F4; border-radius: 12px; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease; padding: 10px; box-shadow: 0 2px 8px rgba(66, 133, 244, 0.3);"
                   onmouseover="this.style.transform='translateY(-6px) scale(1.15)'; this.style.boxShadow='0 10px 25px rgba(66, 133, 244, 0.5)'"
                   onmouseout="this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='0 2px 8px rgba(66, 133, 244, 0.3)'"
                   title="Google Maps">
                    <img src="{{ asset('images/icons/maps.png') }}" alt="Maps" style="width: 28px; height: 28px; filter: brightness(0) invert(1);">
                </a>
                
                <!-- Phone -->
                <a href="tel:+6281234567890"
                   style="width: 48px; height: 48px; background: #34B7F1; border-radius: 12px; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease; padding: 10px; box-shadow: 0 2px 8px rgba(52, 183, 241, 0.3);"
                   onmouseover="this.style.transform='translateY(-6px) scale(1.15)'; this.style.boxShadow='0 10px 25px rgba(52, 183, 241, 0.5)'"
                   onmouseout="this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='0 2px 8px rgba(52, 183, 241, 0.3)'"
                   title="Telepon">
                    <img src="{{ asset('images/icons/phone.png') }}" alt="Phone" style="width: 28px; height: 28px; filter: brightness(0) invert(1);">
                </a>
                
            </div>
            
            <p style="margin-top: 20px; font-size: 14px; opacity: 0.9;">© {{ date('Y') }} Waroenk Qu.<br>All Rights Reserved.</p>
        </div>
        
        <div class="footer-item">
            <h4>Alamat</h4>
            <p>Jl. Raya Jember No. 123<br>Jember, Jawa Timur<br>Indonesia</p>
            <a href="https://goo.gl/maps/xyz123" target="_blank" style="color: #FCD34D; display: inline-block; margin-top: 12px; text-decoration: none; font-weight: 600; transition: all 0.3s ease;"
               onmouseover="this.style.color='#FBBF24'; this.style.transform='translateX(5px)'"
               onmouseout="this.style.color='#FCD34D'; this.style.transform='translateX(0)'">
                📍 Lihat di Maps →
            </a>
        </div>
        
        <div class="footer-item">
            <h4>Kontak</h4>
            <p>
                📞 <a href="tel:+6281234567890" style="transition: all 0.3s ease;" onmouseover="this.style.color='#FCD34D'" onmouseout="this.style.color='#FFFFFF'">+62 812-3456-7890</a><br>
                📧 <a href="mailto:info@waroenkqu.com" style="transition: all 0.3s ease;" onmouseover="this.style.color='#FCD34D'" onmouseout="this.style.color='#FFFFFF'">info@waroenkqu.com</a><br>
                💬 <a href="https://wa.me/6281234567890" target="_blank" style="transition: all 0.3s ease;" onmouseover="this.style.color='#FCD34D'" onmouseout="this.style.color='#FFFFFF'">Chat WhatsApp</a>
            </p>
        </div>
        
        <div class="footer-item">
            <h4>Jam Buka</h4>
            <p>
                <strong>Senin - Jumat</strong><br>
                08.00 - 21.00 WIB<br><br>
                <strong>Sabtu - Minggu</strong><br>
                08.00 - 22.00 WIB
            </p>
        </div>
    </div>
</footer>