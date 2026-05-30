    </main>
    <script>
        // Toast auto-hide
        document.querySelectorAll('.toast').forEach(t => {
            setTimeout(() => { t.style.opacity = '0'; t.style.transform = 'translateX(100%)'; setTimeout(() => t.remove(), 300); }, 3000);
        });
        // Modal toggle
        document.querySelectorAll('[data-modal]').forEach(btn => {
            btn.addEventListener('click', () => {
                const modal = document.getElementById(btn.dataset.modal);
                if (modal) modal.classList.add('active');
            });
        });
        document.querySelectorAll('.admin-modal-overlay').forEach(overlay => {
            overlay.addEventListener('click', (e) => {
                if (e.target === overlay) overlay.classList.remove('active');
            });
        });
        document.querySelectorAll('[data-close-modal]').forEach(btn => {
            btn.addEventListener('click', () => {
                btn.closest('.admin-modal-overlay').classList.remove('active');
            });
        });
    </script>
</body>
</html>
