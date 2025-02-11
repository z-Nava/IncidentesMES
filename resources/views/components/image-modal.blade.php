<div id="imageModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <img id="modalImage" src="" alt="Vista previa de imagen" class="max-w-full max-h-full">
        <button class="mt-4 bg-gray-500 text-white px-4 py-2 rounded" onclick="closeImageModal()">Cerrar</button>
    </div>
</div>

<script>
function openImageModal(src) {
    document.getElementById('modalImage').src = src;
    document.getElementById('imageModal').classList.remove('hidden');
}

function closeImageModal() {
    document.getElementById('imageModal').classList.add('hidden');
}
</script>