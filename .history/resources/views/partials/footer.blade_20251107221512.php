<footer class="footer">
    <div class="footer-content">
        
        <!-- 1. IKUTI KAMI (Social Media dengan Background) -->
        <div class="footer-item">
            <h4>Ikuti Kami</h4>
            
            <div style="display: flex; gap: 12px; margin-top: 16px; flex-wrap: wrap;">
                
                <!-- Instagram -->
                <a href="https://instagram.com/waroenkqu_" target="_blank" 
                   style="width: 48px; height: 48px; background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); border-radius: 12px; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease; box-shadow: 0 2px 8px rgba(220, 39, 67, 0.3);"
                   onmouseover="this.style.transform='translateY(-6px) scale(1.15)'; this.style.boxShadow='0 10px 25px rgba(220, 39, 67, 0.5)'"
                   onmouseout="this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='0 2px 8px rgba(220, 39, 67, 0.3)'"
                   title="Instagram @waroenkqu_">
                    <img src="{{ asset('images/icons/instagram.png') }}" alt="Instagram" style="width: 28px; height: 28px; filter: brightness(0) invert(1);">
                </a>
                
                <!-- Facebook -->
                <a href="https://www.facebook.com/waroenkqu_" target="_blank"
                   style="width: 48px; height: 48px; background: #1877F2; border-radius: 12px; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease; box-shadow: 0 2px 8px rgba(24, 119, 242, 0.3);"
                   onmouseover="this.style.transform='translateY(-6px) scale(1.15)'; this.style.boxShadow='0 10px 25px rgba(24, 119, 242, 0.5)'"
                   onmouseout="this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='0 2px 8px rgba(24, 119, 242, 0.3)'"
                   title="Facebook Waroenk Qu">
                    <img src="{{ asset('images/icons/facebook.png') }}" alt="Facebook" style="width: 28px; height: 28px; filter: brightness(0) invert(1);">
                </a>
                
                <!-- X / Twitter -->
                <a href="https://x.com/waroenkqu" target="_blank"
                   style="width: 48px; height: 48px; background: #000000; border-radius: 12px; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);"
                   onmouseover="this.style.transform='translateY(-6px) scale(1.15)'; this.style.boxShadow='0 10px 25px rgba(0, 0, 0, 0.5)'"
                   onmouseout="this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='0 2px 8px rgba(0, 0, 0, 0.3)'"
                   title="X @waroenkqu">
                    <img src="{{ asset('images/icons/x.png') }}" alt="X" style="width: 24px; height: 24px; filter: brightness(0) invert(1);">
                </a>
                
            </div>
            
            <p style="margin-top: 20px; font-size: 14px; opacity: 0.9;">© {{ date('Y') }} Waroenk Qu.<br>All Rights Reserved.</p>
        </div>
        
        <!-- 2. ALAMAT (dengan foto Maps, NO BACKGROUND) -->
        <div class="footer-item">
            <h4>Alamat</h4>
            <p style="margin-bottom: 12px;">
                Jl. Raya Jember No. 123<br>
                Jember, Jawa Timur<br>
                Indonesia
            </p>
            
            <a href="https://maps.app.goo.gl/wfNNDervvBjcxmpt6" target="_blank" 
               style="display: inline-flex; align-items: center; gap: 8px; color: #FCD34D; text-decoration: none; font-weight: 600; transition: all 0.3s ease; padding: 8px 0;"
               onmouseover="this.style.color='#FBBF24'; this.style.transform='translateX(5px)'"
               onmouseout="this.style.color='#FCD34D'; this.style.transform='translateX(0)'">
                <img src="{{ asset('images/icons/maps.png') }}" alt="Maps" style="width: 20px; height: 20px;">
                Lihat di Maps
            </a>
        </div>
        
        <!-- 3. KONTAK (Phone, Email, WhatsApp dengan FOTO, NO BACKGROUND) -->
        <div class="footer-item">
            <h4>Kontak</h4>
            <div style="display: flex; flex-direction: column; gap: 12px;">
                
                <!-- Phone -->
                <a href="tel:+6285924171803" 
                   style="display: flex; align-items: center; gap: 10px; color: white; text-decoration: none; transition: all 0.3s ease;"
                   onmouseover="this.style.color='#FCD34D'"
                   onmouseout="this.style.color='white'">
                    <img src="{{ asset('images/icons/phone.png') }}" alt="Phone" style="width: 20px; height: 20px;">
                    <span>+62 859-2417-1803</span>
                </a>
                
                <!-- Email -->
                <a href="mailto:info@waroenkqu.com"
                   style="display: flex; align-items: center; gap: 10px; color: white; text-decoration: none; transition: all 0.3s ease;"
                   onmouseover="this.style.color='#FCD34D'"
                   onmouseout="this.style.color='white'">
                    <img src="{{ asset('images/icons/email.png') }}" alt="Email" style="width: 20px; height: 20px;">
                    <span>info@waroenkqu.com</span>
                </a>
                
                <!-- WhatsApp -->
                <a href="https://wa.me/6285924171803" target="_blank"
                   style="display: flex; align-items: center; gap: 10px; color: white; text-decoration: none; transition: all 0.3s ease;"
                   onmouseover="this.style.color='#FCD34D'"
                   onmouseout="this.style.color='white'">
                    <img src="{{ asset('images/icons/whatsapp.png') }}" alt="WhatsApp" style="width: 20px; height: 20px;">
                    <span>Chat WhatsApp</span>
                </a>
                
            </div>
        </div>
        
        <!-- 4. JAM BUKA -->
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
```

---

## 📂 **STRUKTUR FOLDER IMAGES YANG DIBUTUHKAN:**
```
C:\laragon\www\waroenk-qu\public\images\
├── logo.png               ← Logo untuk header
└── icons\                 ← Folder icon
    ├── instagram.png      ← Icon Instagram (untuk sosmed dengan background)
    ├── facebook.png       ← Icon Facebook (untuk sosmed dengan background)
    ├── x.png              ← Icon X/Twitter (untuk sosmed dengan background)
    ├── maps.png           ← Icon Maps (TANPA background di code)
    ├── phone.png          ← Icon Phone (TANPA background di code)
    ├── email.png          ← Icon Email (TANPA background di code)
    └── whatsapp.png       ← Icon WhatsApp (TANPA background di code)