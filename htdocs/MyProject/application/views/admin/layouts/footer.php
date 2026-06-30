
  </div><!-- /page-body -->
</div><!-- /main-content -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Auto-dismiss alerts after 4 seconds
  setTimeout(function() {
    $('.alert').alert('close');
  }, 4000);

  // Image preview before upload
  function previewImage(input, previewId) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        var preview = document.getElementById(previewId);
        preview.src = e.target.result;
        preview.style.display = 'block';
      };
      reader.readAsDataURL(input.files[0]);
    }
  }

  // Delete confirmation
  function confirmDelete(url, name) {
    if (confirm('Are you sure you want to delete "' + name + '"?\nThis action cannot be undone.')) {
      window.location.href = url;
    }
  }
</script>
</body>
</html>
