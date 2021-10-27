<script>
    function deleteConfirmation(formId) {
        let csrf = `@csrf`;
        let method = `@method('DELETE')`;
        let form = $(formId).append([csrf, method]);
        Swal.fire({
            icon: 'warning',
            title: 'Hapus data ini?',
            text: "Data tidak dapat dikembalikan setelah dihapus!",
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.value) {
                form.submit();
            }
        });
    }
</script>
