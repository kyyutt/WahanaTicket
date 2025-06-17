<footer class="bg-white text-center py-4 shadow-sm mt-auto">
  <div class="container">
    <small class="text-muted">© <?= date('Y'); ?> WahanaTicket. All rights reserved.</small>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  setTimeout(() => {
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => alert.classList.add('fade'));
    setTimeout(() => alerts.forEach(alert => alert.remove()), 500); 
  }, 3000); // hilang dalam 3 detik
</script>

</body>
</html>
